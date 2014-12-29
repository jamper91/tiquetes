<?php
App::uses('AppModel', 'Model');
/**
 * Resultado Model
 *
 * @property PreguntasEventos $PreguntasEventos
 * @property Person $Person
 */
class Resultado extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PreguntasEventos' => array(
			'className' => 'PreguntasEventos',
			'foreignKey' => 'preguntas_eventos_id',
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
