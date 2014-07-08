<?php
App::uses('AppController', 'Controller');
/**
 * HoldingsProgramas Controller
 *
 * @property HoldingsPrograma $HoldingsPrograma
 */
class HoldingsProgramasController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();		
		//$this -> Auth -> allow('delete', 'add');
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HoldingsPrograma->recursive = 0;
		$this->set('holdingsProgramas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function admin_view($id = null) {
		if (!$this->HoldingsPrograma->exists($id)) {
			throw new NotFoundException(__('Inválido holdings programa'));
		}
		$options = array('conditions' => array('HoldingsPrograma.' . $this->HoldingsPrograma->primaryKey => $id));
		$this->set('holdingsPrograma', $this->HoldingsPrograma->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 	public function add($programa = null) {
 		if((!$this->HoldingsPrograma->Programa->exists($programa))){
 			throw new NotFoundException('Programa inválido');
 		}
		
		$this->request->data = $this->HoldingsPrograma -> existsParticipaPrograma($programa, $this->Auth->user('id'));

		$this->HoldingsPrograma->create();
		if ($this->HoldingsPrograma->save($this->request->data)) {
			$this->Session->setFlash('Participação em programa foi salvo','success');
			return $this->redirect(array('controller' => 'holdings','action' => 'index'));
		} else {
			$this->Session->setFlash('Participação em programa não pôde ser salvo. Por favor, tente novamente..','error');
			
		}
	}
 
	public function admin_add() {
		if ($this->request->is('post')) {			
			$this->HoldingsPrograma->create();
			if ($this->HoldingsPrograma->save($this->request->data)) {
				$this->Session->setFlash('Participação em programa foi salvo','success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Participação em programa não pôde ser salvo. Por favor, tente novamente..','error');
			}
		}
		$holdings = $this->HoldingsPrograma->Holding->find('list');
		$programas = $this->HoldingsPrograma->Programa->find('list');
		$horarios = $this->HoldingsPrograma->Horario->find('list');
		$this->set(compact('holdings', 'programas', 'users', 'events', 'horarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->HoldingsPrograma->exists($id)) {
			throw new NotFoundException(__('Inválido holdings programa'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HoldingsPrograma->save($this->request->data)) {
				$this->Session->setFlash('Participação em programa foi salvo','success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Participação em programa não pôde ser salvo. Por favor, tente novamente..','error');
			}
		} else {
			$options = array('conditions' => array('HoldingsPrograma.' . $this->HoldingsPrograma->primaryKey => $id));
			$this->request->data = $this->HoldingsPrograma->find('first', $options);
		}
		$holdings = $this->HoldingsPrograma->Holding->find('list');
		$programas = $this->HoldingsPrograma->Programa->find('list');
		$horarios = $this->HoldingsPrograma->Horario->find('list');
		$this->set(compact('holdings', 'programas', 'users', 'events', 'horarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {

		$this->HoldingsPrograma->id = $id;
		if (!$this->HoldingsPrograma->exists()) {
			throw new NotFoundException(__('Inválido participação em programa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HoldingsPrograma->delete()) {
			$this->Session->setFlash('Participação em programa excluída', 'success');
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Participação em programa excluída', 'error');
		return $this->redirect(array('action' => 'index'));
	}
	
	public function delete($id = null) {
		$holdings = $this->HoldingsPrograma -> find('first', 
			array(
				'recursive' => 0, 
				'conditions' => array(
					'Holding.user_id' => $this->getUserID(),
					'HoldingsPrograma.id' => $id
				)
			)
		);
		if(!empty($holdings)){
			$this->HoldingsPrograma->id = $id;
			if ((!$this->HoldingsPrograma->exists())) {
				throw new NotFoundException(__('Participação em programa inválido'));
			}
			$this->request->onlyAllow('post', 'delete');
			if ($this->HoldingsPrograma->delete()) {
				$this->Session->setFlash('Participação em programa excluída', 'success');
				return $this->redirect($this->referer());
			}
		}
		$this->Session->setFlash('Participação em programa não excluída', 'error');
		return $this->redirect($this->referer());
	}


/**
 * certificado lock
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_certificado($id = null) {
		$this->HoldingsPrograma->id = $id;
		if (!$this->HoldingsPrograma->exists()) {
			throw new NotFoundException(__('Participação inválida'));
		}
		$this->request->data = $this->HoldingsPrograma->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'HoldingsPrograma.id' => $id
			)
		));
		
		$this->request->data['HoldingsPrograma']['certificado']	= (!$this->request->data['HoldingsPrograma']['certificado']);
		if ($this->HoldingsPrograma->save($this->request->data)) {
			$this->Session->setFlash(__('Certificado'), 'success');
			return $this->redirect($this->referer());
		} else {
			$this->Session->setFlash(__('Erro..'),'error');
		}
	}
}
