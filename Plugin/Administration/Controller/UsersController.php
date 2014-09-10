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
		$this->Auth->allow('add', 'getseminfo2013', 'login');
	}

	public $components = array('Mpdf'); 

/**
 * Components
 *
 * @var array
 */
	// public $components = array('Paginator', 'Session');

	public function login(){
		$this->render(false);
		$this->redirect(
			array(
				'plugin'=>false, 
				'controller'=>'users', 
				'action'=>'login'
			)
		);
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
			// pr($this->request->data); exit;
            $this->Paginator->settings = $this->User->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
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
		$this->layout = 'pdf';
        $this->Paginator->settings = $this->User->action($this->request->data);
        $this->User->recursive = -1;
        $users = $this->Paginator->paginate();

        foreach ($users as $key => $user) {
        	$name = explode(" ", $user["User"]['name']);
        	if (!isset($name[1]))
        		continue;
        	$users[$key]['User']['name'] = $name[0]." ".$name[1];
        }
        
        $this->set(compact('users'));
	}

/**
 * credencar method
 *
 * @return void
 */
	public function credenciar( ) {
		if ($this->request->is('post')) {
            $this->Paginator->settings = $this->User->action($this->request->data);
            $this->User->recursive = -1;
            $users = $this->Paginator->paginate();
            $message = $this->User->credenciar($users);
            echo $this->Session->setFlash('Credenciamento realizado!'.$message, 'layout/success');

        }
        else {
        	$this->redirect(array('action'=>'index'));
        }
        
        $this->redirect(array('action'=>'index'));
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
		$programas = $this->User->Holding->Program->find("list");
		$user = $this->User->find('first', $options);
		$this->set(compact('user', 'programas'));
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
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
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
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
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
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * getUser Seminfo 2013 method 
 *
 * @throws NotFoundException
 * @param string $cpf
 * @return User
 */

	public function getseminfo2013($cpf) {
		if ($this->request->is('ajax')) {
			$json = null;
			$user = $this->User->query("SELECT * FROM ifgoiano_seminfo2013.users WHERE cpf = $cpf LIMIT 1;");
			if(!empty($user[0]['users']))
			{
				function encode_items(&$item, $key){
					$utf8 = $item;
					$item = mb_convert_encoding($utf8, 'ISO-8859-1', 'UTF-8');
				    // $item = utf8_encode($iso88591_2);
				}
				$user = $user[0]['users'];
				array_walk_recursive($user, 'encode_items');
				$json = json_encode($user);
				// echo json_last_error();
			}

			$this->set(compact('json'));
			$this->layout = "ajax";
			$this->render('Users/ajax/getseminfo2013');
			return true;
		} else {
			$this->redirect($this->referer());			
		}

	}
}
