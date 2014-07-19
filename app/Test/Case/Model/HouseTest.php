<?php
App::uses('House', 'Model');

/**
 * House Test Case
 *
 */
class HouseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.house',
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
		$this->House = ClassRegistry::init('House');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->House);

		parent::tearDown();
	}

}
