<?php
App::uses('AppController', 'Controller');
/**
 * CommitteesEvents Controller
 *
 * @property CommitteesEvent $CommitteesEvent
 * @property PaginatorComponent $Paginator
 */
class CommitteesEventsController extends AppController {

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
		$this->CommitteesEvent->recursive = 0;
		$this->set('committeesEvents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CommitteesEvent->exists($id)) {
			throw new NotFoundException(__('Invalid committees event'));
		}
		$options = array('conditions' => array('CommitteesEvent.' . $this->CommitteesEvent->primaryKey => $id));
		$this->set('committeesEvent', $this->CommitteesEvent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CommitteesEvent->create();
			if ($this->CommitteesEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The committees event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The committees event could not be saved. Please, try again.'));
			}
		}
		$committees = $this->CommitteesEvent->Committee->find('list');
		$events = $this->CommitteesEvent->Event->find('list');
		$people = $this->CommitteesEvent->Person->find('list');
		$this->set(compact('committees', 'events', 'people'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CommitteesEvent->exists($id)) {
			throw new NotFoundException(__('Invalid committees event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CommitteesEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The committees event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The committees event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CommitteesEvent.' . $this->CommitteesEvent->primaryKey => $id));
			$this->request->data = $this->CommitteesEvent->find('first', $options);
		}
		$committees = $this->CommitteesEvent->Committee->find('list');
		$events = $this->CommitteesEvent->Event->find('list');
		$people = $this->CommitteesEvent->Person->find('list');
		$this->set(compact('committees', 'events', 'people'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CommitteesEvent->id = $id;
		if (!$this->CommitteesEvent->exists()) {
			throw new NotFoundException(__('Invalid committees event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CommitteesEvent->delete()) {
			$this->Session->setFlash(__('The committees event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The committees event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
