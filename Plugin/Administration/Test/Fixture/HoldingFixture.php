<?php
/**
 * HoldingFixture
 *
 */
class HoldingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'status' => array('type' => 'boolean', 'null' => true, 'default' => '1', 'comment' => 'status da paticipação do urutário'),
		'certificado' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'credenciado' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'reservas' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'presenca' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_users_programas_users1_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_users_programas_programas1_idx' => array('column' => 'program_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'program_id' => 1,
			'status' => 1,
			'certificado' => 1,
			'credenciado' => 1,
			'reservas' => 1,
			'presenca' => 1,
			'created' => '2014-08-06 15:54:57',
			'updated' => '2014-08-06 15:54:57'
		),
	);

}
