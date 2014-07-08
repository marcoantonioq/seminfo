<?php
App::uses('AppController', 'Controller');
/**
 * HoldingsProgramasHorarios Controller
 *
 * @property HoldingsProgramasHorario $HoldingsProgramasHorario
 */
class HoldingsProgramasHorariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->HoldingsProgramasHorario->recursive = 0;
		$this->set('holdingsProgramasHorarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HoldingsProgramasHorario->exists($id)) {
			throw new NotFoundException(__('Inválido holdings programas horario'));
		}
		$options = array('conditions' => array('HoldingsProgramasHorario.' . $this->HoldingsProgramasHorario->primaryKey => $id));
		$this->set('holdingsProgramasHorario', $this->HoldingsProgramasHorario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HoldingsProgramasHorario->create();
			if ($this->HoldingsProgramasHorario->save($this->request->data)) {
				$this->Session->setFlash(__('holdings programas horario foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('holdings programas horarionão pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$holdingsProgramas = $this->HoldingsProgramasHorario->HoldingsPrograma->find('list');
		$horarios = $this->HoldingsProgramasHorario->Horario->find('list');
		$this->set(compact('holdingsProgramas', 'horarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HoldingsProgramasHorario->exists($id)) {
			throw new NotFoundException(__('Inválido holdings programas horario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HoldingsProgramasHorario->save($this->request->data)) {
				$this->Session->setFlash(__('holdings programas horario foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('holdings programas horario não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('HoldingsProgramasHorario.' . $this->HoldingsProgramasHorario->primaryKey => $id));
			$this->request->data = $this->HoldingsProgramasHorario->find('first', $options);
		}
		$holdingsProgramas = $this->HoldingsProgramasHorario->HoldingsPrograma->find('list');
		$horarios = $this->HoldingsProgramasHorario->Horario->find('list');
		$this->set(compact('holdingsProgramas', 'horarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->HoldingsProgramasHorario->id = $id;
		if (!$this->HoldingsProgramasHorario->exists()) {
			throw new NotFoundException(__('Inválido holdings programas horario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HoldingsProgramasHorario->delete()) {
			$this->Session->setFlash(__('Holdings programas horario delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Holdings programas horario não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
