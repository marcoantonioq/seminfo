<?php
App::uses('AppModel', 'Model');
/**
 * Holding Model
 *
 * @property User $User
 * @property Event $Event
 * @property Programa $Programa
 */
class Holding extends AppModel {
	public $useTable = 'holdings';
	public $displayField = 'alias';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Usuário inválido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'event_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione evento válido',
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		)
	);

    /**
	 * beforeSave
	 * @return true
	 */	

	public function getBeforeSave($data = array()) {
		$holdings = $this->getHoldings($data);
		if(!empty($holdings)){
			$data = array_merge_recursive($data, $holdings);
		}
        return $data;
    }

    public function getHoldings($holdings){
    	$holdings = $this->find('first', 
			array(
				'recursive' => -1,
				'fields' => array('Holding.id'),
				'conditions' => array(
					'Holding.user_id' => $holdings['Holding']['user_id'],
					'Holding.event_id' => $holdings['Holding']['event_id']
				)
			)
		);
		return $holdings;
    }

	/**
	 * Método auxiliar para recuperar lista de regras
	 *
	 * @param $id_user, array $conditions
	 * @return array - lista de  regra usuários eventos
	 */
	public function getConditions($conditions = array())
	{
		$defaultCondition = array(
			'recursive' => 0, 
			'order' => array('Event.name' => 'asc')
		);

		$conditions = array_merge($defaultCondition, $conditions);

		return $conditions;
	}

	/**
	 * Método auxiliar para recuperar participação
	 *
	 * @param $event_id, array $conditions
	 */
	public function getHoldingConditions($conditions)
	{
		$defaultCondition = array(
			'recursive' => 0, 
			//'order' => array('Holding.created' => 'asc')
		);

		$conditions = array_merge($defaultCondition, $conditions);
		return $conditions;
	}
}
