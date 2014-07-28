<?php
App::uses('AppController', 'Controller');
/**
 * EntradasTorniquetes Controller
 *
 * @property EntradasTorniquete $EntradasTorniquete
 * @property PaginatorComponent $Paginator
 */
class EntradasTorniquetesController extends AppController {

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
		$this->EntradasTorniquete->recursive = 0;
		$this->set('entradasTorniquetes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntradasTorniquete->exists($id)) {
			throw new NotFoundException(__('Invalid entradas torniquete'));
		}
		$options = array('conditions' => array('EntradasTorniquete.' . $this->EntradasTorniquete->primaryKey => $id));
		$this->set('entradasTorniquete', $this->EntradasTorniquete->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntradasTorniquete->create();
			if ($this->EntradasTorniquete->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas torniquete has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas torniquete could not be saved. Please, try again.'));
			}
		}
		$entradas = $this->EntradasTorniquete->Entrada->find('list');
		$torniquetes = $this->EntradasTorniquete->Torniquete->find('list');
		$this->set(compact('entradas', 'torniquetes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EntradasTorniquete->exists($id)) {
			throw new NotFoundException(__('Invalid entradas torniquete'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntradasTorniquete->save($this->request->data)) {
				$this->Session->setFlash(__('The entradas torniquete has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entradas torniquete could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntradasTorniquete.' . $this->EntradasTorniquete->primaryKey => $id));
			$this->request->data = $this->EntradasTorniquete->find('first', $options);
		}
		$entradas = $this->EntradasTorniquete->Entrada->find('list');
		$torniquetes = $this->EntradasTorniquete->Torniquete->find('list');
		$this->set(compact('entradas', 'torniquetes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EntradasTorniquete->id = $id;
		if (!$this->EntradasTorniquete->exists()) {
			throw new NotFoundException(__('Invalid entradas torniquete'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntradasTorniquete->delete()) {
			$this->Session->setFlash(__('The entradas torniquete has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entradas torniquete could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
