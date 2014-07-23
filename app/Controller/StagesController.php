<?php

App::uses('AppController', 'Controller');

/**
 * Stages Controller
 *
 * @property Stage $Stage
 * @property PaginatorComponent $Paginator
 */
class StagesController extends AppController {

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
        $this->Stage->recursive = 0;
        $this->set('stages', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException(__('Invalid stage'));
        }
        $options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
        $this->set('stage', $this->Stage->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Stage->create();
            if ($this->Stage->save($this->request->data)) {
                $this->Session->setFlash(__('The stage has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The stage could not be saved. Please, try again.'));
            }
        }

//        $validaFoto1 = $this->Subirfoto->validar($this->data['Stage']['foto1']['tmp_name'], $this->data['Stage']['foto1']['size'], $this->data['Stage']['foto1']['nombre']);
//        $validaFoto2 = $this->Subirfoto->validar($this->data['Stage']['foto2']['tmp_name'], $this->data['Stage']['foto2']['size'], $this->data['Stage']['foto2']['nombre']);

        /* Comprobamos si las fotografías del $data de paso5 son correctas */
        
        
//pais
//               
        $this->loadModel('Country');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            ),
            "recursive" => -2
        ));
        
        $this->set(compact('state'));
        
        $cities = $this->Stage->City->find('list');
        $this->set(compact('cities'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException(__('Invalid stage'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Stage->save($this->request->data)) {
                $this->Session->setFlash(__('The stage has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The stage could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
            $this->request->data = $this->Stage->find('first', $options);
        }
        $cities = $this->Stage->City->find('list');
        $this->set(compact('cities'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Stage->id = $id;
        if (!$this->Stage->exists()) {
            throw new NotFoundException(__('Invalid stage'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Stage->delete()) {
            $this->Session->setFlash(__('The stage has been deleted.'));
        } else {
            $this->Session->setFlash(__('The stage could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
