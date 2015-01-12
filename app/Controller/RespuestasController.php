<?php
App::uses('AppController', 'Controller');
/**
 * Respuestas Controller
 *
 * @property Respuesta $Respuesta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Respuesta->recursive = 0;
		$this->set('respuestas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Respuesta->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta'));
		}
		$options = array('conditions' => array('Respuesta.' . $this->Respuesta->primaryKey => $id));
		$this->set('respuesta', $this->Respuesta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Respuesta->create();
			if ($this->Respuesta->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta could not be saved. Please, try again.'));
			}
		}
		$preguntas = $this->Respuesta->Preguntum->find('list');
		$this->set(compact('preguntas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Respuesta->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Respuesta->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Respuesta.' . $this->Respuesta->primaryKey => $id));
			$this->request->data = $this->Respuesta->find('first', $options);
		}
		$preguntas = $this->Respuesta->Preguntum->find('list');
		$this->set(compact('preguntas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Respuesta->id = $id;
		if (!$this->Respuesta->exists()) {
			throw new NotFoundException(__('Invalid respuesta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Respuesta->delete()) {
			$this->Session->setFlash(__('The respuesta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
