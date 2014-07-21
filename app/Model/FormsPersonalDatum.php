<?php
App::uses('AppModel', 'Model');
/**
 * FormsPersonalDatum Model
 *
 * @property PersonalDatum $PersonalDatum
 * @property Form $Form
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
}
