<?php
App::uses('Stage', 'Model');

/**
 * Stage Test Case
 *
 */
class StageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stage',
		'app.city',
		'app.department',
		'app.user',
		'app.company',
		'app.person',
		'app.document_type',
		'app.data',
		'app.form',
		'app.personal_datum',
		'app.event',
		'app.event_type',
		'app.paper',
		'app.shelf',
		'app.location',
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
		'app.committee',
		'app.committees_event',
		'app.companies_event',
		'app.hotel',
		'app.events_hotel',
		'app.payment',
		'app.events_payment',
		'app.committees_events_person'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stage = ClassRegistry::init('Stage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stage);

		parent::tearDown();
	}

}
