<?php
App::uses('AppModel', 'Model');
/**
 * FormsPersonalDatum Model
 *
 * @property PersonalDatum $PersonalDatum
 * @property Form $Form
 * @property Data $Data
 */
class FormsPersonalDatum extends AppModel {


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
		'Form' => array(
			'className' => 'Form',
			'foreignKey' => 'form_id',
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
			'foreignKey' => 'forms_personal_datum_id',
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
