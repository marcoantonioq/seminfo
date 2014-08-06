<?php
/**
 * ProgramsSpeakerFixture
 *
 */
class ProgramsSpeakerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'certificado' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'speaker_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_programas_palestrantes_programas1_idx' => array('column' => 'program_id', 'unique' => 0),
			'fk_programas_palestrantes_palestrantes1_idx' => array('column' => 'speaker_id', 'unique' => 0)
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
			'certificado' => 1,
			'program_id' => 1,
			'speaker_id' => 1
		),
	);

}
