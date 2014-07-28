<?php
App::uses('AppModel', 'Model');
/**
 * CategoriasEntrada Model
 *
 * @property Categoria $Categoria
 * @property Entrada $Entrada
 */
class CategoriasEntrada extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Entrada' => array(
			'className' => 'Entrada',
			'foreignKey' => 'entrada_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
