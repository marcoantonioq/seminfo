<?php
App::uses('AppController', 'Controller');
/**
 * UsersControllers Controller
 *
 */
class UsersControllersController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('UsersControllers'));
	}

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

}
