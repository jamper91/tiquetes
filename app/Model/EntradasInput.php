<?php
App::uses('AppModel', 'Model');
/**
 * EntradasInput Model
 *
 * @property Entrada $Entrada
 * @property Input $Input
 */
class EntradasInput extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fecha' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ingresos' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Entrada' => array(
			'className' => 'Entrada',
			'foreignKey' => 'entrada_id',
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
