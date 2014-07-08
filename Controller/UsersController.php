<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
        $this->Auth->allow('login', 'add', 'logout', 'mensagens', 'recuperar');
        $this->Security->blackHoleCallback = 'forceSSL';
        $this->Security->requireSecure();
	}

	/**
     * login method
     *
     * @return void
     */
	function login() {
    	$this->layout = 'login';
    	if ($this->request->is('post')) {
            if ($this->Auth->login()) {
            	/*
            	pr($this->request->data);
    			exit;
    			*/
                $this->Session->setFlash('Logado com sucesso.', 'success');
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Nome de usuário ou senha estava incorreta.');
            }
        }
    }
    /**
     * logout method
     *
     * @return void
     */
    function logout() {
        $this->Session->setFlash('Até logo!', 'success');
    	if (env('HTTPS')){ $this->_unforceSSL; }
        $this->redirect($this->Auth->logout());
    }

/**
 * recuperar method
 *
 * @return void
 */

	public function recuperar(){
		if ($this->request->is('post') || $this->request->is('put')) {

			$email = $this->request->data['recuperar']['email'];
			$cpf = str_replace(array('.','-'), '', $this->request->data['recuperar']['cpf']);
			$password = $this->geraSenha(8, true, true);
			$validation = $this -> User -> find('first', array(
					'recursive'		=> -1,
					'conditions'	=> array(
						'User.email'	=> $email,
						'User.cpf'		=> $cpf
					),
				)
			);

			if (!empty($validation)) {
				$validation['User']['password'] = $password;
				$validation['User']['password2'] = $password;
				$Email = new CakeEmail('smtp');
				$Email->to($validation['User']['email']);
				$Email->subject('Recuperação de Senha');
				$Email->viewVars($validation);
				$Email->emailFormat('html');
				$Email->template('recuperar');

				if($Email->send()){
					if (!$this->User->save($validation)) {
						$this->Session->setFlash(__('Não foi possível alterar senha.'));
					}
					$this->Session->setFlash("Senha enviada para ".$email." com sucesso", 'success');
					return $this->redirect(array('controller'=>'users', 'action'=>'login'));
				}else{
					$this->Session->setFlash("Erro ao enviar email de recuperação!", 'error');
				}
			}else{
				$this->Session->setFlash(" Informações invalidas!");
			}
		}
	}
/**
 * mensagens method
 *
 * @return void
 */
	public function mensagens_count(){
		if($this->request->is('requested')){
			$count = $this->User->UsersMessage->find('count', array(
        		'conditions' => array(
        			'UsersMessage.user_id' => $this->getUserID()
    			)
			));
			return $count;
		}
	}

	public function mensagens(){
		if ( !$this -> User -> exists( $this->getUserID() )) {
			return 0;
		}
		$this-> User -> recursive = 2;
		$this-> User ->unbindModel(array(
	        	'belongsTo' => array('Curso', 'Sexo', 'Group'),
	        	'hasMany'	=> array('Content', 'Holding'),
        ));
	    $user = $this -> User -> find('first',array(
				'conditions' => array(
					'User.id' => $this->getUserID(),
				)
		));
		if($this->request->is('requested')){
			return $user;
		}else{
			$this -> set(compact('user'));
		}
	}

/**
 * index method
 *
 * @return void
 */
	
	public function index() {
		if (!$this -> User -> exists( $this->getUserID() )) {
			$this->redirect('/users/login');
		}
		$options = array('conditions' => array('User.' . $this -> User -> primaryKey => $this->getUserID()));
		$this -> set('user', $this -> User -> find('first', $options));
	}

	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['User']['status'] = 1;
			$this->request->data['User']['group_id'] = 2;
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário foi salvo. Faça login no sistema para obter acesso!'), 'success');
				return $this->redirect(array('controller'=>'users', 'action'=>'login'));
			} else {
				$this->Session->setFlash(__('Usuário não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$cursos = $this->User->Curso->find('list');
		$sexos = $this->User->Sexo->find('list');
		$this->set(compact('groups', 'cursos', 'sexos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit() {
		$id = $this->getUserID();
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido usuário'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['User']['status'] = 1;
			$this->request->data['User']['group_id'] = 2;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário foi salvo.'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Usuário não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$cursos = $this->User->Curso->find('list');
		$sexos = $this->User->Sexo->find('list');
		$this->set(compact('groups', 'cursos', 'sexos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$id = $this->getUserID();
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Inválido Usuário'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuário delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuário não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}

/*
	USER
	ADMIN

*/

	/**
     * login method
     *
     * @return void
     */
	function admin_login() {
    	$this->layout = 'login';
    	if ($this->Session->read('Auth.User')) {
	        $this->Session->setFlash('Você está logado!');
	        $this->redirect($this->referer());
	    }
    	
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Nome de usuário ou senha estava incorreta.', 'error');
            }
        }
    }
    /**
     * logout method
     *
     * @return void
     */
    function admin_logout() {
        $this->Session->setFlash('Até logo!', 'success');
        $this->redirect($this->Auth->logout());
    }

/**
 * index method
 *
 * @throws NotFoundException
 * @return void
 */
	public function admin_index($limit = 14) {
		
		$this->User->recursive = 0;
		$this->paginate = array('limit'=>$limit,);
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if(!empty($this->request->data['Validade'])){
				//pr($this->request->data); exit;
				if (!empty($this->request->data['Validade']['search'])) {
					switch ($this->request->data['Validade']['conditions']) {
						case 1: $conditions = array('User.cpf' => $this->request->data['Validade']['search']);
							break;
						case 2: $conditions = array('User.name LIKE' => '%'.$this->request->data['Validade']['search']."%");
							break;
						case 3: $conditions = array('User.id' => $this->request->data['Validade']['search']);
							break;
						default:
							$conditions = array();												
							break;
					}
					$this->paginate = array(
						'limit'=>$limit,
						'conditions' => $conditions,
					);
				}
			}			
		}
	    $users = $this->paginate();
		$this->set(compact('users'));
	}

	public function admin_print(){
		$this->layout = 'pdf';
		/*$this->pdfConfig = array(
			'margin' => array(
		        'bottom' => 0,
		        'left' => 0,
		        'right' => 0,
		        'top' => 0
		    ),
		    'pageSize' => 'A4',
		    'orientation' => 'portrait', 
		    'download' => false,
		    'filename' => 'Usuarios'
        );*/

        if ($this->request->is('post') || $this->request->is('put')) {
        	foreach ($this->request->data['User'] as $key => $check) {
        		if($check['check'] == 1){
	        		$conditions = array('User.id' => $key);
	        		$user[$key] = $this->User->find('first', array('recursive'=>-1, 'conditions'=>$conditions));
        		}
        	}        	
		}
		$this->set(compact('user'));
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido Usuário'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Usuário não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$cursos = $this->User->Curso->find('list');
		$sexos = $this->User->Sexo->find('list');
		$this->set(compact('groups', 'cursos', 'sexos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido Usuário'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Usuário não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$cursos = $this->User->Curso->find('list');
		$sexos = $this->User->Sexo->find('list');
		$this->set(compact('groups', 'cursos', 'sexos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Inválido Usuário'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuário delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuário não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}

	function geraSenha($tamanho = 6, $maiusculas = true, $numeros = true, $simbolos = false){
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';

		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;

		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
		$rand = mt_rand(1, $len);
		$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}
}