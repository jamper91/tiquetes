<?php
App::uses('Pregunta', 'Model');

/**
 * Pregunta Test Case
 *
 */
class PreguntaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pregunta',
		'app.respuesta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pregunta = ClassRegistry::init('Pregunta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pregunta);

		parent::tearDown();
	}

}
