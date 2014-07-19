<?php
App::uses('AppModel', 'Model');
/**
 * Sale Model
 *
 * @property Input $Input
 */
class Sale extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'sale_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tipo_de_pago' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Input' => array(
			'className' => 'Input',
			'joinTable' => 'inputs_sales',
			'foreignKey' => 'sale_id',
			'associationForeignKey' => 'input_id',
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
