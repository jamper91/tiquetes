<?php

App::uses('AppController', 'Controller');

/**
 * Countries Controller
 *
 * @property Country $Country
 * @property PaginatorComponent $Paginator
 */
class CountriesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Country->recursive = 0;
        $this->set('countries', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Country->exists($id)) {
            throw new NotFoundException(__('Invalid country'));
        }
        $options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
        $this->set('country', $this->Country->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Country->create();
            try {
                if ($this->Country->save($this->request->data)) {
                    $this->Session->setFlash('País creado con exito', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Error al registrar el país', 'error');
                }
            } catch (Exception $exc) {
                $error2 = $ex->getCode();
                if ($error2 == '23000') {
                    $this->Session->setFlash('Error ya hay un país con el mismo nombre en la base de datos', 'error');
                }
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
        if (!$this->Country->exists($id)) {
            throw new NotFoundException(__('Invalid country'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Country->save($this->request->data)) {
                $this->Session->setFlash(__('The country has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The country could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
            $this->request->data = $this->Country->find('first', $options);
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
        $this->Country->id = $id;
        if (!$this->Country->exists()) {
            throw new NotFoundException(__('Invalid country'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Country->delete()) {
            $this->Session->setFlash(__('The country has been deleted.'));
        } else {
            $this->Session->setFlash(__('The country could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
