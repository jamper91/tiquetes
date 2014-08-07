<?php
App::uses('AppModel', 'Model');
/**
 * PeopleProduct Model
 *
 * @property PersonProduct $PersonProduct
 * @property Product $Product
 * @property Person $Person
 */
class PeopleProduct extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'y';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PersonProduct' => array(
			'className' => 'PersonProduct',
			'foreignKey' => 'person_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Person' => array(
			'className' => 'Person',
			'foreignKey' => 'person_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
