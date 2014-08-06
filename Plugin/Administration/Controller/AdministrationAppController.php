<?php

App::uses('AppController', 'Controller');

class AdministrationAppController extends AppController {
        
	public function beforeFilter() {
		parent::beforeFilter();
        $this->layout = 'admin';
        // $this->Auth->allow();
        // pr($this->request); exit;

    }

}
