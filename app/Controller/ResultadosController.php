<?php
App::uses('AppController', 'Controller');
/**
 * Resultados Controller
 *
 * @property Resultado $Resultado
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ResultadosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Resultado->recursive = 0;
		$this->set('resultados', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Resultado->exists($id)) {
			throw new NotFoundException(__('Invalid resultado'));
		}
		$options = array('conditions' => array('Resultado.' . $this->Resultado->primaryKey => $id));
		$this->set('resultado', $this->Resultado->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Resultado->create();
			if ($this->Resultado->save($this->request->data)) {
				$this->Session->setFlash(__('The resultado has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resultado could not be saved. Please, try again.'));
			}
		}
		$preguntasEventos = $this->Resultado->PreguntasEvento->find('list');
		$people = $this->Resultado->Person->find('list');
		$this->set(compact('preguntasEventos', 'people'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Resultado->exists($id)) {
			throw new NotFoundException(__('Invalid resultado'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Resultado->save($this->request->data)) {
				$this->Session->setFlash(__('The resultado has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resultado could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Resultado.' . $this->Resultado->primaryKey => $id));
			$this->request->data = $this->Resultado->find('first', $options);
		}
		$preguntasEventos = $this->Resultado->PreguntasEvento->find('list');
		$people = $this->Resultado->Person->find('list');
		$this->set(compact('preguntasEventos', 'people'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Resultado->id = $id;
		if (!$this->Resultado->exists()) {
			throw new NotFoundException(__('Invalid resultado'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Resultado->delete()) {
			$this->Session->setFlash(__('The resultado has been deleted.'));
		} else {
			$this->Session->setFlash(__('The resultado could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
