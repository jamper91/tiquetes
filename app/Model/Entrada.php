<?php
App::uses('AppModel', 'Model');
/**
 * Entrada Model
 *
 * @property Paper $Paper
 * @property Input $Input
 */
class Entrada extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Paper' => array(
			'className' => 'Paper',
			'foreignKey' => 'paper_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Input' => array(
			'className' => 'Input',
			'joinTable' => 'entradas_inputs',
			'foreignKey' => 'entrada_id',
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
