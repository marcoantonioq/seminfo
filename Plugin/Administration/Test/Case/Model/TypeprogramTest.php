<?php
App::uses('Typeprogram', 'Administration.Model');

/**
 * Typeprogram Test Case
 *
 */
class TypeprogramTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.typeprogram',
		'plugin.administration.program'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Typeprogram = ClassRegistry::init('Administration.Typeprogram');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Typeprogram);

		parent::tearDown();
	}

}
