<?php
App::uses('AppController', 'Controller');
/**
 * Torniquetes Controller
 *
 * @property Torniquete $Torniquete
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TorniquetesController extends AppController {

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
		$this->Torniquete->recursive = 0;
		$this->set('torniquetes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Torniquete->exists($id)) {
			throw new NotFoundException(__('Invalid torniquete'));
		}
		$options = array('conditions' => array('Torniquete.' . $this->Torniquete->primaryKey => $id));
		$this->set('torniquete', $this->Torniquete->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Torniquete->create();
			if ($this->Torniquete->save($this->request->data)) {
				$this->Session->setFlash(__('The torniquete has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The torniquete could not be saved. Please, try again.'));
			}
		}
		$entradas = $this->Torniquete->Entrada->find('list');
		$this->set(compact('entradas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Torniquete->exists($id)) {
			throw new NotFoundException(__('Invalid torniquete'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Torniquete->save($this->request->data)) {
				$this->Session->setFlash(__('The torniquete has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The torniquete could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Torniquete.' . $this->Torniquete->primaryKey => $id));
			$this->request->data = $this->Torniquete->find('first', $options);
		}
		$entradas = $this->Torniquete->Entrada->find('list');
		$this->set(compact('entradas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Torniquete->id = $id;
		if (!$this->Torniquete->exists()) {
			throw new NotFoundException(__('Invalid torniquete'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Torniquete->delete()) {
			$this->Session->setFlash(__('The torniquete has been deleted.'));
		} else {
			$this->Session->setFlash(__('The torniquete could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
