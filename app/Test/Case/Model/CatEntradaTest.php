<?php
App::uses('CatEntrada', 'Model');

/**
 * CatEntrada Test Case
 *
 */
class CatEntradaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cat_entrada',
		'app.cat',
		'app.entrada'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CatEntrada = ClassRegistry::init('CatEntrada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CatEntrada);

		parent::tearDown();
	}

}
