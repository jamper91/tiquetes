<?php
App::uses('AppModel', 'Model');
/**
 * AuthorizationsUser Model
 *
 * @property User $User
 * @property Authorization $Authorization
 */
class AuthorizationsUser extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Authorization' => array(
			'className' => 'Authorization',
			'foreignKey' => 'authorization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
