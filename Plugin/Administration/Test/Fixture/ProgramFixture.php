<?php
/**
 * ProgramFixture
 *
 */
class ProgramFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'typeprogram_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'local' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1', 'comment' => 'status do programa, caso o esteja false o inscrição e parada e os usuários não podem cancelar inscrição'),
		'price' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '5,2', 'unsigned' => false),
		'vagas' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'reservations' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'duration' => array('type' => 'string', 'null' => false, 'default' => '2 horas', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'content' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'date_begin' => array('type' => 'date', 'null' => false, 'default' => null),
		'date_end' => array('type' => 'date', 'null' => false, 'default' => null),
		'time_begin' => array('type' => 'time', 'null' => false, 'default' => null),
		'time_end' => array('type' => 'time', 'null' => false, 'default' => null),
		'min_presence' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'comment' => 'numero de presença q o usuário tem que ter para liberar certificado'),
		'file' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'file_dir' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'certify' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'certify_speakers' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'holding_count' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_programas_tipoprogramas1_idx' => array('column' => 'typeprogram_id', 'unique' => 0),
			'fk_programs_events1_idx' => array('column' => 'event_id', 'unique' => 0)
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
			'event_id' => 1,
			'typeprogram_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'local' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'price' => '',
			'vagas' => 1,
			'reservations' => 1,
			'duration' => 'Lorem ipsum dolor sit amet',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'date_begin' => '2014-08-06',
			'date_end' => '2014-08-06',
			'time_begin' => '15:59:05',
			'time_end' => '15:59:05',
			'min_presence' => 1,
			'file' => 'Lorem ipsum dolor sit amet',
			'file_dir' => 'Lorem ipsum dolor sit amet',
			'certify' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'certify_speakers' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2014-08-06 15:59:05',
			'updated' => '2014-08-06 15:59:05',
			'holding_count' => 1
		),
	);

}
