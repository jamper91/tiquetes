<?php
App::uses('AppModel', 'Model');
/**
 * CompaniesEvent Model
 *
 * @property Company $Company
 * @property Event $Event
 * @property RoleCompany $RoleCompany
 */
class CompaniesEvent extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RoleCompany' => array(
			'className' => 'RoleCompany',
			'foreignKey' => 'role_company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
