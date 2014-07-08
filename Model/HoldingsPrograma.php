<?php
App::uses('AppModel', 'Model');
/**
 * HoldingsPrograma Model
 *
 * @property Holding $Holding
 * @property Programa $Programa
 * @property User $User
 * @property Event $Event
 * @property Horario $Horario
 */
class HoldingsPrograma extends AppModel {
	public $useTable = 'holdings_programas';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'holding_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Informe participação',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'programa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Informe programa',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'horario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Informe horario',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'Holding' => array(
			'className' => 'Holding',
			'foreignKey' => 'holding_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Programa' => array(
			'className' => 'Programa',
			'foreignKey' => 'programa_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		),
		'Horario' => array(
			'className' => 'Horario',
			'foreignKey' => 'horario_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		)
	);

	
	public function existsParticipaPrograma($programa, $user)
	{
		
		$holdings = $this->Holding->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Holding.user_id' => $user,
			)
		));
		
		
		$programas = $this->Programa->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Programa.id' => $programa
			),
		));
		
		$data = array(
		'HoldingsPrograma' => Array(
			'holding_id' => $holdings['Holding']['id'],
			'programa_id' => $programas['Programa']['id'],
		    'certificado' => null,
		    'reservas' =>  null,
		    'presenca' => null
		));
		
		$participa = $this->find('first', array(
			'recursive' => -1,
			'conditions' =>	array(
				'HoldingsPrograma.holding_id' => $data['HoldingsPrograma']['holding_id'],
				'HoldingsPrograma.programa_id' => $data['HoldingsPrograma']['programa_id'],
			),
		));
		if(empty($participa)){
			return $data;			
		}else{
			return $participa;
		}
	}

}
