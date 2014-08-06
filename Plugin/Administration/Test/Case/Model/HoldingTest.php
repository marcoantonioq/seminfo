<?php
App::uses('Holding', 'Administration.Model');

/**
 * Holding Test Case
 *
 */
class HoldingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.holding',
		'plugin.administration.user',
		'plugin.administration.program'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Holding = ClassRegistry::init('Administration.Holding');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Holding);

		parent::tearDown();
	}

}
