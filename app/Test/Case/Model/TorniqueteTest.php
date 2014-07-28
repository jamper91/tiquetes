<?php
App::uses('Torniquete', 'Model');

/**
 * Torniquete Test Case
 *
 */
class TorniqueteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.torniquete',
		'app.entrada',
		'app.paper',
		'app.event',
		'app.stage',
		'app.city',
		'app.state',
		'app.country',
		'app.company',
		'app.person',
		'app.document_type',
		'app.data',
		'app.forms_personal_datum',
		'app.personal_datum',
		'app.form',
		'app.input',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.shelf',
		'app.location',
		'app.delivery_method',
		'app.delivery_methods_input',
		'app.entradas_input',
		'app.sale',
		'app.inputs_sale',
		'app.user',
		'app.type_user',
		'app.department',
		'app.log',
		'app.authorization',
		'app.authorizations_user',
		'app.committees_event',
		'app.committee',
		'app.committees_events_person',
		'app.companies_event',
		'app.hotel',
		'app.events_hotel',
		'app.event_type',
		'app.payment',
		'app.events_payment',
		'app.entradas_torniquete'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Torniquete = ClassRegistry::init('Torniquete');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Torniquete);

		parent::tearDown();
	}

}
