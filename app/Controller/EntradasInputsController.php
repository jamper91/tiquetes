<?php
App::uses('AppController', 'Controller');
/**
 * EntradasInputs Controller
 *
 * @property EntradasInput $EntradasInput
 * @property PaginatorComponent $Paginator
 */
class EntradasInputsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EntradasInput->recursive = 0;
		$this->set('entradasInputs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasInput->exists($id)) {
			throw new NotFoundException(__('Invalid entradas input'));
		}
		$options = array('conditions' => array('EntradasInput.' . $this->EntradasInput->primaryKey => $id));
		$this->set('entradasInput', $this->EntradasInput->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasInput->create();
			if ($this->EntradasInput->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas input has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas input could not be saved. Please, try again.'));
			}
		}
		$entradas = $this->EntradasInput->Entrada->find('list');
		$inputs = $this->EntradasInput->Input->find('list');
		$this->set(compact('entradas', 'inputs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EntradasInput->exists($id)) {
			throw new NotFoundException(__('Invalid entradas input'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasInput->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas input has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas input could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasInput.' . $this->EntradasInput->primaryKey => $id));
			$this->request->data = $this->EntradasInput->find('first', $options);
		}
		$entradas = $this->EntradasInput->Entrada->find('list');
		$inputs = $this->EntradasInput->Input->find('list');
		$this->set(compact('entradas', 'inputs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EntradasInput->id = $id;
		if (!$this->EntradasInput->exists()) {
			throw new NotFoundException(__('Invalid entradas input'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasInput->delete()) {
			$this->Session->setFlash(__('The entradas input has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas input could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
