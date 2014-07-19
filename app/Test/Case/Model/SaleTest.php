<?php
App::uses('Sale', 'Model');

/**
 * Sale Test Case
 *
 */
class SaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sale',
		'app.input',
		'app.input_state',
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
		'app.events_payment',
		'app.registration_type',
		'app.events_registration_type',
		'app.committees_events_person',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.inputs_sale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sale = ClassRegistry::init('Sale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sale);

		parent::tearDown();
	}

}
