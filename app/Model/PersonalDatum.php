<?php
App::uses('AppModel', 'Model');
/**
 * PersonalDatum Model
 *
 * @property Form $Form
 */
class PersonalDatum extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Form' => array(
			'className' => 'Form',
			'joinTable' => 'forms_personal_data',
			'foreignKey' => 'personal_datum_id',
			'associationForeignKey' => 'form_id',
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
