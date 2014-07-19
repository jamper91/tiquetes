<?php
App::uses('DeliveryMethodsInput', 'Model');

/**
 * DeliveryMethodsInput Test Case
 *
 */
class DeliveryMethodsInputTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delivery_methods_input',
		'app.delivery_method',
		'app.input'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DeliveryMethodsInput = ClassRegistry::init('DeliveryMethodsInput');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DeliveryMethodsInput);

		parent::tearDown();
	}

}
