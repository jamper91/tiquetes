<?php
App::uses('AppModel', 'Model');
/**
 * CommitteesEventsPerson Model
 *
 * @property Person $Person
 * @property CommitteesEvent $CommitteesEvent
 */
class CommitteesEventsPerson extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Person' => array(
			'className' => 'Person',
			'foreignKey' => 'person_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CommitteesEvent' => array(
			'className' => 'CommitteesEvent',
			'foreignKey' => 'committees_event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
