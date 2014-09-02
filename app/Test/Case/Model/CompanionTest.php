<?php
App::uses('Companion', 'Model');

/**
 * Companion Test Case
 *
 */
class CompanionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.companion',
		'app.person',
		'app.document_type',
		'app.city',
		'app.state',
		'app.country',
		'app.company',
		'app.event',
		'app.stage',
		'app.location',
		'app.paper',
		'app.categoria',
		'app.discount',
		'app.gift',
		'app.validation',
		'app.entrada',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.shelf',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.entradas_input',
		'app.sale',
		'app.inputs_sale',
		'app.categorias_entrada',
		'app.event_type',
		'app.authorizations_user',
		'app.user',
		'app.type_user',
		'app.department',
		'app.log',
		'app.authorization',
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
		'app.data',
		'app.committees_events_person'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Companion = ClassRegistry::init('Companion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Companion);

		parent::tearDown();
	}

}
