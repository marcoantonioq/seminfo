<?php
App::uses('AppController', 'Controller');
/**
 * HoldingsHorarios Controller
 *
 * @property HoldingsHorario $HoldingsHorario
 */
class HoldingsHorariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->HoldingsHorario->recursive = 0;
		$this->set('holdingsHorarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HoldingsHorario->exists($id)) {
			throw new NotFoundException(__('Inválido holdings horario'));
		}
		$options = array('conditions' => array('HoldingsHorario.' . $this->HoldingsHorario->primaryKey => $id));
		$this->set('holdingsHorario', $this->HoldingsHorario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HoldingsHorario->create();
			if ($this->HoldingsHorario->save($this->request->data)) {
				$this->Session->setFlash(__('holdings horario foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('holdings horarionão pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$holdingsProgramas = $this->HoldingsHorario->HoldingsPrograma->find('list');
		$horarios = $this->HoldingsHorario->Horario->find('list');
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
		if (!$this->HoldingsHorario->exists($id)) {
			throw new NotFoundException(__('Inválido holdings horario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HoldingsHorario->save($this->request->data)) {
				$this->Session->setFlash(__('holdings horario foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('holdings horario não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('HoldingsHorario.' . $this->HoldingsHorario->primaryKey => $id));
			$this->request->data = $this->HoldingsHorario->find('first', $options);
		}
		$holdingsProgramas = $this->HoldingsHorario->HoldingsPrograma->find('list');
		$horarios = $this->HoldingsHorario->Horario->find('list');
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
		$this->HoldingsHorario->id = $id;
		if (!$this->HoldingsHorario->exists()) {
			throw new NotFoundException(__('Inválido holdings horario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HoldingsHorario->delete()) {
			$this->Session->setFlash(__('Holdings horario delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Holdings horario não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
