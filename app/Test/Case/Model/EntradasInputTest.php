<?php
App::uses('EntradasInput', 'Model');

/**
 * EntradasInput Test Case
 *
 */
class EntradasInputTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entradas_input',
		'app.entrada',
		'app.paper',
		'app.input'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntradasInput = ClassRegistry::init('EntradasInput');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntradasInput);

		parent::tearDown();
	}

}
