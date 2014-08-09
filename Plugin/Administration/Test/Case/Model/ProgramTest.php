<?php
App::uses('Program', 'Administration.Model');

/**
 * Program Test Case
 *
 */
class ProgramTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.program',
		'plugin.administration.event',
		'plugin.administration.typeprogram',
		'plugin.administration.holding',
		'plugin.administration.speaker',
		'plugin.administration.programs_speaker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Program = ClassRegistry::init('Administration.Program');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Program);

		parent::tearDown();
	}

}
