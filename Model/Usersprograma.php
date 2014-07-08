<?php
App::uses('AppModel', 'Model');
/**
 * Usersprograma Model
 *
 * @property User $User
 * @property Programa $Programa
 * @property Horario $Horario
 */
class Usersprograma extends AppModel {	
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'participando' => array(
				'rule' => array('validateHolding','notempty'),
				'message' => 'Você estará ocupado nesse horário! :('
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Usuário invalido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'programa_id' => array(
			'vagas' => array(
				'rule' => array('validateVaga'),
				'message' => 'Não há vagas. :('
			),
			'status' => array(
				'rule' => array('validateStatus'),
				'message' => 'O programa esta desativado. :('
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Programa inválido',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'status' => array(
				'rule' => array('status'),
				'message' => 'Você deve confirmar participação',
				'allowEmpty' => false,
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true, //array('Usersprograma.presenca' => true),
			'counterScope' => array('Usersprograma.presenca >=' => 1)
		),
		'Programa' => array(
			'className' => 'Programa',
			'foreignKey' => 'programa_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		)
	);

	public function validateHolding($check){
		// se estiver editando não valida
		if(isset($this->data['Usersprograma']['id'])){ return true; }
		$programa = $this->Programa->read(null, $this->data['Usersprograma']['programa_id']);
		//pr($programa);
		// valida se o uruário já esta inscrito neste programa
		$this->unbindModel(array('belongsTo' => array('User')));
		$usersprograma = $this->find('all', array(
			'recursive' => 2,
			'conditions' => array(
				'Usersprograma.user_id' => $this->data['Usersprograma']['user_id'],
				'Programa.horario_id' => $programa['Horario']['id'],
				/*
				'or' => array(
					'Usersprograma.reservas' => true,
					'Usersprograma.status' => true,
				)
				*/
			)
		));
		//pr($programa); return false;
		return (empty($usersprograma)) ? true : false;
	}

	public function validateStatus(){
		if(isset($this->data['Usersprograma']['id'])){ return true; }
		$programa = $this->Programa->find('first',array(
			'recursive' -1,
			'conditions' => array(
				'Programa.id' => $this->data['Usersprograma']['programa_id'],
				'Programa.status' => true,
			)
		));
		// se o programa não estivar true não grava participação
		if(empty($programa)){ return false; }
		return true;
	}

	public function status(){
		if(isset($this->data['Usersprograma']['id'])){ return true; }
		// true
		return ($this->data['Usersprograma']['status']) ? true: false;
	}

	public function validateVaga(){
		// se estiver editando não valida
		if(isset($this->data['Usersprograma']['id'])){ return true; }
		
		if(!empty($this->data['Usersprograma']['reservas']) && $this->data['Usersprograma']['reservas'] == true){
			$this->data['Usersprograma']['reservas'] = 1;
			$this->data['Usersprograma']['status'] = 0;
			return true;
		}
		// validação horário
		$programa = $this->Programa->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Programa.id' => $this->data['Usersprograma']['programa_id']
			)
		));

		if($programa['Programa']['usersprograma_count']  >= $programa['Programa']['vagas']){ return false; }
		return true;
	}
}
