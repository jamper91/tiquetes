<?php
App::uses('AuthorizationsUser', 'Model');

/**
 * AuthorizationsUser Test Case
 *
 */
class AuthorizationsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.authorizations_user',
		'app.user',
		'app.authorization'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AuthorizationsUser = ClassRegistry::init('AuthorizationsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AuthorizationsUser);

		parent::tearDown();
	}

}
