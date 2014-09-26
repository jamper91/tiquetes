<?php

App::uses('AppController', 'Controller');

/**
 * PersonalData Controller
 *
 * @property PersonalDatum $PersonalDatum
 * @property PaginatorComponent $Paginator
 */
class PersonalDataController extends AppController {

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
        $this->PersonalDatum->recursive = 0;
        $this->set('personalData', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->PersonalDatum->exists($id)) {
            throw new NotFoundException(__('Invalid personal datum'));
        }
        $options = array('conditions' => array('PersonalDatum.' . $this->PersonalDatum->primaryKey => $id));
        $this->set('personalDatum', $this->PersonalDatum->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->PersonalDatum->create();
            if ($this->PersonalDatum->save($this->request->data)) {
                $this->Session->setFlash(__('The personal datum has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('The personal datum could not be saved. Please, try again.'));
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
        if (!$this->PersonalDatum->exists($id)) {
            throw new NotFoundException(__('Invalid personal datum'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->PersonalDatum->save($this->request->data)) {
                $this->Session->setFlash(__('The personal datum has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The personal datum could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('PersonalDatum.' . $this->PersonalDatum->primaryKey => $id));
            $this->request->data = $this->PersonalDatum->find('first', $options);
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
        $this->PersonalDatum->id = $id;
        if (!$this->PersonalDatum->exists()) {
            throw new NotFoundException(__('Invalid personal datum'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->PersonalDatum->delete()) {
            $this->Session->setFlash(__('The personal datum has been deleted.'));
        } else {
            $this->Session->setFlash(__('The personal datum could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    

}
