<?php
App::uses('CategoriasEntrada', 'Model');

/**
 * CategoriasEntrada Test Case
 *
 */
class CategoriasEntradaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorias_entrada',
		'app.categoria',
		'app.entrada'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriasEntrada = ClassRegistry::init('CategoriasEntrada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriasEntrada);

		parent::tearDown();
	}

}
