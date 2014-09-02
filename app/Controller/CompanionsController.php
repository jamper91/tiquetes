<?php
App::uses('AppController', 'Controller');
/**
 * Companions Controller
 *
 * @property Companion $Companion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CompanionsController extends AppController {

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
		$this->Companion->recursive = 0;
		$this->set('companions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Companion->exists($id)) {
			throw new NotFoundException(__('Invalid companion'));
		}
		$options = array('conditions' => array('Companion.' . $this->Companion->primaryKey => $id));
		$this->set('companion', $this->Companion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Companion->create();
			if ($this->Companion->save($this->request->data)) {
				$this->Session->setFlash(__('The companion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companion could not be saved. Please, try again.'));
			}
		}
		$people = $this->Companion->Person->find('list');
		$events = $this->Companion->Event->find('list');
		$this->set(compact('people', 'events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Companion->exists($id)) {
			throw new NotFoundException(__('Invalid companion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Companion->save($this->request->data)) {
				$this->Session->setFlash(__('The companion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Companion.' . $this->Companion->primaryKey => $id));
			$this->request->data = $this->Companion->find('first', $options);
		}
		$people = $this->Companion->Person->find('list');
		$events = $this->Companion->Event->find('list');
		$this->set(compact('people', 'events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Companion->id = $id;
		if (!$this->Companion->exists()) {
			throw new NotFoundException(__('Invalid companion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Companion->delete()) {
			$this->Session->setFlash(__('The companion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The companion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
