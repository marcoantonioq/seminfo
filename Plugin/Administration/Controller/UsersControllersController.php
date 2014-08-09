<?php
App::uses('AdministrationAppController', 'Administration.Controller');
/**
 * UsersControllers Controller
 *
 */
class UsersControllersController extends AdministrationAppController {

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
