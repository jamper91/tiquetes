<?php
App::uses('Authorization', 'Model');

/**
 * Authorization Test Case
 *
 */
class AuthorizationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.authorization',
		'app.user',
		'app.authorizations_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Authorization = ClassRegistry::init('Authorization');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Authorization);

		parent::tearDown();
	}

}
