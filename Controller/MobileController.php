<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * HoldingsController Controller
 *
 * @property Holdings $Usersprograma
 */
class MobileController extends AppController {

    var $uses = 'Holding';

    public function beforeFilter() {
        $this->Auth->allow('app_validate', 'app_access');
        header('Access-Control-Allow-Origin: *');

        parent::beforeFilter();
    }
    public function beforeRender() {
        $this->layout = 'autentica';
    }

    public function app_access($code,$id) {
        
        $this->loadModel('User');
        if($code == 'app'){
            if ($this->User->exists($id)) {
                $this->loadModel('Holding');
                 $this->loadModel('Typeprograms');
                $this->Holding->recursive = 0;
                $this->Paginator->settings = array(
                    'conditions' => array("Holding.user_id" => $id),
                    'fields' => array('User.name','Holding.id','Holding.certificado','Holding.credenciado','Holding.id', 'Program.name', 'Program.date_begin', 'Program.date_end', 'Program.time_begin', 'Program.time_end', 'Program.min_presence')
                );
                $holdings = $this->Paginator->paginate();
              
            } else {
                $holdings = "[{'Erro'}]";
            }
            $this->set(compact('holdings'));
        }else{
             $this->redirect(array('app'=>false,'controller'=>'contents'));
        }
    }

    public function app_validate() {
        
        $this->loadModel('User'); 
        $this->request->data = array('email'=>'jonatas@nascimento.com','password'=>'123456');   
        if(!empty($this->request->data)){
            

            $options = array(
                            'conditions' => array(
                                    'User.email' => $this->request->data['email'],
                                    'User.password' => AuthComponent::password($this->request->data['password']) 
                            ),
                             'fields' => array('User.id', 'User.name')   
            );
            $this->User->recursive = -1;
            $user = $this->User->find('first',$options);

            if(empty($user))
            {        
                $user = "[{'Erro'}]"; 
            }
            $this->set(compact('user'));
        }else{
            $this->redirect(array('app'=>false,'controller'=>'contents'));
        }
            
    }
}
