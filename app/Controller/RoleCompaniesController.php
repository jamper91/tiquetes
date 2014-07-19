<?php
App::uses('AppController', 'Controller');
/**
 * RoleCompanies Controller
 *
 * @property RoleCompany $RoleCompany
 * @property PaginatorComponent $Paginator
 */
class RoleCompaniesController extends AppController {

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
		$this->RoleCompany->recursive = 0;
		$this->set('roleCompanies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RoleCompany->exists($id)) {
			throw new NotFoundException(__('Invalid role company'));
		}
		$options = array('conditions' => array('RoleCompany.' . $this->RoleCompany->primaryKey => $id));
		$this->set('roleCompany', $this->RoleCompany->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RoleCompany->create();
			if ($this->RoleCompany->save($this->request->data)) {
				$this->Session->setFlash(__('The role company has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role company could not be saved. Please, try again.'));
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
		if (!$this->RoleCompany->exists($id)) {
			throw new NotFoundException(__('Invalid role company'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RoleCompany->save($this->request->data)) {
				$this->Session->setFlash(__('The role company has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role company could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RoleCompany.' . $this->RoleCompany->primaryKey => $id));
			$this->request->data = $this->RoleCompany->find('first', $options);
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
		$this->RoleCompany->id = $id;
		if (!$this->RoleCompany->exists()) {
			throw new NotFoundException(__('Invalid role company'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RoleCompany->delete()) {
			$this->Session->setFlash(__('The role company has been deleted.'));
		} else {
			$this->Session->setFlash(__('The role company could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
