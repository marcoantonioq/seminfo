<?php
App::uses('Content', 'Administration.Model');

/**
 * Content Test Case
 *
 */
class ContentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.content',
		'plugin.administration.user',
		'plugin.administration.type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Content = ClassRegistry::init('Administration.Content');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Content);

		parent::tearDown();
	}

}
