<?php
App::uses('Validation', 'Model');

/**
 * Validation Test Case
 *
 */
class ValidationTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Validation = ClassRegistry::init('Validation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Validation);

		parent::tearDown();
	}

}
