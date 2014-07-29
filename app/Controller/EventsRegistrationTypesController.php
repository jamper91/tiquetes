<?php

App::uses('AppController', 'Controller');

/**
 * EventsRegistrationTypes Controller
 *
 * @property EventsRegistrationType $EventsRegistrationType
 * @property PaginatorComponent $Paginator
 */
class EventsRegistrationTypesController extends AppController {

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
        $this->EventsRegistrationType->recursive = 0;
        $this->set('eventsRegistrationTypes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->EventsRegistrationType->exists($id)) {
            throw new NotFoundException(__('Invalid events registration type'));
        }
        $options = array('conditions' => array('EventsRegistrationType.' . $this->EventsRegistrationType->primaryKey => $id));
        $this->set('eventsRegistrationType', $this->EventsRegistrationType->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->EventsRegistrationType->create();
            if ($this->EventsRegistrationType->save($this->request->data)) {
                $this->Session->setFlash(__('The events registration type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The events registration type could not be saved. Please, try again.'));
            }
        }
        $registrationTypes = $this->EventsRegistrationType->RegistrationType->find('list');
        $events = $this->EventsRegistrationType->Event->find('list');
        $this->set(compact('registrationTypes', 'events'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->EventsRegistrationType->exists($id)) {
            throw new NotFoundException(__('Invalid events registration type'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->EventsRegistrationType->save($this->request->data)) {
                $this->Session->setFlash(__('The events registration type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The events registration type could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('EventsRegistrationType.' . $this->EventsRegistrationType->primaryKey => $id));
            $this->request->data = $this->EventsRegistrationType->find('first', $options);
        }
        $registrationTypes = $this->EventsRegistrationType->RegistrationType->find('list');
        $events = $this->EventsRegistrationType->Event->find('list');
        $this->set(compact('registrationTypes', 'events'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->EventsRegistrationType->id = $id;
        if (!$this->EventsRegistrationType->exists()) {
            throw new NotFoundException(__('Invalid events registration type'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->EventsRegistrationType->delete()) {
            $this->Session->setFlash(__('The events registration type has been deleted.'));
        } else {
            $this->Session->setFlash(__('The events registration type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * url: events_registration_types/getRegistrationTypesByEvent.xml
     */
    function getRegistrationTypesByEvent() {
        $this->layout = "webservices";
        $eventId = $this->request->data("event_id");
        $options = array(
            "conditions" => array(
                "EventsRegistrationType.event_id" => $eventId
            ),
            "fields" => array(
                "EventsRegistrationType.id",
                "EventsRegistrationType.registration_type_id",
                "RegistrationType.nombre",
                "RegistrationType.categoria_id"
            )
        );
        $RegistrationType = $this->EventsRegistrationType->find("all", $options);
        $this->set(
                array(
                    "datos" => $RegistrationType,
                    "_serialize" => array("datos")
                )
        );
    }

}
