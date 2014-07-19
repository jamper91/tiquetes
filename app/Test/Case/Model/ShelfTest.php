<?php
App::uses('Shelf', 'Model');

/**
 * Shelf Test Case
 *
 */
class ShelfTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shelf',
		'app.location',
		'app.stage',
		'app.city',
		'app.department',
		'app.user',
		'app.person',
		'app.document_type',
		'app.company',
		'app.event',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.data',
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
		'app.committee',
		'app.committees_event',
		'app.companies_event',
		'app.hotel',
		'app.events_hotel',
		'app.payment',
		'app.events_payment',
		'app.committees_events_person',
		'app.type_user',
		'app.authorization',
		'app.authorizations_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Shelf = ClassRegistry::init('Shelf');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Shelf);

		parent::tearDown();
	}

}
