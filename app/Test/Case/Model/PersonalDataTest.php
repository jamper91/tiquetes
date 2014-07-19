<?php
App::uses('PersonalData', 'Model');

/**
 * PersonalData Test Case
 *
 */
class PersonalDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.personal_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PersonalData = ClassRegistry::init('PersonalData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PersonalData);

		parent::tearDown();
	}

}
