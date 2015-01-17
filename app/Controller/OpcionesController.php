<?php
App::uses('AppController', 'Controller');
/**
 * Opciones Controller
 *
 * @property Opcione $Opcione
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OpcionesController extends AppController {

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
		$this->Opcione->recursive = 0;
		$this->set('opciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Opcione->exists($id)) {
			throw new NotFoundException(__('Invalid opcione'));
		}
		$options = array('conditions' => array('Opcione.' . $this->Opcione->primaryKey => $id));
		$this->set('opcione', $this->Opcione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Opcione->create();
			if ($this->Opcione->save($this->request->data)) {
				$this->Session->setFlash(__('The opcione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opcione could not be saved. Please, try again.'));
			}
		}
		$personalData = $this->Opcione->PersonalDatum->find('list');
		$this->set(compact('personalData'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Opcione->exists($id)) {
			throw new NotFoundException(__('Invalid opcione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Opcione->save($this->request->data)) {
				$this->Session->setFlash(__('The opcione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opcione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Opcione.' . $this->Opcione->primaryKey => $id));
			$this->request->data = $this->Opcione->find('first', $options);
		}
		$personalData = $this->Opcione->PersonalDatum->find('list');
		$this->set(compact('personalData'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Opcione->id = $id;
		if (!$this->Opcione->exists()) {
			throw new NotFoundException(__('Invalid opcione'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Opcione->delete()) {
			$this->Session->setFlash(__('The opcione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The opcione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
