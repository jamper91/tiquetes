<?php
App::uses('AppModel', 'Model');
/**
 * Data Model
 *
 * @property Person $Person
 * @property FormsPersonalDatum $FormsPersonalDatum
 */
class Data extends AppModel {


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
		'FormsPersonalDatum' => array(
			'className' => 'FormsPersonalDatum',
			'foreignKey' => 'forms_personal_datum_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
