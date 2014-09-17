<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContentsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title_for_layout', __('Contents'));
        $this->Auth->allow('index', 'view');
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
            $this->Paginator->settings = $this->Content->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
        $this->Content->recursive = 0;
        $this->set('contents', $this->Paginator->paginate());
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
            throw new NotFoundException(__('Inválido content'));
        }
        $options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
        $this->set('content', $this->Content->find('first', $options));
    }
}
