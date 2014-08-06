<?php
App::uses('Type', 'Administration.Model');

/**
 * Type Test Case
 *
 */
class TypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.type',
		'plugin.administration.content'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Type = ClassRegistry::init('Administration.Type');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Type);

		parent::tearDown();
	}

}
