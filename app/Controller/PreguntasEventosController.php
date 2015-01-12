<?php
App::uses('AppController', 'Controller');
/**
 * PreguntasEventos Controller
 *
 * @property PreguntasEvento $PreguntasEvento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PreguntasEventosController extends AppController {

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
		$this->PreguntasEvento->recursive = 0;
		$this->set('preguntasEventos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PreguntasEvento->exists($id)) {
			throw new NotFoundException(__('Invalid preguntas evento'));
		}
		$options = array('conditions' => array('PreguntasEvento.' . $this->PreguntasEvento->primaryKey => $id));
		$this->set('preguntasEvento', $this->PreguntasEvento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PreguntasEvento->create();
			if ($this->PreguntasEvento->save($this->request->data)) {
				$this->Session->setFlash(__('The preguntas evento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The preguntas evento could not be saved. Please, try again.'));
			}
		}
		$preguntas = $this->PreguntasEvento->Preguntum->find('list');
		$events = $this->PreguntasEvento->Event->find('list');
		$this->set(compact('preguntas', 'events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PreguntasEvento->exists($id)) {
			throw new NotFoundException(__('Invalid preguntas evento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PreguntasEvento->save($this->request->data)) {
				$this->Session->setFlash(__('The preguntas evento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The preguntas evento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PreguntasEvento.' . $this->PreguntasEvento->primaryKey => $id));
			$this->request->data = $this->PreguntasEvento->find('first', $options);
		}
		$preguntas = $this->PreguntasEvento->Preguntum->find('list');
		$events = $this->PreguntasEvento->Event->find('list');
		$this->set(compact('preguntas', 'events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PreguntasEvento->id = $id;
		if (!$this->PreguntasEvento->exists()) {
			throw new NotFoundException(__('Invalid preguntas evento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PreguntasEvento->delete()) {
			$this->Session->setFlash(__('The preguntas evento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The preguntas evento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
