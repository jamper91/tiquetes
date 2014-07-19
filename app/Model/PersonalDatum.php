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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Form' => array(
			'className' => 'Form',
			'foreignKey' => 'personal_datum_id',
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
