<?php
App::uses('AdministrationAppController', 'Administration.Controller');
/**
 * Holdings Controller
 *
 * @property Holding $Holding
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HoldingsController extends AdministrationAppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('Holdings'));
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post')) 
		{
            $this->Paginator->settings = $this->Holding->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        } 
        else if ($this->request->is('ajax')) {
        	$this->render("Holdings/ajax/presenca");
			$this->set('data', $this->request->data);
        }
		$this->Holding->recursive = 0;
		$this->set('holdings', $this->Paginator->paginate());

	}


/**
 * presenca method
 *
 * @return void
 */
	public function presence($id = null, $action = null) {
        if ($this->request->is('ajax')) {
			$this->set('var', $this->Holding->presence($id, $action));
        	$this->render("Holdings/ajax/presence");
        	return true;
        }
		if($this->request->is('post')){
			$message = "";
			foreach ($this->request->data['row'] as $id => $value) {
				$message .= $this->set('var', $this->Holding->presence($id, 'sum'));
			}
			echo $this->Session->setFlash('Presença confirmada!', 'layout/success');
		}
        $this->redirect($this->referer());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Holding->exists($id)) {
			throw new NotFoundException(__('Inválido holding'));
		}
		$options = array('conditions' => array('Holding.' . $this->Holding->primaryKey => $id));
		$this->set('holding', $this->Holding->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Holding->create();
			if ($this->Holding->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$users = $this->Holding->User->find('list');
		$programs = $this->Holding->Program->find('list');
		$this->set(compact('users', 'programs'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Holding->exists($id)) {
			throw new NotFoundException(__('Inválido holding'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Holding->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Holding.' . $this->Holding->primaryKey => $id));
			$this->request->data = $this->Holding->find('first', $options);
		}
		$users = $this->Holding->User->find('list');
		$programs = $this->Holding->Program->find('list');
		$this->set(compact('users', 'programs'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Holding->id = $id;
		if (!$this->Holding->exists()) {
			throw new NotFoundException(__('Inválido holding'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Holding->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
