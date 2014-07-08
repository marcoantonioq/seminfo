<?php
App::uses('AppController', 'Controller');
/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 */
class CategoriasController extends AppController {
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Categoria->recursive = 0;
		$categorias = $this->paginate();
		
		if ($this->request->is('requested')) {
			return $categorias;
        }else{
            $this->set(compact('categorias'));
        }
	}
	public function admin_index() {
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Inválido categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$categoria = $this->Categoria->find('first', $options);
		
		
		
		$this->set(compact('categoria'));
		
	}
	public function admin_view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Inválido categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash('Categoria foi salvo', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Categoria não pôde ser salva. Por favor, tente novamente.', 'error');
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
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Inválido categoria'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash('Categoria foi salva', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Categoria não pôde ser salva. Por favor, tente novamente..', 'error');
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
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
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Inválido categoria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash('Categoria deletada', 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Categoria não foi excluída','error');
		$this->redirect(array('action' => 'index'));
	}
}
