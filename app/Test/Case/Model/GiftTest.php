<?php
App::uses('Gift', 'Model');

/**
 * Gift Test Case
 *
 */
class GiftTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gift'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Gift = ClassRegistry::init('Gift');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gift);

		parent::tearDown();
	}

}
