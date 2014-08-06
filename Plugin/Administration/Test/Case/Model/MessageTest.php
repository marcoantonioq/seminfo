<?php
App::uses('Message', 'Administration.Model');

/**
 * Message Test Case
 *
 */
class MessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.message',
		'plugin.administration.user',
		'plugin.administration.users_message'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Message = ClassRegistry::init('Administration.Message');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Message);

		parent::tearDown();
	}

}
