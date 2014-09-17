<?php
App::uses('Document', 'Administration.Model');

/**
 * Document Test Case
 *
 */
class DocumentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.document',
		'plugin.administration.program',
		'plugin.administration.event',
		'plugin.administration.sponsorship',
		'plugin.administration.events_sponsorship',
		'plugin.administration.typeprogram',
		'plugin.administration.holding',
		'plugin.administration.user',
		'plugin.administration.group',
		'plugin.administration.course',
		'plugin.administration.contact',
		'plugin.administration.content',
		'plugin.administration.type',
		'plugin.administration.message',
		'plugin.administration.users_message',
		'plugin.administration.speaker',
		'plugin.administration.programs_speaker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Document = ClassRegistry::init('Administration.Document');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Document);

		parent::tearDown();
	}

}
