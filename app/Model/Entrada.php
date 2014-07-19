<?php
App::uses('AppModel', 'Model');
/**
 * Entrada Model
 *
 * @property Paper $Paper
 * @property Category $Category
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
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
