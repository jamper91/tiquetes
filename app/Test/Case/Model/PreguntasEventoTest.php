<?php
App::uses('PreguntasEvento', 'Model');

/**
 * PreguntasEvento Test Case
 *
 */
class PreguntasEventoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.preguntas_evento',
		'app.pregunta',
		'app.respuesta',
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
		'app.categoria',
		'app.discount',
		'app.gift',
		'app.validation',
		'app.entrada',
		'app.entradas_input',
		'app.categorias_entrada',
		'app.input_state',
		'app.events_registration_type',
		'app.registration_type',
		'app.shelf',
		'app.location',
		'app.paper',
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
		'app.events_categoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PreguntasEvento = ClassRegistry::init('PreguntasEvento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PreguntasEvento);

		parent::tearDown();
	}

}
