<?php
App::uses('AppController', 'Controller');
/**
 * Homes Controller
 *
 * @property Home $Home
 */
class UrutaiController extends AppController {
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('seminfo2013');
	}

	public function seminfo2013(){
		$this->redirect(array('controller'=>'homes', 'action'=>'index'));
	}
}
