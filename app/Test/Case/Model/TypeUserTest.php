<?php
App::uses('TypeUser', 'Model');

/**
 * TypeUser Test Case
 *
 */
class TypeUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.type_user',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TypeUser = ClassRegistry::init('TypeUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TypeUser);

		parent::tearDown();
	}

}
