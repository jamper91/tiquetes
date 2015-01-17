<?php
App::uses('AppModel', 'Model');
/**
 * Opcione Model
 *
 * @property PersonalDatum $PersonalDatum
 */
class Opcione extends AppModel {


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
		)
	);
}
