<?php
App::uses('AppModel', 'Model');
/**
 * LocationsShelf Model
 *
 * @property Location $Location
 * @property Shelf $Shelf
 */
class LocationsShelf extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Shelf' => array(
			'className' => 'Shelf',
			'foreignKey' => 'shelf_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
