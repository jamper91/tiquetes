<?php
App::uses('CommitteesEvent', 'Model');

/**
 * CommitteesEvent Test Case
 *
 */
class CommitteesEventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.committees_event',
		'app.committee',
		'app.event',
		'app.person',
		'app.committees_events_person'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommitteesEvent = ClassRegistry::init('CommitteesEvent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommitteesEvent);

		parent::tearDown();
	}

}
