<?php
App::uses('AppController', 'Controller');
/**
 * DeliveryMethods Controller
 *
 * @property DeliveryMethod $DeliveryMethod
 * @property PaginatorComponent $Paginator
 */
class DeliveryMethodsController extends AppController {

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
		$this->DeliveryMethod->recursive = 0;
		$this->set('deliveryMethods', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DeliveryMethod->exists($id)) {
			throw new NotFoundException(__('Invalid delivery method'));
		}
		$options = array('conditions' => array('DeliveryMethod.' . $this->DeliveryMethod->primaryKey => $id));
		$this->set('deliveryMethod', $this->DeliveryMethod->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DeliveryMethod->create();
			if ($this->DeliveryMethod->save($this->request->data)) {
				$this->Session->setFlash(__('The delivery method has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery method could not be saved. Please, try again.'));
			}
		}
		$inputs = $this->DeliveryMethod->Input->find('list');
		$this->set(compact('inputs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DeliveryMethod->exists($id)) {
			throw new NotFoundException(__('Invalid delivery method'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DeliveryMethod->save($this->request->data)) {
				$this->Session->setFlash(__('The delivery method has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery method could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DeliveryMethod.' . $this->DeliveryMethod->primaryKey => $id));
			$this->request->data = $this->DeliveryMethod->find('first', $options);
		}
		$inputs = $this->DeliveryMethod->Input->find('list');
		$this->set(compact('inputs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DeliveryMethod->id = $id;
		if (!$this->DeliveryMethod->exists()) {
			throw new NotFoundException(__('Invalid delivery method'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DeliveryMethod->delete()) {
			$this->Session->setFlash(__('The delivery method has been deleted.'));
		} else {
			$this->Session->setFlash(__('The delivery method could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
