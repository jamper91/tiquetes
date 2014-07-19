<?php
App::uses('AppController', 'Controller');
/**
 * TypeUsers Controller
 *
 * @property TypeUser $TypeUser
 * @property PaginatorComponent $Paginator
 */
class TypeUsersController extends AppController {

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
		$this->TypeUser->recursive = 0;
		$this->set('typeUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TypeUser->exists($id)) {
			throw new NotFoundException(__('Invalid type user'));
		}
		$options = array('conditions' => array('TypeUser.' . $this->TypeUser->primaryKey => $id));
		$this->set('typeUser', $this->TypeUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TypeUser->create();
			if ($this->TypeUser->save($this->request->data)) {
				$this->Session->setFlash(__('The type user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The type user could not be saved. Please, try again.'));
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
		if (!$this->TypeUser->exists($id)) {
			throw new NotFoundException(__('Invalid type user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TypeUser->save($this->request->data)) {
				$this->Session->setFlash(__('The type user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The type user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TypeUser.' . $this->TypeUser->primaryKey => $id));
			$this->request->data = $this->TypeUser->find('first', $options);
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
		$this->TypeUser->id = $id;
		if (!$this->TypeUser->exists()) {
			throw new NotFoundException(__('Invalid type user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TypeUser->delete()) {
			$this->Session->setFlash(__('The type user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The type user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
