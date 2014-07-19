<?php
App::uses('ActivitiesInput', 'Model');

/**
 * ActivitiesInput Test Case
 *
 */
class ActivitiesInputTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.activities_input',
		'app.activity',
		'app.event',
		'app.shelf',
		'app.entrada',
		'app.input'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ActivitiesInput = ClassRegistry::init('ActivitiesInput');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ActivitiesInput);

		parent::tearDown();
	}

}
