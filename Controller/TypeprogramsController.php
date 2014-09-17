<?php
App::uses('AppController', 'Controller');
/**
 * Typeprograms Controller
 *
 * @property Typeprogram $Typeprogram
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TypeprogramsController extends AppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('Typeprograms'));
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
		if ($this->request->is('post')) {
            $this->Paginator->settings = $this->Typeprogram->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->Typeprogram->recursive = 0;
		$this->set('typeprograms', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Typeprogram->exists($id)) {
			throw new NotFoundException(__('Inválido typeprogram'));
		}
		$options = array('conditions' => array('Typeprogram.' . $this->Typeprogram->primaryKey => $id));
		$this->set('typeprogram', $this->Typeprogram->find('first', $options));
	}


}
