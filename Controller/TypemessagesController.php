<?php
App::uses('AppController', 'Controller');
/**
 * Typemessages Controller
 *
 * @property Typemessage $Typemessage
 */
class TypemessagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Typemessage->recursive = 0;
		$this->set('typemessages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Typemessage->exists($id)) {
			throw new NotFoundException(__('Inválido Tipo de mensagem'));
		}
		$options = array('conditions' => array('Typemessage.' . $this->Typemessage->primaryKey => $id));
		$this->set('typemessage', $this->Typemessage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Typemessage->create();
			if ($this->Typemessage->save($this->request->data)) {
				$this->Session->setFlash(__('Tipo de mensagem foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Tipo de mensagem pôde ser salvo. Por favor, tente novamente.'));
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
		if (!$this->Typemessage->exists($id)) {
			throw new NotFoundException(__('Inválido Tipo de mensagem'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Typemessage->save($this->request->data)) {
				$this->Session->setFlash(__('Tipo de mensagem foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Tipo de mensagem não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('Typemessage.' . $this->Typemessage->primaryKey => $id));
			$this->request->data = $this->Typemessage->find('first', $options);
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
		$this->Typemessage->id = $id;
		if (!$this->Typemessage->exists()) {
			throw new NotFoundException(__('Inválido Tipo de mensagem'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Typemessage->delete()) {
			$this->Session->setFlash('Tipo de mensagem apagado', 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Typemessage não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
