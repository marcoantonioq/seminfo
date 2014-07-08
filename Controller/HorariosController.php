<?php
App::uses('AppController', 'Controller');
/**
 * Horarios Controller
 *
 * @property Horario $Horario
 */
class HorariosController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = array(
			'recursive' => 2,
			'order' => array(
				'Horario.inicio' => 'asc'
			),
			'conditions' => array(
				'Horario.status' => true,
				'Horario.termino > ' => date('Y/m/d H:i:s')
			)
		);
		$horarios = $this->paginate();
		$this->set(compact('horarios'));
	}
	public function admin_index() {
		$this->paginate = array(
			'recursive' => -1,
			'order' => array(
				'Horario.inicio' => 'asc'
			),
			'conditions' => array(
				'Horario.status' => true
			)
		);
		$horarios = $this->paginate();
		//pr($horarios);
		$this->set(compact('horarios'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Horario->exists($id)) {
			throw new NotFoundException(__('Inválido horario'));
		}
		$options = array('conditions' => array('Horario.' . $this->Horario->primaryKey => $id));
		$this->set('horario', $this->Horario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Horario->create();
			$this->request->data['Horario']['alias'] .= ' '.date('H:i', strtotime($this->request->data['Horario']['inicio'])).' - '.
			date('H:i', strtotime($this->request->data['Horario']['termino']));
			if ($this->Horario->save($this->request->data)) {
				$this->Session->setFlash(__('horario foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('horarionão pôde ser salvo. Por favor, tente novamente.'), 'error');
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
		if (!$this->Horario->exists($id)) {
			throw new NotFoundException(__('Inválido horario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			/*
			echo $data = $this->Horario->getDateArray($this->request->data['Horario']['inicio']);
			echo '<p>'.$data2 = $this->Horario->getDateArray($this->request->data['Horario']['termino']);
		    

			$data = $this->request->data['Horario']['inicio'];
			$datetime1 = new DateTime($data['hour'].':'.$data['min'].':00');
			$data = $this->request->data['Horario']['termino'];
			$datetime2 = new DateTime($data['hour'].':'.$data['min'].':00');
			$interval = $datetime1->diff($datetime2);
			$this->request->data['Horario']['duracao'] = $interval->format('%H:%I:%S');
			*/

			$this->request->data['Horario']['alias'] .= ' '.date('H:i', strtotime($this->request->data['Horario']['inicio'])).' - '.
			date('H:i', strtotime($this->request->data['Horario']['termino']));

			if ($this->Horario->save($this->request->data)) {
				$this->Session->setFlash(__('horario foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('horario não pôde ser salvo. Por favor, tente novamente..'), 'error');
			}
		} else {
			$options = array('conditions' => array('Horario.' . $this->Horario->primaryKey => $id));
			$this->request->data = $this->Horario->find('first', $options);
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
		$this->Horario->id = $id;
		if (!$this->Horario->exists()) {
			throw new NotFoundException(__('Inválido horario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Horario->delete()) {
			$this->Session->setFlash(__('Horario delete'), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Horario não foi excluída'), 'error');
		$this->redirect(array('action' => 'index'));
	}
}
