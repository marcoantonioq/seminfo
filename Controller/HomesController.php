<?php
App::uses('AppController', 'Controller');
/**
 * Homes Controller
 *
 * @property Home $Home
 */
class HomesController extends AppController {
	public function beforeFilter(){
		$this->Auth->allow('index', 'view');
		parent::beforeFilter();
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this -> layout = 'user_home';
		//$this -> layout = 'manutencao';
	}

	public function admin_index() {
		
	}
}
