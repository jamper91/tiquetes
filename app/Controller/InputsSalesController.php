<?php
App::uses('AppController', 'Controller');
/**
 * InputsSales Controller
 *
 * @property InputsSale $InputsSale
 * @property PaginatorComponent $Paginator
 */
class InputsSalesController extends AppController {

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
		$this->InputsSale->recursive = 0;
		$this->set('inputsSales', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InputsSale->exists($id)) {
			throw new NotFoundException(__('Invalid inputs sale'));
		}
		$options = array('conditions' => array('InputsSale.' . $this->InputsSale->primaryKey => $id));
		$this->set('inputsSale', $this->InputsSale->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InputsSale->create();
			if ($this->InputsSale->save($this->request->data)) {
				$this->Session->setFlash(__('The inputs sale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inputs sale could not be saved. Please, try again.'));
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
		if (!$this->InputsSale->exists($id)) {
			throw new NotFoundException(__('Invalid inputs sale'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InputsSale->save($this->request->data)) {
				$this->Session->setFlash(__('The inputs sale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inputs sale could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InputsSale.' . $this->InputsSale->primaryKey => $id));
			$this->request->data = $this->InputsSale->find('first', $options);
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
		$this->InputsSale->id = $id;
		if (!$this->InputsSale->exists()) {
			throw new NotFoundException(__('Invalid inputs sale'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->InputsSale->delete()) {
			$this->Session->setFlash(__('The inputs sale has been deleted.'));
		} else {
			$this->Session->setFlash(__('The inputs sale could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
