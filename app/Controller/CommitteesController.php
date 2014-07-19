<?php
App::uses('AppController', 'Controller');
/**
 * Committees Controller
 *
 * @property Committee $Committee
 * @property PaginatorComponent $Paginator
 */
class CommitteesController extends AppController {

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
		$this->Committee->recursive = 0;
		$this->set('committees', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Committee->exists($id)) {
			throw new NotFoundException(__('Invalid committee'));
		}
		$options = array('conditions' => array('Committee.' . $this->Committee->primaryKey => $id));
		$this->set('committee', $this->Committee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Committee->create();
			if ($this->Committee->save($this->request->data)) {
				$this->Session->setFlash(__('The committee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The committee could not be saved. Please, try again.'));
			}
		}
		$events = $this->Committee->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Committee->exists($id)) {
			throw new NotFoundException(__('Invalid committee'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Committee->save($this->request->data)) {
				$this->Session->setFlash(__('The committee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The committee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Committee.' . $this->Committee->primaryKey => $id));
			$this->request->data = $this->Committee->find('first', $options);
		}
		$events = $this->Committee->Event->find('list');
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
		$this->Committee->id = $id;
		if (!$this->Committee->exists()) {
			throw new NotFoundException(__('Invalid committee'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Committee->delete()) {
			$this->Session->setFlash(__('The committee has been deleted.'));
		} else {
			$this->Session->setFlash(__('The committee could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
