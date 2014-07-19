<?php
App::uses('AppController', 'Controller');
/**
 * Discounts Controller
 *
 * @property Discount $Discount
 * @property PaginatorComponent $Paginator
 */
class DiscountsController extends AppController {

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
		$this->Discount->recursive = 0;
		$this->set('discounts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Discount->exists($id)) {
			throw new NotFoundException(__('Invalid discount'));
		}
		$options = array('conditions' => array('Discount.' . $this->Discount->primaryKey => $id));
		$this->set('discount', $this->Discount->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Discount->create();
			if ($this->Discount->save($this->request->data)) {
				$this->Session->setFlash(__('The discount has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The discount could not be saved. Please, try again.'));
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
		if (!$this->Discount->exists($id)) {
			throw new NotFoundException(__('Invalid discount'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Discount->save($this->request->data)) {
				$this->Session->setFlash(__('The discount has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The discount could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Discount.' . $this->Discount->primaryKey => $id));
			$this->request->data = $this->Discount->find('first', $options);
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
		$this->Discount->id = $id;
		if (!$this->Discount->exists()) {
			throw new NotFoundException(__('Invalid discount'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Discount->delete()) {
			$this->Session->setFlash(__('The discount has been deleted.'));
		} else {
			$this->Session->setFlash(__('The discount could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
