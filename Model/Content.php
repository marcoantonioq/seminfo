<?php
App::uses('AppModel', 'Model');
/**
 * Content Model
 *
 * @property Type $Type
 * @property Categoria $Categoria
 * @property User $User
 */
class Content extends AppModel {
	public $displayField = 'title';
	public $useTable = 'contents';
	public $order = array('Content.updated' => 'DESC');
	

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'categoria_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'body' => array(
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
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
/**
 * Pegar lista ordem desc provido e status == true
 *
 * @var array
 */
	
	public function getListPromote($conditions = array())
	{
		$defaultCondition = array(
			'recursive' => '-1',
			'limit' => 3,
			'order' => array(
				'Content.created' => 'DESC'
			),
			'conditions' => array(
				'Content.status' => true,
				'Content.promote' => true
			)
		);
		
		$conditions = array_merge($defaultCondition, $conditions);		
		return $this->find('list', $conditions);
	}

/**
 * Pegar paginação ordem desc 
 *
 * @var array
 */
	public function getConditionsPaginate( )
	{
		return array('limit' => 4, 
			'order' => array('Post.created' => 'DESC'), 
			'conditions' => array('Content.status' => '1' ));
	}

	/*public function isOwnedBy($post, $user) {
	    return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
	}*/
	
}
