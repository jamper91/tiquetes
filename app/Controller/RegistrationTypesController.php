<?php
App::uses('AppController', 'Controller');
/**
 * RegistrationTypes Controller
 *
 * @property RegistrationType $RegistrationType
 * @property PaginatorComponent $Paginator
 */
class RegistrationTypesController extends AppController {

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
		$this->RegistrationType->recursive = 0;
		$this->set('registrationTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RegistrationType->exists($id)) {
			throw new NotFoundException(__('Invalid registration type'));
		}
		$options = array('conditions' => array('RegistrationType.' . $this->RegistrationType->primaryKey => $id));
		$this->set('registrationType', $this->RegistrationType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RegistrationType->create();
			if ($this->RegistrationType->save($this->request->data)) {
				$this->Session->setFlash(__('The registration type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The registration type could not be saved. Please, try again.'));
			}
		}
		$events = $this->RegistrationType->Event->find('list');
		$categorys = $this->RegistrationType->Category->find('list');
		$this->set(compact('events',$categorys));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RegistrationType->exists($id)) {
			throw new NotFoundException(__('Invalid registration type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RegistrationType->save($this->request->data)) {
				$this->Session->setFlash(__('The registration type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The registration type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RegistrationType.' . $this->RegistrationType->primaryKey => $id));
			$this->request->data = $this->RegistrationType->find('first', $options);
		}
		$events = $this->RegistrationType->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RegistrationType->id = $id;
		if (!$this->RegistrationType->exists()) {
			throw new NotFoundException(__('Invalid registration type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RegistrationType->delete()) {
			$this->Session->setFlash(__('The registration type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The registration type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
