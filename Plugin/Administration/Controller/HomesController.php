<?php
App::uses('AppController', 'Controller');
/**
 * Homes Controller
 *
 * @property Home $Home
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HomesController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->layout = "admin";
		$this->render("/Homes/index");
		$this->set('title_for_layout', __('Bem vindo'));
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
		
	}


/**
 * sobre method
 *
 * @throws NotFoundException
 * @param void
 * @return void
 */
	public function sobre() {

	}
}
