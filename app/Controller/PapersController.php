<?php
App::uses('AppController', 'Controller');
/**
 * Papers Controller
 *
 * @property Paper $Paper
 * @property PaginatorComponent $Paginator
 */
class PapersController extends AppController {

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
		$this->Paper->recursive = 0;
		$this->set('papers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Paper->exists($id)) {
			throw new NotFoundException(__('Invalid paper'));
		}
		$options = array('conditions' => array('Paper.' . $this->Paper->primaryKey => $id));
		$this->set('paper', $this->Paper->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Paper->create();
			if ($this->Paper->save($this->request->data)) {
				$this->Session->setFlash(__('The paper has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paper could not be saved. Please, try again.'));
			}
		}
		$events = $this->Paper->Event->find('list');
		$shelves = $this->Paper->Shelf->find('list');
		$this->set(compact('events', 'shelves'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Paper->exists($id)) {
			throw new NotFoundException(__('Invalid paper'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Paper->save($this->request->data)) {
				$this->Session->setFlash(__('The paper has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paper could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Paper.' . $this->Paper->primaryKey => $id));
			$this->request->data = $this->Paper->find('first', $options);
		}
		$events = $this->Paper->Event->find('list');
		$shelves = $this->Paper->Shelf->find('list');
		$this->set(compact('events', 'shelves'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Paper->id = $id;
		if (!$this->Paper->exists()) {
			throw new NotFoundException(__('Invalid paper'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Paper->delete()) {
			$this->Session->setFlash(__('The paper has been deleted.'));
		} else {
			$this->Session->setFlash(__('The paper could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
