<?php
App::uses('AppModel', 'Model');
/**
 * HoldingsHorario Model
 *
 * @property HoldingsPrograma $HoldingsPrograma
 * @property Horario $Horario
 */
class HoldingsHorario extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'holdings_programa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'horario_id' => array(
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
		'HoldingsPrograma' => array(
			'className' => 'HoldingsPrograma',
			'foreignKey' => 'holdings_programa_id',
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
}
