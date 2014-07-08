<?php
App::uses('AppController', 'Controller');
/**
 * Holdings Controller
 *
 * @property Holding $Holding
 */
class HoldingsController extends AppController {

	public $user_id = "";

	public $components = array(
		'RequestHandler',
	);

	public $pdfConfig = array(
		'engine' => 'CakePdf.DomPdf',
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		App::uses('Component', 'Controller');
		//$this->Auth->allow('index', 'view');
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> paginate = $this->Holding->getConditions(array(
			'conditions' => array(
				'OR' => array('Holding.user_id' => $this->getUserId())
			)
		));
		$holdings = $this -> paginate();
		$this -> set(compact('holdings'));
	}

	public function admin_index() {
		$this -> Holding -> recursive = 0;
		$this -> set('holdings', $this -> paginate());
	}

	public function admin_credenciar() {
		$this -> Holding -> recursive = 0;
		$this -> set('holdings', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> Holding -> exists($id)) {
			throw new NotFoundException(__('Inválido'));
		}
		
		$options = array('conditions' => array('Holding.' . $this -> Holding -> primaryKey => $id));
		$holding = $this -> Holding -> find('first', $options);
		$this -> set(compact('holding'));
	}

	public function admin_view($id = null) {
		if (!$this -> Holding -> exists($id)) {
			throw new NotFoundException(__('Inválido'));
		}
		$options = array('conditions' => array('Holding.' . $this -> Holding -> primaryKey => $id));
		$this -> set('holding', $this -> Holding -> find('first', $options));
	}

	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> Holding -> create();
			if ($this -> Holding -> save($this -> request -> data)) {
				$this -> Session -> setFlash('Participação foi salvo','success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash('Participação não pôde ser salvo. Por favor, tente novamente.', 'error');
			}
		}
		$users = $this -> Holding -> User -> find('list');
		$events = $this -> Holding -> Event -> find('list');
		$this -> set(compact('users', 'events'));
	}
	/**
	 * update method
	 * @return void
	*/
	public function update($event_id = null) {
		if (!$this -> Holding -> Event -> exists($event_id)) {
			$this -> Session -> setFlash('Evento não existe.', 'error');
			return $this->redirect($this->referer());
		}
		$this->request->data = array('Holding' => array('user_id' => $this->getUserID(), 'event_id' => $event_id));
		$this -> request -> data = $this -> Holding -> getBeforeSave($this -> request -> data);
		if(!empty($this->request->data['Holding']['id'])){

			$this -> Session -> setFlash('Já esta inscrito. Veja nossa programação','success');
			return $this->redirect($this->referer());
		}elseif(!empty($this->request->data['Holding'])){
			if ( $this -> Holding -> saveAll($this -> request -> data) ) {
				$this -> Session -> setFlash('Foi salvo','success');
				return $this->redirect($this->referer());
			} else {
				$this -> Session -> setFlash('Participação não pôde ser salvo. Por favor, tente novamente.', 'error');
				return $this->redirect($this->referer());
			}
		}
	}

	/**
	 * admin_add method
	 *
	 * @return void
	*/
	public function admin_edit($id = null) {
		if (!$this -> Holding -> exists($id)) {
			throw new NotFoundException(__('Inválido holding'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			$this->Holding->User->recursive = -1;
			$users = $this->Holding->User->read('name', $this->request->data['Holding']['user_id']);
			$this->request->data['Holding']['alias'] = $users['User']['name'];
			if ($this -> Holding -> save($this -> request -> data)) {
				$this -> Session -> setFlash('Participação foi salvo','success');
				return $this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash('Participação não pôde ser salvo. Por favor, tente novamente.', 'error');
			}
		} else {
			$options = array('conditions' => array('Holding.' . $this -> Holding -> primaryKey => $id));
			$this -> request -> data = $this -> Holding -> find('first', $options);
		}
		$users = $this -> Holding -> User -> find('list');
		$events = $this -> Holding -> Event -> find('list');
		$this -> set(compact('users', 'events'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this -> Holding -> id = $id;
		if (!$this -> Holding -> exists()) {
			throw new NotFoundException(__('Inválido holding'));
		}
		$this -> request -> onlyAllow('post', 'delete');
		if ($this -> Holding -> delete()) {
			$this -> Session -> setFlash('Participação excluída', 'success');
			return $this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash('Participação não foi excluída','error');
		return $this -> redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this -> Holding -> id = $id;
		if (!$this -> Holding -> exists()) {
			throw new NotFoundException(__('Inválido holding'));
		}
		$this -> request -> onlyAllow('post', 'delete');
		if ($this -> Holding -> delete()) {
			$this -> Session -> setFlash(__('Holding delete'));
			return $this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash('Participação não foi excluída','error');
		return $this -> redirect(array('action' => 'index'));
	}
	

}
