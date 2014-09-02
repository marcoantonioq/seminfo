<?php
App::uses('AppController', 'Controller');
/**
 * UsersControllers Controller
 *
 */
class UsersControllersController extends AppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('UsersControllers'));
		$this->Auth->allow('index', 'add', 'view');
		parent::beforeFilter();
	}

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

}
