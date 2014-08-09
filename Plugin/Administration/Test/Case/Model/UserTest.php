<?php
App::uses('User', 'Administration.Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.user',
		'plugin.administration.group',
		'plugin.administration.course',
		'plugin.administration.courses',
		'plugin.administration.contact',
		'plugin.administration.content',
		'plugin.administration.holding',
		'plugin.administration.message',
		'plugin.administration.users_message'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('Administration.User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
