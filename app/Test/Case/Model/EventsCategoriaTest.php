<?php
App::uses('EventsCategoria', 'Model');

/**
 * EventsCategoria Test Case
 *
 */
class EventsCategoriaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.events_categoria',
		'app.categoria',
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
		'app.paper',
		'app.entrada',
		'app.entradas_input',
		'app.categorias_entrada',
		'app.delivery_method',
		'app.delivery_methods_input',
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
		'app.discount',
		'app.gift',
		'app.validation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsCategoria = ClassRegistry::init('EventsCategoria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsCategoria);

		parent::tearDown();
	}

}
