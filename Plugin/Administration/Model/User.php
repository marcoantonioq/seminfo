<?php
App::uses('AdministrationAppModel', 'Administration.Model');
/**
 * User Model
 *
 * @property Group $Group
 * @property Course $Course
 * @property Courses $Courses
 * @property Contact $Contact
 * @property Content $Content
 * @property Holding $Holding
 * @property Message $Message
 */
class User extends AdministrationAppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $order = array('User.name' => 'asc');


	public $actsAs = array(
	    'Upload' => array(
	        'foto' => array(
	        	'field' => 'image',
	        	'field_dir' => 'image_dir',
	        )
	    )
	);


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sexo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cpf' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'validaCPF' => array(
				'rule' => array('validaCPF'),
				'message' => 'CPF inválido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Holding' => array(
			'className' => 'Holding',
			'foreignKey' => 'user_id',
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Message' => array(
			'className' => 'Message',
			'joinTable' => 'users_messages',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'message_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	public function beforeSave($options = array()) {

    	$this->data['User']['cpf'] = str_replace(array('.', '-'), '', $this->data['User']['cpf']);
    	$this->data['User']['phone'] = str_replace(array('.', '-', '(', ')', ' '), '', $this->data['User']['phone']);
		// pr($this->data); exit;
	    if (empty($this->data['User']['password'])) {
            unset($this->data['User']['password']);
        } else {
        	$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
	    return true;
    }  

    public function validaCPF($check){
    	$cpf = $check['cpf'];
    	$cpf = preg_replace('/[^0-9]/', '', $cpf);

    	if( strlen($cpf) != 11) {
    		return false;
    	}

    	$digitoA = 0;
    	$digitoB = 0;
    	for($i = 0, $x = 10; $i <= 8; $i++, $x--){
    		$digitoA += $cpf[$i] * $x;
    	}

    	for($i = 0, $x = 11; $i <= 9; $i++, $x--){
    		if (str_repeat($i, 11) == $cpf) { return false; }
    		$digitoB += $cpf[$i] * $x;
    	}

    	$somaA = ( ($digitoA%11) < 2 ) ? 0 : 11-($digitoA%11);
    	$somaB = ( ($digitoB%11) < 2 ) ? 0 : 11-($digitoB%11);

    	if($somaA != $cpf[9] || $somaB != $cpf[10]){
    		return false;
    	}else{
    		return true;
    	}
    	
    	return false;
    }

/**
 * credenciar method
 *
 * @var string
 */

	public function credenciar($users)
	{
		$message = "";		
		$status = true;
		// pr($users); 
		foreach ($users as $user) 
		{
			$participacoes = $this->Holding->find('all',array(
				'recursive'=>2,
				// 'fields'=>array('id', 'credenciado', 'program_id'),
				'conditions'=> array(
					"Holding.user_id"=>$user['User']['id']
				)
			));
			
			foreach ($participacoes as $participacao) 
			{
				$participacao['Holding']['credenciado'] = 1;
				if (!$this->Holding->save($participacao)) 
					$status = false;
			}
			$message .= ($status) ? 
				"<br>{$user['User']['name']}, foi credenciado com sucesso!":
				"<br>Erro ao credenciar {$user['User']['name']}!";				
		}

		return $message;

	}

}
