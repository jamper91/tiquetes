<?php
App::uses('AppModel', 'Model');
/**
 * Hotel Model
 *
 * @property Event $Event
 */
class Hotel extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'hote_nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Event' => array(
			'className' => 'Event',
			'joinTable' => 'events_hotels',
			'foreignKey' => 'hotel_id',
			'associationForeignKey' => 'event_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
