<?php
App::uses('AppController', 'Controller');
/**
 * LocationsShelves Controller
 *
 * @property LocationsShelf $LocationsShelf
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LocationsShelvesController extends AppController {

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
		$this->LocationsShelf->recursive = 0;
		$this->set('locationsShelves', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LocationsShelf->exists($id)) {
			throw new NotFoundException(__('Invalid locations shelf'));
		}
		$options = array('conditions' => array('LocationsShelf.' . $this->LocationsShelf->primaryKey => $id));
		$this->set('locationsShelf', $this->LocationsShelf->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LocationsShelf->create();
			if ($this->LocationsShelf->save($this->request->data)) {
				$this->Session->setFlash(__('The locations shelf has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The locations shelf could not be saved. Please, try again.'));
			}
		}
		$locations = $this->LocationsShelf->Location->find('list');
		$shelves = $this->LocationsShelf->Shelf->find('list');
		$this->set(compact('locations', 'shelves'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LocationsShelf->exists($id)) {
			throw new NotFoundException(__('Invalid locations shelf'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LocationsShelf->save($this->request->data)) {
				$this->Session->setFlash(__('The locations shelf has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The locations shelf could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LocationsShelf.' . $this->LocationsShelf->primaryKey => $id));
			$this->request->data = $this->LocationsShelf->find('first', $options);
		}
		$locations = $this->LocationsShelf->Location->find('list');
		$shelves = $this->LocationsShelf->Shelf->find('list');
		$this->set(compact('locations', 'shelves'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LocationsShelf->id = $id;
		if (!$this->LocationsShelf->exists()) {
			throw new NotFoundException(__('Invalid locations shelf'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LocationsShelf->delete()) {
			$this->Session->setFlash(__('The locations shelf has been deleted.'));
		} else {
			$this->Session->setFlash(__('The locations shelf could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
