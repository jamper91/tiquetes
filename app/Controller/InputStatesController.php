<?php
App::uses('AppController', 'Controller');
/**
 * InputStates Controller
 *
 * @property InputState $InputState
 * @property PaginatorComponent $Paginator
 */
class InputStatesController extends AppController {

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
		$this->InputState->recursive = 0;
		$this->set('inputStates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InputState->exists($id)) {
			throw new NotFoundException(__('Invalid input state'));
		}
		$options = array('conditions' => array('InputState.' . $this->InputState->primaryKey => $id));
		$this->set('inputState', $this->InputState->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InputState->create();
			if ($this->InputState->save($this->request->data)) {
				$this->Session->setFlash(__('The input state has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The input state could not be saved. Please, try again.'));
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
		if (!$this->InputState->exists($id)) {
			throw new NotFoundException(__('Invalid input state'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InputState->save($this->request->data)) {
				$this->Session->setFlash(__('The input state has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The input state could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InputState.' . $this->InputState->primaryKey => $id));
			$this->request->data = $this->InputState->find('first', $options);
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
		$this->InputState->id = $id;
		if (!$this->InputState->exists()) {
			throw new NotFoundException(__('Invalid input state'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->InputState->delete()) {
			$this->Session->setFlash(__('The input state has been deleted.'));
		} else {
			$this->Session->setFlash(__('The input state could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
