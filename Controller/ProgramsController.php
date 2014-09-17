<?php
App::uses('AppController', 'Controller');
/**
 * Programs Controller
 *
 * @property Program $Program
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProgramsController extends AppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('Programs'));
		$this->Auth->allow('index', 'add', 'view');
		parent::beforeFilter();
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
            $this->loadModel('speakes');    
            if ($this->request->is('post')) {
                $this->Paginator->settings = $this->Program->action($this->request->data);
                echo $this->Session->setFlash('Filtro definido!', 'layout/success');

            }
            $this->Program->recursive = 0;
            $this->set('programs', $this->Paginator->paginate());        
	}
        
        public function requestIndex() {
		$programs = $this->Program -> find('list');
		return $programs;
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Program->exists($id)) {
			throw new NotFoundException(__('Inválido program'));
		}
		$options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
		$this->set('program', $this->Program->find('first', $options));
                //pr( $this->Program->find('first', $options));
	}
}
