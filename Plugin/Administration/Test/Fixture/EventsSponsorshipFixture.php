<?php
/**
 * EventsSponsorshipFixture
 *
 */
class EventsSponsorshipFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'sponsorship_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_events_has_sponsorships_sponsorships1_idx' => array('column' => 'sponsorship_id', 'unique' => 0),
			'fk_events_has_sponsorships_events1_idx' => array('column' => 'event_id', 'unique' => 0)
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
			'event_id' => 1,
			'sponsorship_id' => 1,
			'id' => 1
		),
	);

}
