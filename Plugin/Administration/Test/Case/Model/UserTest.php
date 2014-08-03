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
		'plugin.administration.curso',
		'plugin.administration.document',
		'plugin.administration.sexo',
		'plugin.administration.contact',
		'plugin.administration.content',
		'plugin.administration.type',
		'plugin.administration.categoria',
		'plugin.administration.holding',
		'plugin.administration.event',
		'plugin.administration.programa',
		'plugin.administration.tipoprograma',
		'plugin.administration.horario',
		'plugin.administration.usersprograma',
		'plugin.administration.palestrante',
		'plugin.administration.programas_palestrante',
		'plugin.administration.message',
		'plugin.administration.typemessage',
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
