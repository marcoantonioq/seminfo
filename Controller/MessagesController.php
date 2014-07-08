<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Messages Controller
 *
 * @property Message $Message
 */
class MessagesController extends AppController {

	public function admin_send(){
		if (!empty($this->request->data)){
			$Email = new CakeEmail('smtp');
			$Email->emailFormat('html');
			$Email->to($this->request->data['Message']['to']);
			$Email->subject($this->request->data['Message']['subject']);
			if($Email->send($this->request->data['Message']['message'] ) ){
				$this->Session->setFlash("Email enviado com sucesso", 'success');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash("Erro ao enviar email!", 'error');
			}
		}
	}

	public function sendAll($data = array()){
		$users = array();
		pr($data);

		echo "SendAll";
		foreach ($data['User']['User'] as $id) {
			echo "<p>".$id."<p>";
			$user = $this->Message->User->find('first', array(
				'recursive' => -1,
				'conditions' => array(
					'User.id' => $id,
					'User.status' => true
				)
			));
			$users += array($user['User']['email'] => $user['User']['name']);
		}
		pr($users);
		$Email = new CakeEmail();
		$Email->emailFormat('html');
		$Email->from(array('comissao@nucleo.p.ht' => 'Nucleo'));
		//$Email->to($this->request->data['Message']['to']);
		$Email->addBcc($users);
		$Email->subject($data['Message']['title']);
		
		if($Email->send($data['Message']['body'] ) ){
			$this->Session->setFlash("Email enviado com sucesso", 'success');
			$this->redirect(array('action' => 'index'));
		}else{
			$this->Session->setFlash("Erro ao enviar email!", 'error');
		}
	}

	public function admin_envio(){
		if (!empty($this->request->data)){
			$Email = new CakeEmail();
			$Email->template('email_tpl');
			$Email->emailFormat('html');
			$Email->viewVars(array('nome' => 'Marco Antônio'));
			$Email->from(array('comissao@nucleo.p.ht' => 'Nucleo'));
			$Email->to($this->request->data['Message']['to']);
			if($Email->send()){
				$this->Session->setFlash("Email enviado com sucesso", 'success');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash("Erro ao enviar email!", 'error');
			}
		}
	}

	public function admin_envios(){
		if (!empty($this->request->data)){
			$Email = new CakeEmail();
			$Email->emailFormat('html');
			$Email->from(array('comissao@nucleo.p.ht' => 'Nucleo'));
			//$Email->to($this->request->data['Message']['to']);
			$Email->addBcc(array('marco.aq@live.com'=>'marco.aq@live.com', 'marco.aq7@gmail.com' => 'Marco Antônio'));
			$Email->subject($this->request->data['Message']['subject']);
			
			if($Email->send($this->request->data['Message']['message'] ) ){
				$this->Session->setFlash("Email enviado com sucesso", 'success');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash("Erro ao enviar email!", 'error');
			}
		}
	}

	public function admin_index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Inválido message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			//$this->sendAll($this->request->data);
			//exit;
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('message foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Mensagem não pôde ser salvo. Por favor, tente novamente.'), 'error');
			}
		}
		$typemessages = $this->Message->Typemessage->find('list');
		$users = $this->Message->User->find('list');
		$this->set(compact('typemessages', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Inválido message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('message foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('message não pôde ser salvo. Por favor, tente novamente..'), 'error');
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
		}
		$typemessages = $this->Message->Typemessage->find('list');
		$users = $this->Message->User->find('list');
		$this->set(compact('typemessages', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Inválido message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Message->delete()) {
			$this->Session->setFlash(__('Message delete'), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Message não foi excluída'), 'error');
		$this->redirect(array('action' => 'index'));
	}
}
