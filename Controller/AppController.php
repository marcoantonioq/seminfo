<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

/**
 * Components
 *
 * @var array
 */
    public $components = array(
        'Paginator',
        'RequestHandler',
        'Security' => array(
            'csrfUseOnce' => false,
            "validatePost" => false,
            "enabled" => false,
            "csrfCheck" => false,
        ),
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password'
                    ),
                    'scope'  => array(
                        'User.status' => 1
                    )
                )
            ),
            // /*
            'authError' => 'Você não possui autorização para executar esta ação.',
            'authorize' => array('Controller'),
            'loginAction' => array(
                'admin' => null,
                'plugin' => 'administration',
                'controller' => 'users',
                'action' => 'login'
            ),
            'loginRedirect' => array('admin' => false,'controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('admin' => false,'controller' => 'users', 'action' => 'index'),
            // */
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->validatePost = false;
        $this->layout = 'user';
        if (!env('HTTPS')){ 
            $this->Security->blackHoleCallback = 'forceSSL'; 
            $this->Security->requireSecure(); 
        }
        if($this->request->is('ajax')){
            $this->layout='ajax';
        }
        
        $this->Auth->allow();
        // $this->Auth->deny();

    }

    public function forceSSL() {
        return $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }

    public function isAuthorized($user = null){

        if ( isset($this->request->params['plugin'] )) {
            if ( $this->request->params['plugin'] == 'administration') {
                return (bool)($user['group_id'] == 1);
            }
        }

        return true;


        // Apenas os administradores podem acessar as funções de administrador
        if (isset($this->request->params['admin'])) {
            //pr($this->request); exit;
            return (bool)($user['group_id'] == 1);            
        }
        //somente o admin tem acesso a /admin/controller/action
        if (empty($this->request->params['admin'])) {
            return true;
        }
        // Default deny
        return false;
    }

    public function status($id, $action, $status = null){
        // if($this->request->is("ajax")){
            $model = $this->modelClass;
            $id = $this->request->params['pass'][0];
            $action = $this->request->params['pass'][1];
            $this->$model->statusAjax($id, $action);
            $this->layout = "ajax";
            $this->render("/Common/ajax");
            // return true;
        // }
        // $this->redirect($this->referer());
    }
}