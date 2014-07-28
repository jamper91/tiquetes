<?php
App::uses('AppController', 'Controller');
/**
 * FormsPersonalData Controller
 *
 * @property FormsPersonalDatum $FormsPersonalDatum
 * @property PaginatorComponent $Paginator
 */
class FormsPersonalDataController extends AppController {

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
		$this->FormsPersonalDatum->recursive = 0;
		$this->set('formsPersonalData', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FormsPersonalDatum->exists($id)) {
			throw new NotFoundException(__('Invalid forms personal datum'));
		}
		$options = array('conditions' => array('FormsPersonalDatum.' . $this->FormsPersonalDatum->primaryKey => $id));
		$this->set('formsPersonalDatum', $this->FormsPersonalDatum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FormsPersonalDatum->create();
			if ($this->FormsPersonalDatum->save($this->request->data)) {
				$this->Session->setFlash(__('The forms personal datum has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The forms personal datum could not be saved. Please, try again.'));
			}
		}
		$personalData = $this->FormsPersonalDatum->PersonalDatum->find('list');
		$forms = $this->FormsPersonalDatum->Form->find('list');
		$this->set(compact('personalData', 'forms'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FormsPersonalDatum->exists($id)) {
			throw new NotFoundException(__('Invalid forms personal datum'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FormsPersonalDatum->save($this->request->data)) {
				$this->Session->setFlash(__('The forms personal datum has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The forms personal datum could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FormsPersonalDatum.' . $this->FormsPersonalDatum->primaryKey => $id));
			$this->request->data = $this->FormsPersonalDatum->find('first', $options);
		}
		$personalData = $this->FormsPersonalDatum->PersonalDatum->find('list');
		$forms = $this->FormsPersonalDatum->Form->find('list');
		$this->set(compact('personalData', 'forms'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FormsPersonalDatum->id = $id;
		if (!$this->FormsPersonalDatum->exists()) {
			throw new NotFoundException(__('Invalid forms personal datum'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FormsPersonalDatum->delete()) {
			$this->Session->setFlash(__('The forms personal datum has been deleted.'));
		} else {
			$this->Session->setFlash(__('The forms personal datum could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
