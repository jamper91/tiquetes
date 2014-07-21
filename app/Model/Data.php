<?php
App::uses('AppModel', 'Model');
/**
 * Data Model
 *
 * @property Person $Person
 * @property FormsPersonalData $FormsPersonalData
 */
class Data extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'descripcion';


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
		'FormsPersonalData' => array(
			'className' => 'FormsPersonalData',
			'foreignKey' => 'forms_personal_data_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
