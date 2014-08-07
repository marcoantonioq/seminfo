<?php
App::uses('AdministrationAppController', 'Administration.Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AdministrationAppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('Users'));
		$this->Auth->allow('login', 'logout');
	}

	public $components = array('Mpdf'); 

/**
 * Components
 *
 * @var array
 */
	// public $components = array('Paginator', 'Session');


/**
 * login method
 *
 * @return void
 */
	function login() {
    	$this->layout = 'login';
    	if ($this->request->is('post')) {
            if ($this->Auth->login()) {
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
 * mensagens method
 *
 * @return int
 */
	public function mensagens_count(){
		if($this->request->is('requested')){
			$user = $this->getUser();
			$count = $this->User->UsersMessage->find('count', array(
        		'conditions' => array(
        			'UsersMessage.user_id' => $user['id']
    			)
			));
			return $count;
		}
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post')) {
            $this->Paginator->settings = $this->User->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'success');
        }
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}


/**
 * labels method
 *
 * @return void
 */
	public function labels() {

		if ($this->request->is('post')) 
		{
            $this->Paginator->settings = $this->User->action($this->request->data);
            $this->User->recursive = -1;
            $users = $this->Paginator->paginate();
            $this->set(compact('users'));

            // render pdf
			$this->layout = 'pdf';		
		    $this->Mpdf->init();
		    $this->Mpdf->setFilename('Etiquetas.pdf'); 		    
		    $this->Mpdf->setOutput('I');
		    $this->Mpdf->SetColumns(2);
        }
        else {
        	$this->redirect(array('action'=>'index'));
        }
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'error');
			}
		}
		$groups = $this->User->Group->find('list');
		$courses = $this->User->Course->find('list');
		$courses = $this->User->Course->find('list');
		$messages = $this->User->Message->find('list');
		$this->set(compact('groups', 'courses', 'courses', 'messages'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$courses = $this->User->Course->find('list');
		$courses = $this->User->Course->find('list');
		$messages = $this->User->Message->find('list');
		$this->set(compact('groups', 'courses', 'courses', 'messages'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Inválido user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}