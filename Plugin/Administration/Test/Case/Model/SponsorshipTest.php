<?php
App::uses('Sponsorship', 'Administration.Model');

/**
 * Sponsorship Test Case
 *
 */
class SponsorshipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.sponsorship',
		'plugin.administration.event',
		'plugin.administration.events_sponsorship'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sponsorship = ClassRegistry::init('Administration.Sponsorship');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sponsorship);

		parent::tearDown();
	}

}
