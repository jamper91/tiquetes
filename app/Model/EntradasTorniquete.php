<?php
App::uses('AppModel', 'Model');
/**
 * EntradasTorniquete Model
 *
 * @property Entrada $Entrada
 * @property Torniquete $Torniquete
 */
class EntradasTorniquete extends AppModel {


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
		'Torniquete' => array(
			'className' => 'Torniquete',
			'foreignKey' => 'torniquete_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
