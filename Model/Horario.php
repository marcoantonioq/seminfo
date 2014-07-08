<?php
App::uses('AppModel', 'Model');
/**
 * Horario Model
 *
 * @property Programa $Programa
 * @property UsersPrograma $UsersPrograma
 */
class Horario extends AppModel {
	public $displayField = 'alias';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Programa' => array(
			'className' => 'Programa',
			'foreignKey' => 'horario_id',
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

	public function getDateArray($date = array()){
		return $date = $date['year']
		    .'-'.$date['month']
		    .'-'.$date['day']
		    .' '.$date['hour']
		    .':'.$date['min'];
	}

}
