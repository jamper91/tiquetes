<?php
App::uses('AppController', 'Controller');
/**
 * PaperInputs Controller
 *
 * @property PaperInput $PaperInput
 * @property PaginatorComponent $Paginator
 */
class PaperInputsController extends AppController {

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
		$this->PaperInput->recursive = 0;
		$this->set('paperInputs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PaperInput->exists($id)) {
			throw new NotFoundException(__('Invalid paper input'));
		}
		$options = array('conditions' => array('PaperInput.' . $this->PaperInput->primaryKey => $id));
		$this->set('paperInput', $this->PaperInput->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PaperInput->create();
			if ($this->PaperInput->save($this->request->data)) {
				$this->Session->setFlash(__('The paper input has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paper input could not be saved. Please, try again.'));
			}
		}
		$papers = $this->PaperInput->Paper->find('list');
		$inputs = $this->PaperInput->Input->find('list');
		$this->set(compact('papers', 'inputs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PaperInput->exists($id)) {
			throw new NotFoundException(__('Invalid paper input'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PaperInput->save($this->request->data)) {
				$this->Session->setFlash(__('The paper input has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paper input could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PaperInput.' . $this->PaperInput->primaryKey => $id));
			$this->request->data = $this->PaperInput->find('first', $options);
		}
		$papers = $this->PaperInput->Paper->find('list');
		$inputs = $this->PaperInput->Input->find('list');
		$this->set(compact('papers', 'inputs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PaperInput->id = $id;
		if (!$this->PaperInput->exists()) {
			throw new NotFoundException(__('Invalid paper input'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PaperInput->delete()) {
			$this->Session->setFlash(__('The paper input has been deleted.'));
		} else {
			$this->Session->setFlash(__('The paper input could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
