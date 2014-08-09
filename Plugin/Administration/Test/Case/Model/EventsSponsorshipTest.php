<?php
App::uses('EventsSponsorship', 'Administration.Model');

/**
 * EventsSponsorship Test Case
 *
 */
class EventsSponsorshipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.events_sponsorship',
		'plugin.administration.event',
		'plugin.administration.sponsorship'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsSponsorship = ClassRegistry::init('Administration.EventsSponsorship');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsSponsorship);

		parent::tearDown();
	}

}
