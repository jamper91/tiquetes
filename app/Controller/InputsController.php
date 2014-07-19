<?php
App::uses('AppController', 'Controller');
/**
 * Inputs Controller
 *
 * @property Input $Input
 * @property PaginatorComponent $Paginator
 */
class InputsController extends AppController {

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
		$this->Input->recursive = 0;
		$this->set('inputs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Input->exists($id)) {
			throw new NotFoundException(__('Invalid input'));
		}
		$options = array('conditions' => array('Input.' . $this->Input->primaryKey => $id));
		$this->set('input', $this->Input->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Input->create();
			if ($this->Input->save($this->request->data)) {
				$this->Session->setFlash(__('The input has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The input could not be saved. Please, try again.'));
			}
		}
		$inputStates = $this->Input->InputState->find('list');
		$people = $this->Input->Person->find('list');
		$eventsRegistrationTypes = $this->Input->EventsRegistrationType->find('list');
		$categories = $this->Input->Category->find('list');
		$deliveryMethods = $this->Input->DeliveryMethod->find('list');
		$sales = $this->Input->Sale->find('list');
		$this->set(compact('inputStates', 'people', 'eventsRegistrationTypes', 'categories', 'deliveryMethods', 'sales'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Input->exists($id)) {
			throw new NotFoundException(__('Invalid input'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Input->save($this->request->data)) {
				$this->Session->setFlash(__('The input has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The input could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Input.' . $this->Input->primaryKey => $id));
			$this->request->data = $this->Input->find('first', $options);
		}
		$inputStates = $this->Input->InputState->find('list');
		$people = $this->Input->Person->find('list');
		$eventsRegistrationTypes = $this->Input->EventsRegistrationType->find('list');
		$categories = $this->Input->Category->find('list');
		$deliveryMethods = $this->Input->DeliveryMethod->find('list');
		$sales = $this->Input->Sale->find('list');
		$this->set(compact('inputStates', 'people', 'eventsRegistrationTypes', 'categories', 'deliveryMethods', 'sales'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Input->id = $id;
		if (!$this->Input->exists()) {
			throw new NotFoundException(__('Invalid input'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Input->delete()) {
			$this->Session->setFlash(__('The input has been deleted.'));
		} else {
			$this->Session->setFlash(__('The input could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
