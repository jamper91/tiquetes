<?php
App::uses('AppModel', 'Model');
/**
 * Torniquete Model
 *
 * @property Entrada $Entrada
 */
class Torniquete extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Entrada' => array(
			'className' => 'Entrada',
			'joinTable' => 'entradas_torniquetes',
			'foreignKey' => 'torniquete_id',
			'associationForeignKey' => 'entrada_id',
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
