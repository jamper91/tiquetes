<?php

App::uses('AppController', 'Controller');

/**
 * Locations Controller
 *
 * @property Location $Location
 * @property PaginatorComponent $Paginator
 */
class LocationsController extends AppController {

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
        $this->Location->recursive = 0;
        $this->set('locations', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Location->exists($id)) {
            throw new NotFoundException(__('Invalid location'));
        }
        $options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
        $this->set('location', $this->Location->find('first', $options));
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
        $this->loadModel('Stages');
        $this->loadModel('Event');
        if ($this->request->is('post')) {
            $event_id = $this->data['Location']['event_id'];
            debug($event_id);
            $stage_id = $this->Event->find('list', array(
                "fields" => array(
                    "Event.stage_id"
                ),
                "conditions" => array(
                    "Event.id = '$event_id'"
                )
            ));
            debug($stage_id[$event_id]);
            die;

            $newLocation = $this->Location->create();
            $newLocation = array(
                'Event' => array(
                    'stage_id' => $stage_id[$event_id],
                    'loca_nombre' => strtoupper($this->data['Location']['loca_nombre']),
                    'loca_fila' => $this->data['Location']['loca_fila'],
                    'loca_colomnna' => $this->data['Location']['loca_colomnna'],
                )
            );
            if ($this->Location->save($this->request->data)) {
                $this->Session->setFlash(__('The location has been saved.'));
                return $this->redirect(array('controller' => 'Events', 'action' => 'mapea', 1, 0));
            } else {
                $this->Session->setFlash(__('The location could not be saved. Please, try again.'));
            }
        }
        $date = date('Y-m-d');
//                    debug($date);
        //van los eventos disponibles 

        $events = $this->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "conditions" => array(
                "Event.even_fechFinal >= '$date'"
            )
        ));

        $stages = $this->Location->Stage->find('list');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            )
        ));
        $parentLocations = $this->Location->ParentLocation->find('list');
        $this->set(compact('stages', 'parentLocations', 'countriesName', 'events'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Location->exists($id)) {
            throw new NotFoundException(__('Invalid location'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Location->save($this->request->data)) {
                $this->Session->setFlash(__('The location has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The location could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
            $this->request->data = $this->Location->find('first', $options);
        }
        $stages = $this->Location->Stage->find('list', array(
            "fields" => array(
                "Stage.esce_nombre"
            ),
            "recursive" => -2
        ));
        $parentLocations = $this->Location->ParentLocation->find('list');
        $this->set(compact('stages', 'parentLocations'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Location->id = $id;
        if (!$this->Location->exists()) {
            throw new NotFoundException(__('Invalid location'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Location->delete()) {
            $this->Session->setFlash(__('The location has been deleted.'));
        } else {
            $this->Session->setFlash(__('The location could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getLocationByStage() {
        $this->layout = "webservices";
        $stage_id = $this->request->data["stage_id"]; //Stage      
        $options = array(
            "conditions" => array(
                "Location.stage_id" => $stage_id
            ),
            "fields" => array(
                "Location.id",
                "Location.loca_nombre"
            ),
            "recursive" => 0
        );
        $loca = $this->Location->find("all", $options);
        $log = $this->Location->getDataSource()->getLog(false, false);
//        debug($log);
        //$stages=array("datos"=>$locations);
        $this->set(
                array(
                    "datos" => $loca,
                    "_serialize" => array("datos")
                )
        );
    }

}
