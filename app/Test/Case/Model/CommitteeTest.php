<?php
App::uses('Committee', 'Model');

/**
 * Committee Test Case
 *
 */
class CommitteeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.committee',
		'app.event',
		'app.committees_event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Committee = ClassRegistry::init('Committee');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Committee);

		parent::tearDown();
	}

}
