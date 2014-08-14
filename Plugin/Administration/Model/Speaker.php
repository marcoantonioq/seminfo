<?php
App::uses('AdministrationAppModel', 'Administration.Model');
/**
 * Speaker Model
 *
 * @property Program $Program
 */
class Speaker extends AdministrationAppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	
	public $actsAs = array(
	    'Upload' => array(
	        'foto' => array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Program' => array(
			'className' => 'Program',
			'joinTable' => 'programs_speakers',
			'foreignKey' => 'speaker_id',
			'associationForeignKey' => 'program_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
