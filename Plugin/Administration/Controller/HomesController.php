<?php
App::uses('AdministrationAppController', 'Administration.Controller');
/**
 * Homes Controller
 *
 * @property Home $Home
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HomesController extends AdministrationAppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('Homes'));
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Paginator', 
		'Session',
		'RequestHandler',
	);
	public $helpers = array(
		'Js' => array('Prototype'),
	);


/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post')) {
            $this->Paginator->settings = $this->Home->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'success');
        }
		// $this->Home->recursive = 0;
		$this->set('dados',$this->request->data);
		// $this->set('homes', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Home->exists($id)) {
			throw new NotFoundException(__('Inválido home'));
		}
		$options = array('conditions' => array('Home.' . $this->Home->primaryKey => $id));
		$this->set('home', $this->Home->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Home->create();
			if ($this->Home->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'error');
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
	public function edit($id = null) {
		if (!$this->Home->exists($id)) {
			throw new NotFoundException(__('Inválido home'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Home->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'error');
			}
		} else {
			$options = array('conditions' => array('Home.' . $this->Home->primaryKey => $id));
			$this->request->data = $this->Home->find('first', $options);
		}
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Home->id = $id;
		if (!$this->Home->exists()) {
			throw new NotFoundException(__('Inválido home'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Home->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function ajaxmsg(){ 
		// $this->layout = "ajax"; 
		//aqui poderiamos ter, requisições a banco de dados 
		//validações, chamada à outas DataSources etc.	
		$this->set("mensagem","Olá Mundo! CakePHP Ajax");	
	}
}
