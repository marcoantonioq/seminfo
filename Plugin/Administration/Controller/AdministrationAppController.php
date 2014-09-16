<?php

App::uses('AppController', 'Controller');

class AdministrationAppController extends AppController {
        
	public function beforeFilter() {
		parent::beforeFilter();
        $this->layout = 'admin';
        // $this->Auth->allow();
        // pr($this->request); exit;

        if($this->request->is('ajax')){
            $this->layout='ajax';
        }
    }

	public function status($id, $action, $status = null){
        // if($this->request->is("ajax")){
            $model = $this->modelClass;
            $id = $this->request->params['pass'][0];
            $action = $this->request->params['pass'][1];
            $this->$model->statusAjax($id, $action);
            $this->layout = "ajax";
            $this->render("/Common/ajax");
            return true;
        // }
        // $this->redirect($this->referer());
    }

}
