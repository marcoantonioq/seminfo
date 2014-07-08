<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 * @property Curso $Curso
 * @property Sexo $Sexo
 * @property Content $Content
 * @property Holding $Holding
 */
class User extends AppModel {
	public $name = 'User';
	public $useTable = "users";
	public $displayField = 'name';
	public $order = array('User.name' => 'asc');

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
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Digite nome',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sexo_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Selecione sexo',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'unique' => array(
                'required' => true,
                'allowEmpty' => true,
                'rule' => 'isUnique',
                'message' => 'User name já está em uso.'
            )
		),
		'password' => array(
			'required' => false,
            'allowEmpty' => false,
            'rule' => 'comparePwd',
            'message' => 'Incompatibilidade de senha ou menos de 6 caracteres.'
		),
		'email' => array(
			'email' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'email',
                'message' => 'Email inválido.',
                'last' => true
            ),
            'unique' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'isUnique',
                'message' => 'e-mail já está em uso.'
            )
		),
		'cpf' => array(
			'cpf' => array(
				'rule' => array('validaCPF', 'isUnique', 'notempty'),
				'message' => 'Verifique o número digitado. Informação obrigatória para geração de certificado'
			),
			'unique' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'isUnique',
                'message' => 'CPF já está em uso. Informação obrigatória para geração de certificado.'
            ),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Informação obrigatória para geração de certificado'
			),
			'between' => array(
                'rule'    => array('maxlength', 14),
                'message' => 'No minimo 14 carácter'
            )
		),
		'telefone' => array(
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
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sexo' => array(
			'className' => 'Sexo',
			'foreignKey' => 'sexo_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
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
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Programa' => array(
			'className' => 'Programa',
			'joinTable' => 'usersprogramas',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'programa_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => '',
			'counterCache' => true,
			'counterScope' => array('Usersprograma.presenca >=' => 1)
		)
	);
	
    public function beforeSave($options = array()) {
    	//pr($this->data);
    	$this->data['User']['cpf'] = str_replace(array('.', '-'), '', $this->data['User']['cpf']);
    	//pr($this->data); exit;
	    if (empty($this->data['User']['password'])) { # empty password -> não update
            unset($this->data['User']['password']);
        } else {
        	$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
            //$this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
        }
        //echo "<hr>"; pr($this->data); exit;
	    return true;
    }  

    public function comparePwd($check) {
        $check['password'] = trim($check['password']);

        if (!isset($this->data['User']['id']) && strlen($check['password']) < 6) {
            return false;
        }

        if (isset($this->data['User']['id']) && empty($check['password'])) {
            return true;
        }

        $r = ($check['password'] == $this->data['User']['password2'] && strlen($check['password']) >= 6);

        if (!$r) {
            $this->invalidate('password2', __d('user', 'Senha inválida.'));
        }

        return $r;
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
	 * Método auxiliar para recuperar lista com usuários ativos
	 *
	 * @param array $conditions
	 * @return array - lista de usuários (equivalente a User::find('list'))
	 */
	public function getList($conditions = array())
	{
		$defaultCondition = array('User.status' => 1);

		$conditions = array_merge($defaultCondition, $conditions);

		return $this->find('list', array('conditions' => $conditions));
	}

}
