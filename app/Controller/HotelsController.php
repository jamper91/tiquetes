<?php

App::uses('AppController', 'Controller');

/**
 * Hotels Controller
 *
 * @property Hotel $Hotel
 * @property PaginatorComponent $Paginator
 */
class HotelsController extends AppController {

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
        $this->Hotel->recursive = 0;
        $this->set('hotels', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Hotel->exists($id)) {
            throw new NotFoundException(__('Invalid hotel'));
        }
        $options = array('conditions' => array('Hotel.' . $this->Hotel->primaryKey => $id));
        $this->set('hotel', $this->Hotel->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
//            $data = $this->data;
//            $this->loadModel('People');
            $this->Hotel->create();
            
            if ($this->Hotel->save($this->request->data)) {
                $this->Session->setFlash(__('The hotel has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The hotel could not be saved. Please, try again.'));
            }
        }
//        $events = $this->Hotel->Event->find('list');
        $this->loadModel('Country');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            ),
            "recursive" => -2
        ));
        
        $this->set(compact('countriesName'));

        $this->set(compact('state'));

        //$cities = $this->Stage->City->find('list');
        $this->set(compact('cities'));
        
        $this->set(compact('hotels'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Hotel->exists($id)) {
            throw new NotFoundException(__('Invalid hotel'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Hotel->save($this->request->data)) {
                $this->Session->setFlash(__('The hotel has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The hotel could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Hotel.' . $this->Hotel->primaryKey => $id));
            $this->request->data = $this->Hotel->find('first', $options);
        }
        $events = $this->Hotel->Event->find('list');
        $this->set(compact('events'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Hotel->id = $id;
        if (!$this->Hotel->exists()) {
            throw new NotFoundException(__('Invalid hotel'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Hotel->delete()) {
            $this->Session->setFlash(__('The hotel has been deleted.'));
        } else {
            $this->Session->setFlash(__('The hotel could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getHotelsByCity() {
        $this->layout = "webservices";
        $city_id = $this->request->data["city_id"]; //State
        //debug($state_id);
        $options = array(
            "conditions" => array(
                "Hotel.city_id" => $city_id
            ),
            "fields" => array(
                "Hotel.id",
                "Hotel.hote_nombre"
            ),
            "recursive" => 0
        );

        $hotels = $this->Hotel->find("all", $options);
        $log = $this->Hotel->getDataSource()->getLog(false, false);
        //debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $hotels,
                    "_serialize" => array("datos")
                )
        );
    }

}
