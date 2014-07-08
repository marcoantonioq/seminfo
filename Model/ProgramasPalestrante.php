<?php
App::uses('AppModel', 'Model');
/**
 * ProgramasPalestrante Model
 *
 * @property Programa $Programa
 * @property Palestrante $Palestrante
 */
class ProgramasPalestrante extends AppModel {
	public $useTable = 'programas_palestrantes';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'programa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'palestrante_id' => array(
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
		'Programa' => array(
			'className' => 'Programa',
			'foreignKey' => 'programa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Palestrante' => array(
			'className' => 'Palestrante',
			'foreignKey' => 'palestrante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
