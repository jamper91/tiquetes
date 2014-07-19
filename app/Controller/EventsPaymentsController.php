<?php
App::uses('AppController', 'Controller');
/**
 * EventsPayments Controller
 *
 * @property EventsPayment $EventsPayment
 * @property PaginatorComponent $Paginator
 */
class EventsPaymentsController extends AppController {

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
		$this->EventsPayment->recursive = 0;
		$this->set('eventsPayments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventsPayment->exists($id)) {
			throw new NotFoundException(__('Invalid events payment'));
		}
		$options = array('conditions' => array('EventsPayment.' . $this->EventsPayment->primaryKey => $id));
		$this->set('eventsPayment', $this->EventsPayment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventsPayment->create();
			if ($this->EventsPayment->save($this->request->data)) {
				$this->Session->setFlash(__('The events payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events payment could not be saved. Please, try again.'));
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
		if (!$this->EventsPayment->exists($id)) {
			throw new NotFoundException(__('Invalid events payment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EventsPayment->save($this->request->data)) {
				$this->Session->setFlash(__('The events payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events payment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventsPayment.' . $this->EventsPayment->primaryKey => $id));
			$this->request->data = $this->EventsPayment->find('first', $options);
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
		$this->EventsPayment->id = $id;
		if (!$this->EventsPayment->exists()) {
			throw new NotFoundException(__('Invalid events payment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventsPayment->delete()) {
			$this->Session->setFlash(__('The events payment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The events payment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
