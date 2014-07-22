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
		'app.state',
		'app.country',
		'app.company',
		'app.person',
		'app.document_type',
		'app.data',
		'app.forms_personal_data',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.event',
		'app.event_type',
		'app.form',
		'app.personal_datum',
		'app.forms_personal_datum',
		'app.paper',
		'app.entrada',
		'app.category',
		'app.paper_input',
		'app.committee',
		'app.committees_event',
		'app.companies_event',
		'app.hotel',
		'app.events_hotel',
		'app.payment',
		'app.events_payment',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.sale',
		'app.inputs_sale',
		'app.user',
		'app.type_user',
		'app.department',
		'app.authorization',
		'app.authorizations_user',
		'app.committees_events_person'
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
