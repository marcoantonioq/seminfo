<?php

App::uses('AppController', 'Controller');

/**
 * HoldingsController Controller
 *
 * @property Holdings $Usersprograma
 */
class MobileController extends AppController {

    var $uses = 'Holding';

    public function beforeFilter() {

        $this->Auth->allow('validate', 'access');
        header('Access-Control-Allow-Origin: *');

        parent::beforeFilter();
    }
    public function beforeRender() {
        $this->layout = 'autentica';
    }

    public function app_access($id) {
        
        $this->loadModel('User');

        if ($this->User->exists($id)) {
            $this->loadModel('Holding');
            $this->Holding->recursive = 0;
            $this->Paginator->settings = array(
                'conditions' => array("Holding.user_id" => $id),
                'fields' => array('Holding.id', 'Program.name')
            );
            $holdings = $this->Paginator->paginate();
        } else {
            $holdings = "[{'Erro'}]";
        }
        $this->set(compact('holdings'));
    }

    public function app_validate($cpf,$senha) {
        $this->loadModel('User');
        pr($this->request->data);
        $user = $this->User->query("SELECT * FROM ifgoiano_seminfo2014.users WHERE cpf = $cpf AND password = $senha ;");
        pr($user);
        if(!empty($user[0]['users']))
        {
              echo 'Sim ';
        }
        
    }
}
