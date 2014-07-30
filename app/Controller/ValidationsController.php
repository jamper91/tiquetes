<?php
App::uses('AppController', 'Controller');
/**
 * Validations Controller
 *
 * @property Validation $Validation
 * @property PaginatorComponent $Paginator
 */
class ValidationsController extends AppController {

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
		$this->Validation->recursive = 0;
		$this->set('validations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Validation->exists($id)) {
			throw new NotFoundException(__('Invalid validation'));
		}
		$options = array('conditions' => array('Validation.' . $this->Validation->primaryKey => $id));
		$this->set('validation', $this->Validation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
		if ($this->request->is('post')) {
                    $this->request->data["Validation"]["categoria_id"]=2;
			$this->Validation->create();
			if ($this->Validation->save($this->request->data)) {
				$this->Session->setFlash(__('The validation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The validation could not be saved. Please, try again.'));
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
		if (!$this->Validation->exists($id)) {
			throw new NotFoundException(__('Invalid validation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Validation->save($this->request->data)) {
				$this->Session->setFlash(__('The validation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The validation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Validation.' . $this->Validation->primaryKey => $id));
			$this->request->data = $this->Validation->find('first', $options);
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
		$this->Validation->id = $id;
		if (!$this->Validation->exists()) {
			throw new NotFoundException(__('Invalid validation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Validation->delete()) {
			$this->Session->setFlash(__('The validation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The validation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
