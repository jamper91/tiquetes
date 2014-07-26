<?php

App::uses('AppController', 'Controller');

/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 */
class EventsController extends AppController {

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
        $this->Event->recursive = 0;
        $this->set('events', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
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

        $this->set(compact('stages'));
//        $stages = $this->Event->Stage->find('list');

        $eventTypesName = $this->Event->EventType->find('list', array(
            "fields" => array(
                "EventType.nombre"
            ),
            "recursive" => -2
        ));


        $committees = $this->Event->Committee->find('list', array(
            "fields" => array(
                "Committee.id",
                "Committee.nombre"
            )
        ));
        
        $companies = $this->Event->Company->find('list', array(
            "fields" => array(
                "Company.id",
                "Company.empr_nombre"
            )
        ));
        
        $hotels = $this->Event->Hotel->find('list', array(
            "fields" => array(
                "Hotel.id",
                "Hotel.hote_nombre"
            )
        ));
        $paymentsName = $this->Event->Payment->find('list', array(
            "fields" => array(
                "Payment.id",
                "Payment.mepa_descripcion"
            )
        ));

        $registrationTypes = $this->Event->RegistrationType->find('list');
        $this->set(compact('stages', 'eventTypes', 'committees', 'companies', 'hotels', 'paymentsName', 'registrationTypes'));

        $this->set("eventTypesName", $eventTypesName);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }
        $stages = $this->Event->Stage->find('list');
//        $eventTypes = $this->Event->EventType->find('list');
        $committees = $this->Event->Committee->find('list');
        $companies = $this->Event->Company->find('list');
        $hotels = $this->Event->Hotel->find('list');
        $payments = $this->Event->Payment->find('list');
        $registrationTypes = $this->Event->RegistrationType->find('list');
        $this->set(compact('stages', 'eventTypes', 'committees', 'companies', 'hotels', 'payments', 'registrationTypes'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('The event has been deleted.'));
        } else {
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getEventsByStage() {
        $this->layout = "webservices";
        $stage_id = $this->request->data["stage_id"]; //State
        //debug($state_id);
        $options = array(
            "conditions" => array(
                "Event.stage_id" => $stage_id
            ),
            "fields" => array(
                "Event.id",
                "Event.even_nombre as name"
            ),
            "recursive" => 0
        );
        $eventos = $this->Event->find("all", $options);
        $log = $this->Event->getDataSource()->getLog(false, false);
        //debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $eventos,
                    "_serialize" => array("datos")
                )
        );
    }

}
