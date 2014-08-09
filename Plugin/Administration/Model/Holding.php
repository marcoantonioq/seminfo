<?php
App::uses('AdministrationAppModel', 'Administration.Model');
/**
 * Holding Model
 *
 * @property User $User
 * @property Program $Program
 */
class Holding extends AdministrationAppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'program_id' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */

	public function participacao($id, $action = ""){
		
		$participacao = $this->read(array('id', 'presenca', 'date_presenca'), $id);
		
		$hoje = date('Ymd');
		$date_presenca = date('Ymd', strtotime($participacao['Holding']['date_presenca']));

		if( $hoje == $date_presenca )
		{
			return "<span class=\"red\">Esta participação já possui presença hoje: </span>".$participacao['Holding']['presenca'];
		} 
		else 
		{
			$participacao['Holding']['date_presenca'] = date("Y-m-d h:m:s");
			if($action == 'sum') $participacao['Holding']['presenca'] += 1;
			if($action == 'sub') $participacao['Holding']['presenca'] -= 1;
			$this->save($participacao);
			return $participacao['Holding']['presenca'];
		}

	}

	/**
 * belongsTo associations
 *
 * @var array
 */

	public function status($id, $status){
		$status = $this->read(array('id', 'status'), $id);
		$status['Holding']['status'] = ($status['Holding']['status'] == 0) ? 0 : 1;
		$this->save($status);
		return $status['Holding']['status'];
	}
}
