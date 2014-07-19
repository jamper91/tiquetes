<?php
App::uses('CommitteesEventsPerson', 'Model');

/**
 * CommitteesEventsPerson Test Case
 *
 */
class CommitteesEventsPersonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.committees_events_person',
		'app.person',
		'app.committees_event',
		'app.committee',
		'app.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommitteesEventsPerson = ClassRegistry::init('CommitteesEventsPerson');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommitteesEventsPerson);

		parent::tearDown();
	}

}
