<?php
App::uses('AppModel', 'Model');
/**
 * Tipoprograma Model
 *
 */
class Tipoprograma extends AppModel {
	public $displayField = 'title';
	public $useTable = 'tipoprogramas';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
	);
}
