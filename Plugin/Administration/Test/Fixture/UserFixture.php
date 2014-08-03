<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => '2', 'unsigned' => false, 'key' => 'index'),
		'curso_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'matricula' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sexo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cpf' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 14, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'website' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'image' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'image_dir' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'message_count' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'usersprograma_count' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'email_UNIQUE' => array('column' => 'email', 'unique' => 1),
			'cpf_UNIQUE' => array('column' => 'cpf', 'unique' => 1),
			'fk_users_cursos2_idx' => array('column' => 'curso_id', 'unique' => 0),
			'fk_users_grupos1_idx' => array('column' => 'group_id', 'unique' => 0),
			'fk_users_sexos1_idx' => array('column' => 'sexo_id', 'unique' => 0)
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
			'group_id' => 1,
			'curso_id' => 1,
			'matricula' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'sexo_id' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'cpf' => 'Lorem ipsum ',
			'telefone' => 'Lorem ipsum d',
			'status' => 1,
			'website' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'image_dir' => 'Lorem ipsum dolor sit amet',
			'message_count' => 1,
			'usersprograma_count' => 1,
			'updated' => '2014-08-03 13:32:07',
			'created' => '2014-08-03 13:32:07'
		),
	);

}
