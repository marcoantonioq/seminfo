<?php

App::uses('AppController', 'Controller');

/**
 * HoldingsController Controller
 *
 * @property Holdings $Usersprograma
 */
class HoldingsController extends AppController {

    public function beforeFilter() {
        $this->set('title_for_layout', __('Holdings'));
        $this->Auth->allow('index', 'add', 'view', 'acesso');
        header('Access-Control-Allow-Origin: *');
        parent::beforeFilter();
    }

    public $components = array('Paginator', 'Session', 'Mpdf');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
       if ($this->Session->read('Auth.User.id')) {
            $this->Holding->recursive = 0;
            $this->Paginator->settings = array(
                'conditions' => array("Holding.user_id" => $this->Session->read("Auth.User.id"))
            );
            $holdings = $this->Paginator->paginate();
            //pr($holdings);
            $this->set(compact('holdings'));
        } else {
            //$this->redirect($this->referer());
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id = null) {

        if (!$this->Session->read('Auth.User.id')) {
            $this->Session->setFlash('Você deve logar!');
            $this->redirect($this->referer());
        }
        if (!$this->Holding->Program->exists($id)) {
            $this->Session->setFlash('Programa não existe.');
            $this->redirect($this->referer());
        }
        if ($this->request->is('post')) {
            $this->Holding->create();
            if ($this->Holding->save($this->request->data)) {
                $this->Session->setFlash('Cadastro realizado com sucesso.', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Participação não pôde ser salvo. Por favor, tente novamente.'));
            }
        }
        $users = $this->Holding->User->find('list', array(
            'conditions' => array('User.id' => $this->Session->read('Auth.User.id'))
        ));
        if (!empty($id)) {
            //$programs = $this->Holding->Program->find('list', array('conditions' => array('Program.id' => $id)));
            $programs = $this->Holding->Program->find('list', array('conditions' => array('Program.id' => $id)));
            $this->set(compact('programs'));
        } else {
            $programs = $this->Holding->Program->find('list', array('conditions' => array('Program.id' => $id)));
        }
        $this->set(compact('users', 'programs'));
    }

//  public function add() {
//		if ($this->request->is('post')) {
//			$this->Holding->create();
//			if ($this->Holding->save($this->request->data)) {
//				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
//			}
//		}
//		$users = $this->Holding->User->find('list');
//		$programs = $this->Holding->Program->find('list');
//		$this->set(compact('users', 'programs'));
//	}
    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Holding->id = $id;
        $holdings = $this->Holding->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Holding.id' => $id
            )
        ));
        if (!$this->Holding->exists() && empty($holdings)) {
            throw new NotFoundException(__('Inválido participação'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Holding->delete()) {
            $this->Session->setFlash('Cancelada inscrição', 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Inscrição não foi excluída'), 'error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * certificado method
     *
     * @throws NotFoundException
     * @param string $program
     * @return void
     */
    public function certificados($id = null) {
        $this->Holding->id = $id;
        if (!$this->Holding->exists()) {
            throw new NotFoundException(__('Participação inválida'));
        }

        $holding = $this->Holding->read(null, $id);
        $this->layout = 'pdf';
        if ($holding['Holding']['certificado']) {

            $this->set(compact('holding'));

            // render pdf
            $this->Mpdf->init(array('format' => "A4-L"));
            $this->Mpdf->SetDisplayMode('fullpage');
            $this->Mpdf->setFilename('Certificados.pdf');
            $this->Mpdf->setOutput('I');


            $this->render("Users/pdf/certificados");
        } else {
            $this->Session->setFlash(__('Certificado inválido, tente novamente.'), 'layout/error');
            return $this->redirect($this->referer());
        }
    }

}
