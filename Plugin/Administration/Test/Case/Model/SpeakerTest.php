<?php
App::uses('Speaker', 'Administration.Model');

/**
 * Speaker Test Case
 *
 */
class SpeakerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.speaker',
		'plugin.administration.program',
		'plugin.administration.programs_speaker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Speaker = ClassRegistry::init('Administration.Speaker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Speaker);

		parent::tearDown();
	}

}
