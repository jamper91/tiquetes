<?php
App::uses('InputState', 'Model');

/**
 * InputState Test Case
 *
 */
class InputStateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.input_state',
		'app.input'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InputState = ClassRegistry::init('InputState');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InputState);

		parent::tearDown();
	}

}
