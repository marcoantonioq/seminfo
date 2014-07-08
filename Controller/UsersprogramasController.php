<?php
App::uses('AppController', 'Controller');
/**
 * Usersprogramas Controller
 *
 * @property Usersprograma $Usersprograma
 */
class UsersprogramasController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public $components = array(
		'RequestHandler',
	);

	public $pdfConfig = array(
		'engine' => 'CakePdf.DomPdf',
	);

/**
 * index method
 *
 * @return void
 */
	
	public function index() {
		$id = $this->getUserID();
		if (!$this->Usersprograma->User->exists($id)) {
			$this->Session->setFlash('Você deve logar!');
			$this->redirect($this->referer());			
		}
		
		$this->Usersprograma->unbindModel(array('belongsTo' => array('User')));
		$this->paginate = array(
			'recursive' => 2,
			'conditions' => array(
				'Usersprograma.user_id' => $id
			),
			'order' => array(
				'Programa.horario_id' => 'DESC'
			)
		);
		$usersprogramas = $this->paginate();
		$this->set(compact('usersprogramas'));
	}

	public function admin_index() {
		$this->Usersprograma->recursive = 0;
		$usersprogramas = $this->paginate();
		//pr($usersprogramas);
		$this->set(compact('usersprogramas'));
	}

	public function admin_credenciamento($limit = 14) {
		$this->paginate = array('limit' => $limit);
		if ($this->request->is('post')) {
			$this->Usersprograma->create();
			if(!empty($this->request->data['Validade'])){
				//pr($this->request->data); 
				if (!empty($this->request->data['Validade']['search'])) {
					switch ($this->request->data['Validade']['conditions']) {
						case 1: $conditions = array('User.cpf' => $this->request->data['Validade']['search']);
							break;
						case 2: $conditions = array('User.name LIKE' => '%'.$this->request->data['Validade']['search']."%");
							break;
						case 3: $conditions = array('Programa.nome LIKE' => '%'.$this->request->data['Validade']['search']."%");
							break;
						case 4: $conditions = array('User.id' => $this->request->data['Validade']['search']);
							break;
						default:
							$conditions = array();												
							break;
					}
					$this->paginate = array('limit'=>$limit, 'conditions' => $conditions);
				}
			}			
		}
		$this->Usersprograma->recursive = 0;
		$usersprogramas = $this->paginate();
		$this->set(compact('usersprogramas'));
	}

	public function admin_process(){
		$this->layout = 'pdf';
		$this->render(false);
		$valida = true;
		$print = false;

		if($this->request->is('post')){
			if(!empty($this->request->data['Usersprograma']['action'])){
				foreach ($this->request->data['Usersprograma'] as $id => $value) {
					if(!empty($value['check'])){
						$usersprograma = $this->Usersprograma->find('first', array(
							'recursive' => -1,
							'conditions' => array(
								'Usersprograma.id' => $id
							)
						));

						foreach ($this->request->data['Usersprograma']['action'] as $key => $action) {
							switch ($action) {
								case 'status': $usersprograma['Usersprograma']['status'] = 1;
									break;
								case 'credenciado': $usersprograma['Usersprograma']['credenciado'] = 1;
									//$usersprograma['Usersprograma']['status'] = 1;
									break;
								case 'descredenciado': $usersprograma['Usersprograma']['credenciado'] = 0;
									break;
								case 'reservas': $usersprograma['Usersprograma']['reservas'] = 1;
									break;
								case 'presenca': 
									$usersprograma['Usersprograma']['presenca'] = 1;
									$usersprograma['Usersprograma']['credenciado'] = 1;
									break;
								case 'certificado': 
									if ($usersprograma['Usersprograma']['presenca'] >= 1) {
										$usersprograma['Usersprograma']['certificado'] = 1;
									}
									break;
								default:
									break;
							}
						}
						//pr($usersprograma);
						$valida = ($this->Usersprograma->save($usersprograma)) ? $valida : false;
					}
				}
			}
			if($valida){ $this->Session->setFlash('Todos registro atualizado.', 'success'); }
			else { $this->Session->setFlash('Não foi salvo.', 'error'); }			
		}
		return $this->redirect($this->referer());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Usersprograma->exists($id)) {
			throw new NotFoundException(__('Inválido participação'));
		}
		$options = array('conditions' => array('Usersprograma.' . $this->Usersprograma->primaryKey => $id));
		$this->set('usersprograma', $this->Usersprograma->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if (!$this->Usersprograma->User->exists($this->getUserID() )) {
			$this->Session->setFlash('Você deve logar!');
			$this->redirect($this->referer());
		}
		if (!$this->Usersprograma->Programa->exists($id)) {
			$this->Session->setFlash('Programa não existe.');
			$this->redirect($this->referer());
		}
		if ($this->request->is('post')) {
			$this->Usersprograma->create();
			if ($this->Usersprograma->save($this->request->data)) {
				$this->Session->setFlash('Cadastro realizado com sucesso.', 'success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Participação não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$users = $this->Usersprograma->User->find('list', array( 
			'conditions' => array( 'User.id' => $this->getUserID())
		));
		if (!empty($id)) {
			$programas = $this->Usersprograma->Programa->find('list', array('conditions' => array('Programa.id' => $id)));
			$programa = $this->Usersprograma->Programa->find('first', array('conditions' => array('Programa.id' => $id)));
			$this->set(compact('programa'));
		}else{
			$programas = $this->Usersprograma->Programa->find('list');
		}
		$this->set(compact('users', 'programas'));
	}

	public function admin_presenca($programa = null) {
		if ($this->request->is('post') && (!empty($this->request->data['Usersprograma']['codigo']))) {
			$options = array('recursive' => 1,'conditions' => array( 
				'Usersprograma.user_id' => $this->request->data['Usersprograma']['codigo'],
				'Usersprograma.programa_id' => $this->request->data['Usersprograma']['programa_id'],
			));
			$usersprograma = $this->Usersprograma->find('first', $options);
			
			if (!empty($usersprograma)) {
				$usersprograma['Usersprograma']['presenca'] += 1;
				$usersprograma['Usersprograma']['credenciado'] = 1;
				if ($this->Usersprograma->save($usersprograma['Usersprograma'])) {
					$this->Session->setFlash('Presença para '.$usersprograma['User']['id'].' - '.$usersprograma['User']['name'].' em '.
						$usersprograma['Programa']['nome'].'  - Total:'.$usersprograma['Usersprograma']['presenca'], 'success');
						$this->redirect(array('action' => 'presenca', $this->request->data['Usersprograma']['programa_id']));
				} else {
					$this->Session->setFlash('Presença não pôde ser salvo. Por favor, tente novamente.');
				}
			}else{
				$this->Usersprograma->create();
				$this->request->data = array(
					'Usersprograma' => array(
			            "user_id" => $this->request->data['Usersprograma']['codigo'],
			            "programa_id" => $this->request->data['Usersprograma']['programa_id'],
			            "status" => "1",
			            "credenciado" => "1",
			            "presenca" => "1",
			        )
				);
				if ($this->Usersprograma->save($this->request->data)) {
					$this->Session->setFlash(__('Participação foi salvo'), 'success');
					$this->redirect(array('action' => 'presenca', $this->request->data['Usersprograma']['programa_id']));
				} else {
					$this->Session->setFlash(__('A participação não pode ser salva. Por favor, tente novamente.'));
				}
			}
		}

		if ($this->Usersprograma->Programa->exists($programa)) { $this->request->data['Usersprograma']['programa_id'] = $programa;}
		$programas = $this->Usersprograma->Programa->find('list', array(
			'conditions'=>array(
				'Programa.status' => true,
				'Programa.vagas !=' => 0,
			)
		));
		$this->set(compact('programas'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Usersprograma->create();
			if ($this->Usersprograma->save($this->request->data)) {
				$this->Session->setFlash(__('participação foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A participação não pode ser salva. Por favor, tente novamente.'));
			}
		}
		$users = $this->Usersprograma->User->find('list');
		$programas = $this->Usersprograma->Programa->find('list');
		$this->set(compact('users', 'programas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Usersprograma->exists($id)) {
			throw new NotFoundException(__('Inválido participação'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usersprograma->save($this->request->data)) {
				$this->Session->setFlash(__('Participação foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Participação não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('Usersprograma.' . $this->Usersprograma->primaryKey => $id));
			$this->request->data = $this->Usersprograma->find('first', $options);
		}
		$users = $this->Usersprograma->User->find('list');
		$programas = $this->Usersprograma->Programa->find('list');
		$this->set(compact('users', 'programas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Usersprograma->id = $id;
		$usersprograma = $this->Usersprograma->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Usersprograma.id' => $id
			)
		));
		if (!$this->Usersprograma->exists() && empty($usersprograma) ) {
			throw new NotFoundException(__('Inválido participação'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usersprograma->delete()) {
			$this->Session->setFlash('Cancelada inscrição', 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Inscrição não foi excluída'), 'error');
		$this->redirect(array('action' => 'index'));
	}
	public function admin_delete($id = null) {
		$this->Usersprograma->id = $id;
		if (!$this->Usersprograma->exists()) {
			throw new NotFoundException(__('Inválido participação'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usersprograma->delete()) {
			$this->Session->setFlash(__('Usersprograma delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usersprograma não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}

	/**
	 * certificado method
	 *
	 * @throws NotFoundException
	 * @param string $programa
	 * @return void
	 */
	public function certificado($id = null){
		$this->layout = 'certificado';
		
		$participacao = $this -> Usersprograma -> find('first', array(
			'conditions' => array(
				'Usersprograma.id' => $id,
				'Usersprograma.certificado' => true,
				'Usersprograma.user_id' => $this->getUserID(),
			)
		));
		
		$programa = $this->Usersprograma->Programa->find('first', array(
			'conditions' => array(
				'Programa.id' => $participacao['Programa']['id'],
			)
		));
		
		$this->pdfConfig = array(
			'margin' => array(
		        'bottom' => 0,
		        'left' => 0,
		        'right' => 0,
		        'top' => 0
		    ),
		    'pageSize' => 'A4',
		    'orientation' => 'landscape',    
		    'download' => true,
		    'filename' => 'Certificado-'.$programa['Programa']['nome'].'.pdf'
        );


		//pr($participacao);
		//pr($programa);
		//exit;

		if(empty($participacao)){
			$this -> Session -> setFlash(__('Certificado inválido'), 'error');
			return $this -> redirect($this->referer());
		}

		define("LATIN1_UC_CHARS", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝ");
		define("LATIN1_LC_CHARS", "àáâãäåæçèéêëìíîïðñòóôõöøùúûüý");
		$replace = array(
			"[usuario]" => strtoupper(strtr($participacao['User']['name'], LATIN1_LC_CHARS, LATIN1_UC_CHARS)),
			"[cpf]" => $participacao['User']['cpf'],
			"[evento]" => $programa['Event']['nome'],
			"[local]" => $programa['Event']['local'],
			"[duracao]" => $programa['Programa']['duracao'],
			"[programa]" => $programa['Programa']['nome']
		);
		
		$participacao['Programa']['certificamos'] = str_replace(
			array_keys($replace),
			array_values($replace), 
			$participacao['Programa']['certificamos']
		);

		//$participacao['Programa']['certificamos'] = utf8_encode($participacao['Programa']['certificamos']);


		//echo $participacao['Programa']['certificamos']; exit();
		$this->set(compact('participacao', 'programa'));

	}

	public function admin_certificados( ){
		
		$this->layout = 'pdf';
		
		$this->pdfConfig = array(
			'margin' => array(
		        'bottom' => 0,
		        'left' => 0,
		        'right' => 0,
		        'top' => 0
		    ),
		    'pageSize' => 'A4',
		    'orientation' => 'portrait', 
		    'download' => false,
		    'filename' => 'Certificados'
        );

		$conditions = array(
			'recursive' => 0,
			'order' => array('User.name ASC'),
			'conditions' => array('Usersprograma.certificado' => true),
		);


		$usersprogramas = $this->Usersprograma->find('all', $conditions);
		//pr($usersprogramas); exit;
		$this->set(compact('usersprogramas'));

	}
}
