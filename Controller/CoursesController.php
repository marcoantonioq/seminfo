<?php

App::uses('AppController', 'Controller');

/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoursesController extends AppController {

    public function beforeFilter() {
        $this->set('title_for_layout', __('Courses'));
        $this->Auth->allow('index', 'view');
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
            $this->Paginator->settings = $this->Course->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
        $this->Course->recursive = 0;
        $this->set('courses', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Inválido course'));
        }
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
        $this->set('course', $this->Course->find('first', $options));
    }

}
