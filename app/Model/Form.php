<?php
App::uses('AppModel', 'Model');
/**
 * Form Model
 *
 * @property Event $Event
 * @property PersonalDatum $PersonalDatum
 */
class Form extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'PersonalDatum' => array(
			'className' => 'PersonalDatum',
			'joinTable' => 'forms_personal_data',
			'foreignKey' => 'form_id',
			'associationForeignKey' => 'personal_datum_id',
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
