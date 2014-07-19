<?php
App::uses('AppModel', 'Model');
/**
 * Form Model
 *
 * @property PersonalDatum $PersonalDatum
 * @property Event $Event
 * @property Data $Data
 */
class Form extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'event_id' => array(
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
		'PersonalDatum' => array(
			'className' => 'PersonalDatum',
			'foreignKey' => 'personal_datum_id',
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
		'Data' => array(
			'className' => 'Data',
			'foreignKey' => 'form_id',
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
