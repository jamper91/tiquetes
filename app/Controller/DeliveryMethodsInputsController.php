<?php
App::uses('AppController', 'Controller');
/**
 * DeliveryMethodsInputs Controller
 *
 * @property DeliveryMethodsInput $DeliveryMethodsInput
 * @property PaginatorComponent $Paginator
 */
class DeliveryMethodsInputsController extends AppController {

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
		$this->DeliveryMethodsInput->recursive = 0;
		$this->set('deliveryMethodsInputs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DeliveryMethodsInput->exists($id)) {
			throw new NotFoundException(__('Invalid delivery methods input'));
		}
		$options = array('conditions' => array('DeliveryMethodsInput.' . $this->DeliveryMethodsInput->primaryKey => $id));
		$this->set('deliveryMethodsInput', $this->DeliveryMethodsInput->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DeliveryMethodsInput->create();
			if ($this->DeliveryMethodsInput->save($this->request->data)) {
				$this->Session->setFlash(__('The delivery methods input has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery methods input could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DeliveryMethodsInput->exists($id)) {
			throw new NotFoundException(__('Invalid delivery methods input'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DeliveryMethodsInput->save($this->request->data)) {
				$this->Session->setFlash(__('The delivery methods input has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery methods input could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DeliveryMethodsInput.' . $this->DeliveryMethodsInput->primaryKey => $id));
			$this->request->data = $this->DeliveryMethodsInput->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DeliveryMethodsInput->id = $id;
		if (!$this->DeliveryMethodsInput->exists()) {
			throw new NotFoundException(__('Invalid delivery methods input'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DeliveryMethodsInput->delete()) {
			$this->Session->setFlash(__('The delivery methods input has been deleted.'));
		} else {
			$this->Session->setFlash(__('The delivery methods input could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
