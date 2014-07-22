<?php
App::uses('AppModel', 'Model');
/**
 * EventsRegistrationType Model
 *
 * @property RegistrationType $RegistrationType
 * @property Event $Event
 * @property Input $Input
 */
class EventsRegistrationType extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'registration_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'RegistrationType' => array(
			'className' => 'RegistrationType',
			'foreignKey' => 'registration_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Input' => array(
			'className' => 'Input',
			'foreignKey' => 'events_registration_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
