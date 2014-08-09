<?php
App::uses('Link', 'Administration.Model');

/**
 * Link Test Case
 *
 */
class LinkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.link',
		'plugin.administration.menu'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Link = ClassRegistry::init('Administration.Link');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Link);

		parent::tearDown();
	}

}
