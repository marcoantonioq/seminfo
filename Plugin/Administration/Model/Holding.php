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
			'participando' => array(
				'rule' => array('validateHolding'),
				'message' => 'Você estará ocupado nesse horário! :('
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'notempty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'presenceValidade' => array(
				'rule' => array('presenceValidade'),
				'message' => 'Já possui presença hoje. :('
			),
		),
		'program_id' => array(
			'vagas' => array(
				'rule' => array('validateVaga'),
				'message' => 'Não há vagas. :('
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'presenca' => array(
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		'message' => 'Apenas numeros',
		// 		'allowEmpty' => true,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
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
			'counterCache' => true,
			'counterScope' => array(
              'Holding.status' => 1,
              'Holding.credenciado' => 1
            )
		),
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'program_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		)
	);

	public function beforeSave($option = array()){

		
	}


/**
 * valida presence
 *
 * @var array
 */

	public function presenceValidade($check){
		if(empty($this->data['Holding']['date_presenca']))
			return true;


		$this->recursive = -1;
		$holding = $this->read(null, $this->data['Holding']['id']);

		// pr($holding);
		// pr($this->data);
		
		if($holding['Holding']['presenca'] != $this->data['Holding']['presenca'])
		{

			$hoje = date('Ymd');
			$date_presenca = date('Ymd', strtotime($this->data['Holding']['date_presenca']));

			if( !empty($this->data['Holding']['id']) && !empty($this->data['Holding']['presenca']) && $hoje != $date_presenca )
			{
				$this->data['Holding']['date_presenca'] = date("Y-m-d h:m:s");
				$this->data['Holding']['presenca'] += 1;
			}

		}
		
		// Caso presence >= min_presence program certificate = true
		if(!empty($this->data['Holding']['program_id'])){
			$program = $this->Program->read(null, $this->data['Holding']['program_id']);
			if($this->data['Holding']['presenca'] >= $program['Program']['min_presence']) {
				$this->data['Holding']['certificado'] = true;
			}else{
				$this->data['Holding']['certificado'] = false;
			}
		}

		return true;
	}


	/**
 * status method
 *
 * @var array
 */

	public function status($id, $status = null){
		$status = $this->read(array('id', 'status'), $id);
		$status['Holding']['status'] = ($status['Holding']['status'] == 0) ? 0 : 1;
		$this->save($status);
		return $status['Holding']['status'];
	}


/**
 * validateHolding method
 *
 * @var inpud
 */


	public function validateHolding($check){
		if (isset($this->data['Holding']['id'])){
			return true;
		}
		$this->Program->recursive = -1;
		$program = $this->Program->read(null, $this->data['Holding']['program_id']);
		// pr($this->data); pr($program);
		$this->unbindModel(array('belongsTo' => array('User')));
		$Holding = $this->find('all', array(
			'recursive' => 1,
			'conditions' => array(
				'Holding.user_id' => $this->data['Holding']['user_id'],
				'Program.date_begin >= ' => $program['Program']['date_begin'],
				'Program.date_end <=' => $program['Program']['date_end'],
				'Program.time_begin >= ' => $program['Program']['time_begin'],
				'Program.time_end <= ' => $program['Program']['time_end'],
			)
		));
		// pr($Holding);
		// exit;
		// return false;
		return (empty($Holding)) ? true : false;
	}

	public function validateVaga(){
		if (isset($this->data['Holding']['id'])){
			return true;
		}
		$holdings_count= $this->find('count', array(
			'recursive' => -1,
			'conditions' => array(
				'Holding.program_id' => $this->data['Holding']['program_id'],
				'Holding.status' => true,
			)
		));

		$program = $this->Program->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Program.id' => $this->data['Holding']['program_id']
			)
		));

		if( $holdings_count >= $program['Program']['vagas'] ){ 
			return false; 
		}
		return true;
		
	}

	public function getHolding($user, $program){
		$holding = $this->find('first', array(
			'recursive' => -1,
			'conditions'=>array(
				'Holding.program_id' => $user,
				'Holding.user_id' => $program
			)
		));
		return $holding;

	}
}
