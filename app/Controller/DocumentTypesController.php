<?php
App::uses('AppController', 'Controller');
/**
 * DocumentTypes Controller
 *
 * @property DocumentType $DocumentType
 * @property PaginatorComponent $Paginator
 */
class DocumentTypesController extends AppController {

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
		$this->DocumentType->recursive = 0;
		$this->set('documentTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DocumentType->exists($id)) {
			throw new NotFoundException(__('Invalid document type'));
		}
		$options = array('conditions' => array('DocumentType.' . $this->DocumentType->primaryKey => $id));
		$this->set('documentType', $this->DocumentType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DocumentType->create();
			if ($this->DocumentType->save($this->request->data)) {
				$this->Session->setFlash(__('The document type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The document type could not be saved. Please, try again.'));
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
		if (!$this->DocumentType->exists($id)) {
			throw new NotFoundException(__('Invalid document type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DocumentType->save($this->request->data)) {
				$this->Session->setFlash(__('The document type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The document type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DocumentType.' . $this->DocumentType->primaryKey => $id));
			$this->request->data = $this->DocumentType->find('first', $options);
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
		$this->DocumentType->id = $id;
		if (!$this->DocumentType->exists()) {
			throw new NotFoundException(__('Invalid document type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DocumentType->delete()) {
			$this->Session->setFlash(__('The document type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The document type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
