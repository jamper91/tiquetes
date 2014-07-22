<?php
App::uses('AppModel', 'Model');
/**
 * DeliveryMethodsInput Model
 *
 * @property DeliveryMethod $DeliveryMethod
 * @property Input $Input
 */
class DeliveryMethodsInput extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DeliveryMethod' => array(
			'className' => 'DeliveryMethod',
			'foreignKey' => 'delivery_method_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Input' => array(
			'className' => 'Input',
			'foreignKey' => 'input_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
