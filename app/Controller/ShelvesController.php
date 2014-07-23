<?php

App::uses('AppController', 'Controller');

/**
 * Shelves Controller
 *
 * @property Shelf $Shelf
 * @property PaginatorComponent $Paginator
 */
class ShelvesController extends AppController {

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
        $this->Shelf->recursive = 0;
        $this->set('shelves', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Shelf->exists($id)) {
            throw new NotFoundException(__('Invalid shelf'));
        }
        $options = array('conditions' => array('Shelf.' . $this->Shelf->primaryKey => $id));
        $this->set('shelf', $this->Shelf->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('Country');
        $this->loadModel('State');
        $this->loadModel('City');
        if ($this->request->is('post')) {
            $this->Shelf->create();
            if ($this->Shelf->save($this->request->data)) {
                $this->Session->setFlash(__('The shelf has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
            }
        }
        $locations = $this->Shelf->Location->find('list', array(
            "fields" => array(
                "Location.loca_nombre"
            )
        ));
        $this->set(compact('locations'));
        
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            )
        ));       

        
        $this->set("locations", $locations);        
        $this->set("countriesName", $countriesName);
        $states = $this->City->State->find('list');
        $this->set(compact('states'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Shelf->exists($id)) {
            throw new NotFoundException(__('Invalid shelf'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Shelf->save($this->request->data)) {
                $this->Session->setFlash(__('The shelf has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Shelf.' . $this->Shelf->primaryKey => $id));
            $this->request->data = $this->Shelf->find('first', $options);
        }
        $locations = $this->Shelf->Location->find('list');
        $this->set(compact('locations'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Shelf->id = $id;
        if (!$this->Shelf->exists()) {
            throw new NotFoundException(__('Invalid shelf'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Shelf->delete()) {
            $this->Session->setFlash(__('The shelf has been deleted.'));
        } else {
            $this->Session->setFlash(__('The shelf could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    

}
