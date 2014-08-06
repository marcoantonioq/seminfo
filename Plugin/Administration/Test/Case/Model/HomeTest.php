<?php
App::uses('Home', 'Administration.Model');

/**
 * Home Test Case
 *
 */
class HomeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.home'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Home = ClassRegistry::init('Administration.Home');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Home);

		parent::tearDown();
	}

}
