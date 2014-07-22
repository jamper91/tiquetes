<?php
App::uses('DeliveryMethod', 'Model');

/**
 * DeliveryMethod Test Case
 *
 */
class DeliveryMethodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delivery_method',
		'app.input',
		'app.input_state',
		'app.person',
		'app.document_type',
		'app.city',
		'app.state',
		'app.country',
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
		'app.forms_personal_datum',
		'app.committee',
		'app.committees_event',
		'app.companies_event',
		'app.hotel',
		'app.events_hotel',
		'app.payment',
		'app.events_payment',
		'app.registration_type',
		'app.events_registration_type',
		'app.data',
		'app.forms_personal_data',
		'app.user',
		'app.type_user',
		'app.department',
		'app.authorization',
		'app.authorizations_user',
		'app.committees_events_person',
		'app.delivery_methods_input',
		'app.sale',
		'app.inputs_sale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DeliveryMethod = ClassRegistry::init('DeliveryMethod');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DeliveryMethod);

		parent::tearDown();
	}

}
