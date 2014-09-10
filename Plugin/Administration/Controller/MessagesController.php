<?php
App::uses('AdministrationAppController', 'Administration.Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MessagesController extends AdministrationAppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('Messages'));
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post')) {
            $this->Paginator->settings = $this->Message->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->Message->recursive = 0;
		$this->set('messages', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Inválido message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
	}


/**
 * send method
 *
 * @return void
 */
	public function send( ) {
		if ($this->request->is('post')) {

			if(!empty($this->request->data['rowuser'])){
				
				$options['recursive'] = -1;

				foreach ($this->request->data['rowuser'] as $id => $value) {
					if($value){
						$options['conditions']['OR'][] = array("User.id"=>$id);
					}
				}
				
				$users = $this->Message->User->find("all", $options);
				$this->request->data = array();
				$this->request->data['User'] = array();

				foreach ($users as $key => $user) {
					$this->request->data['User'][$key] = $user['User'];
				}
				unset($this->request->data['rowuser']);
			}


			if(!empty($this->request->data['Message'])) {
				$bcc = array();
				foreach ($this->request->data["User"]["User"] as $key => $id) {
					$user = $this->Message->User->find("first", array(
						'recursive'=>-1,
						'conditions' => array(
							"User.id" => $id
						)
					));
					$bcc[] = $user['User']['email'];
				}

    			if(!empty($bcc)){
					$Email = new CakeEmail('smtp');
					$Email->to($bcc);
					// $Email->bcc($bcc);
					$Email->emailFormat('html');
					$Email->subject($this->request->data['Message']['title']);
					if($Email->send($this->request->data['Message']['body'])){
						$this->Message->save($this->request->data);
						$this->Session->setFlash("Enviado com sucesso", 'success');
						return $this->redirect(array('action'=>'index'));
					}else{
						$this->Session->setFlash("Erro ao enviar email!", 'error');
					}
    			}
			}
		}
		$users = $this->Message->User->find('list');
		$this->set(compact('users'));

		$this->render("/Messages/add");
	}	


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Inválido message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
		}
		$users = $this->Message->User->find('list');
		$this->set(compact('users'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Inválido message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Message->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
