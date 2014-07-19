<?php
App::uses('AppModel', 'Model');
/**
 * EventType Model
 *
 * @property Event $Event
 */
class EventType extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_type_id',
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
