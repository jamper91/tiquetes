<?php
App::uses('AppModel', 'Model');
/**
 * GiftsEvent Model
 *
 * @property Gift $Gift
 * @property Event $Event
 * @property Categoria $Categoria
 * @property People $People
 */
class GiftsEvent extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Gift' => array(
			'className' => 'Gift',
			'foreignKey' => 'gift_id',
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
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'People' => array(
			'className' => 'People',
			'foreignKey' => 'people_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
