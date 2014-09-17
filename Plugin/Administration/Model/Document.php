<?php
App::uses('AdministrationAppModel', 'Administration.Model');
/**
 * Document Model
 *
 * @property Program $Program
 */
class Document extends AdministrationAppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	public $actsAs = array(
	    'Upload' => array(
	        'anexo' => array(
	        	'field' => 'file',
	        	'field_dir' => 'file_dir',
	        )
	    )
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array())
	{
		// pr($this->data); exit;
	}
}
