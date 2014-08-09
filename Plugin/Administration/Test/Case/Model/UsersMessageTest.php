<?php
App::uses('UsersMessage', 'Administration.Model');

/**
 * UsersMessage Test Case
 *
 */
class UsersMessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.users_message',
		'plugin.administration.user',
		'plugin.administration.message'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersMessage = ClassRegistry::init('Administration.UsersMessage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersMessage);

		parent::tearDown();
	}

}
