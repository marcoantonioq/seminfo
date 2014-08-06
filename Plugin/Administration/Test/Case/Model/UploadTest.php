<?php
App::uses('Upload', 'Administration.Model');

/**
 * Upload Test Case
 *
 */
class UploadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.upload'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Upload = ClassRegistry::init('Administration.Upload');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Upload);

		parent::tearDown();
	}

}
