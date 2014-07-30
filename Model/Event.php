<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property Holding $Holding
 * @property Programa $Programa
 */
class Event extends AppModel {
	public $displayField = 'nome';
	public $useTable = 'events';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'local' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Holding' => array(
			'className' => 'Holding',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => ''

		),
		'Programa' => array(
			'className' => 'Programa',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	/**
	 * Método auxiliar para recuperar lista com eventos ativos
	 *
	 * @param array $conditions
	 * @return array - lista de eventos (equivalente a User::find('list'))
	 */
	public function getConditionsAtivo($conditions = array())
	{
		$defaultCondition = array(
			'recursive' => -1, 
			'conditions' => array('
				Event.publicado' => '1'
			)
		);

		$conditions = array_merge($defaultCondition, $conditions);

		return $conditions;
	}

	/**
	 * Método auxiliar para recuperar lista com eventos ativos
	 *
	 * @param array $conditions
	 * @return array - lista de eventos (equivalente a User::find('list'))
	 */
	public function getConditions($conditions = array())
	{
		$defaultCondition = array(
			'recursive' => -1,
			'group' => array(
				'Programa.id', 
				'Programa.event_id'
			), 
			'filed' => 'Palestrante.id'
		);

		$conditions = array_merge($defaultCondition, $conditions);

		return $conditions;
	}

}