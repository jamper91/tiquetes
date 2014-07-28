<?php
App::uses('Tormiquete', 'Model');

/**
 * Tormiquete Test Case
 *
 */
class TormiqueteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tormiquete'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tormiquete = ClassRegistry::init('Tormiquete');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tormiquete);

		parent::tearDown();
	}

}
