<?php
App::uses('EntradasTorniquete', 'Model');

/**
 * EntradasTorniquete Test Case
 *
 */
class EntradasTorniqueteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entradas_torniquete',
		'app.entrada',
		'app.paper',
		'app.input',
		'app.entradas_input',
		'app.torniquete'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntradasTorniquete = ClassRegistry::init('EntradasTorniquete');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntradasTorniquete);

		parent::tearDown();
	}

}
