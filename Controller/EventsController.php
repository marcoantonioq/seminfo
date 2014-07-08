<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('index', 'view', 'recustIndex');
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this -> Event -> recursive = -1;

		if ($this -> request -> is('requested')) {
			$this -> paginate = $this->Event->getConditionsAtivo();
			$events = $this -> paginate();
			return $events;
		}
		
		$events = $this -> paginate();

		$this -> set(compact('events'));
	}
	
	public function recustIndex() {
		$events = $this -> Event -> find('list', array('recursive' => -1));		
		return $events;
	}

	public function admin_index() {
		$this -> Event -> recursive = 0;
		$this -> set('events', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this -> Event -> exists($id)) {
			throw new NotFoundException(__('Evento inválido'));
		}

		$this -> Event -> recursive = 2;
		$this-> Event->unbindModel(array('hasMany' => array('Holding')));
		$event = $this -> Event -> find('first', array('conditions' => array('Event.id' => $id ) ));
		$this -> set(compact('event'));
	}

	public function admin_view($id = null) {
		if (!$this -> Event -> exists($id)) {
			throw new NotFoundException(__('Inválido event'));
		}
		$event = $event = $this -> Event -> read(null, $id);
		$this -> set(compact('event'));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> Event -> create();
			if ($this -> Event -> save($this -> request -> data)) {
				$this -> Session -> setFlash('Evento foi salvo', 'success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash('Evento não pôde ser salvo. Por favor, tente novamente.', 'error');
			}
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */

	public function admin_edit($id = null) {
		if (!$this -> Event -> exists($id)) {
			throw new NotFoundException(__('Inválido event'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Event -> save($this -> request -> data)) {
				$this -> Session -> setFlash('event foi salvo', 'success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash('Evento não pôde ser salvo. Por favor, tente novamente.', 'error');
			}
		} else {
			$options = array('conditions' => array('Event.' . $this -> Event -> primaryKey => $id));
			$this -> request -> data = $this -> Event -> find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this -> Event -> id = $id;
		if (!$this -> Event -> exists()) {
			throw new NotFoundException(__('Inválido event'));
		}
		$this -> request -> onlyAllow('post', 'delete');
		if ($this -> Event -> delete()) {
			$this -> Session -> setFlash('Evento apagado', 'success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash('Evento não foi excluído', 'error');
		$this -> redirect(array('action' => 'index'));
	}

}
