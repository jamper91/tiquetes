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
		'app.document_type',
		'app.city',
		'app.department',
		'app.user',
		'app.type_user',
		'app.authorization',
		'app.authorizations_user',
		'app.company',
		'app.event',
		'app.stage',
		'app.location',
		'app.shelf',
		'app.paper',
		'app.entrada',
		'app.category',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.sale',
		'app.inputs_sale',
		'app.paper_input',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.data',
		'app.committee',
		'app.committees_event',
		'app.companies_event',
		'app.hotel',
		'app.events_hotel',
		'app.payment',
		'app.events_payment'
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
