<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'indexRequest');
	}

	public function indexRequest() {
		$contents = $this -> Content -> find('all', $this->Content->getListPromote());
		return $contents;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}
	public function admin_index() {
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Conteúdo inválido'));
		}
		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$this->set('content', $this->Content->find('first', $options));
	}
	public function admin_view($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Inválido content'));
		}
		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$this->set('content', $this->Content->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			//pr($this->request->data);
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash('Conteúdo foi salvo', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Conteúdo não pôde ser salvo. Por favor, tente novamente.', 'error');
			}
		}
		$users = $this->Content->User->find('list', array('conditions' => array('User.id' => $this->getUserId())));
		$types = $this->Content->Type->find('list');
		$categorias = $this->Content->Categoria->find('list');
		$this->set(compact('users', 'types', 'categorias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Conteúdo inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			pr($this->request->data);
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash('Conteúdo foi salvo', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Conteúdo não pôde ser salvo. Por favor, tente novamente.', 'error');
			}
			
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
		}
		$users = $this->Content->User->find('list');
		$types = $this->Content->Type->find('list');
		$categorias = $this->Content->Categoria->find('list');
		$this->set(compact('users', 'types', 'categorias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Conteúdo inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Content->delete()) {
			$this->Session->setFlash('Conteúdo deletado', 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Conteúdo não foi deletado', 'error');
		$this->redirect(array('action' => 'index'));
	}
}
