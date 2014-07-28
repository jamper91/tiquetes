<?php
App::uses('DeliveryMethod', 'Model');

/**
 * DeliveryMethod Test Case
 *
 */
class DeliveryMethodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delivery_method',
		'app.input',
		'app.delivery_methods_input'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DeliveryMethod = ClassRegistry::init('DeliveryMethod');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DeliveryMethod);

		parent::tearDown();
	}

}
