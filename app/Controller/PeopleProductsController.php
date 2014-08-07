<?php
App::uses('AppController', 'Controller');
/**
 * PeopleProducts Controller
 *
 * @property PeopleProduct $PeopleProduct
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PeopleProductsController extends AppController {

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
		$this->PeopleProduct->recursive = 0;
		$this->set('peopleProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PeopleProduct->exists($id)) {
			throw new NotFoundException(__('Invalid people product'));
		}
		$options = array('conditions' => array('PeopleProduct.' . $this->PeopleProduct->primaryKey => $id));
		$this->set('peopleProduct', $this->PeopleProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PeopleProduct->create();
			if ($this->PeopleProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The people product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The people product could not be saved. Please, try again.'));
			}
		}
		$personProducts = $this->PeopleProduct->PersonProduct->find('list');
		$products = $this->PeopleProduct->Product->find('list');
		$people = $this->PeopleProduct->Person->find('list');
		$this->set(compact('personProducts', 'products', 'people'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PeopleProduct->exists($id)) {
			throw new NotFoundException(__('Invalid people product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PeopleProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The people product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The people product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PeopleProduct.' . $this->PeopleProduct->primaryKey => $id));
			$this->request->data = $this->PeopleProduct->find('first', $options);
		}
		$personProducts = $this->PeopleProduct->PersonProduct->find('list');
		$products = $this->PeopleProduct->Product->find('list');
		$people = $this->PeopleProduct->Person->find('list');
		$this->set(compact('personProducts', 'products', 'people'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PeopleProduct->id = $id;
		if (!$this->PeopleProduct->exists()) {
			throw new NotFoundException(__('Invalid people product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PeopleProduct->delete()) {
			$this->Session->setFlash(__('The people product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The people product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
