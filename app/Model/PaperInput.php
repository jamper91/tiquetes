<?php
App::uses('AppModel', 'Model');
/**
 * PaperInput Model
 *
 * @property Paper $Paper
 * @property Input $Input
 */
class PaperInput extends AppModel {


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
		'Input' => array(
			'className' => 'Input',
			'foreignKey' => 'input_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
