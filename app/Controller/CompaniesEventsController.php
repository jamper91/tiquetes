<?php
App::uses('AppController', 'Controller');
/**
 * CompaniesEvents Controller
 *
 * @property CompaniesEvent $CompaniesEvent
 * @property PaginatorComponent $Paginator
 */
class CompaniesEventsController extends AppController {

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
		$this->CompaniesEvent->recursive = 0;
		$this->set('companiesEvents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CompaniesEvent->exists($id)) {
			throw new NotFoundException(__('Invalid companies event'));
		}
		$options = array('conditions' => array('CompaniesEvent.' . $this->CompaniesEvent->primaryKey => $id));
		$this->set('companiesEvent', $this->CompaniesEvent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CompaniesEvent->create();
			if ($this->CompaniesEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The companies event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companies event could not be saved. Please, try again.'));
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
		if (!$this->CompaniesEvent->exists($id)) {
			throw new NotFoundException(__('Invalid companies event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CompaniesEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The companies event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companies event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CompaniesEvent.' . $this->CompaniesEvent->primaryKey => $id));
			$this->request->data = $this->CompaniesEvent->find('first', $options);
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
		$this->CompaniesEvent->id = $id;
		if (!$this->CompaniesEvent->exists()) {
			throw new NotFoundException(__('Invalid companies event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CompaniesEvent->delete()) {
			$this->Session->setFlash(__('The companies event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The companies event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
