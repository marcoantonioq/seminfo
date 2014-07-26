<?php
App::uses('AppModel', 'Model');
/**
 * Programa Model
 *
 * @property Event $Event
 * @property Holding $Holding
 * @property Horario $Horario
 * @property Palestrante $Palestrante
 */
class Programa extends AppModel {
	public $displayField = 'nome';
	public $useTable = 'programas';
	//public $oder = array('Programa.horario_id' => 'asc');
	public $actsAs = array(
		'Upload.Upload' => array(
			'file' => array(
				'fields' => array(
					'dir' => 'file_dir'
				)
			)
		)
	);	
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'event_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione um evento',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipoprograma_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione tipo',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'horario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione um horario',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nome' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vagas' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipoprograma' => array(
			'className' => 'Tipoprograma',
			'foreignKey' => 'tipoprograma_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Horario' => array(
			'className' => 'Horario',
			'foreignKey' => 'horario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Usersprograma' => array(
			'className' => 'Usersprograma',
			'foreignKey' => 'programa_id',
		)
	);
	public $hasAndBelongsToMany = array(
		'Palestrante' => array(
			'className' => 'Palestrante',
			'joinTable' => 'programas_palestrantes',
			'foreignKey' => 'programa_id',
			'associationForeignKey' => 'palestrante_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
	);
	
	/**
	 *	Regra busca de programas
	 * 	@param array $conditions
	 *  @return array conditions busca programas
	*/
	
	public function getProgramas($condition = array()){
		$defaultCondition = array(
			'order' => array('event_id' => 'asc'),
			'conditions' =>	array(
				'Programa.status' => '1',
				'Event.status' => '1',
			)
		);
		
		$condition = array_merge($defaultCondition, $condition);
		
		return $condition;
}
	}
