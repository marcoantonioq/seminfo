<?php
App::uses('ProgramsSpeaker', 'Administration.Model');

/**
 * ProgramsSpeaker Test Case
 *
 */
class ProgramsSpeakerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.programs_speaker',
		'plugin.administration.program',
		'plugin.administration.speaker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProgramsSpeaker = ClassRegistry::init('Administration.ProgramsSpeaker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProgramsSpeaker);

		parent::tearDown();
	}

}
