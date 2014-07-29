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
            $data = $this->data;
            $this->loadModel('Event');
// this is for the case you want to insert into 2 tables at a same time

            if (isset($this->request->data["even_imagen1"]) && (isset($this->request->data["even_imagen2"]))) {
                $file1 = $this->request->data["even_imagen1"];
                $file2 = $this->request->data["even_imagen2"];
                $nombre = $file1["name"];
                $tipo = $file1["type"];
                $ruta_provicional = $file1["tmp_name"];
                $size = $file2["size"];
              $nombre2 = $file2["name"];
                $tipo2 = $file2["type"];
                $ruta_provicional2 = $file2["tmp_name"];
                $size2 = $file2["size"];
//                  $dimensiones = getimagesize($ruta_provicional);
//                $width = $dimensiones[0];
//                $height = $dimensiones[1];
                $carpeta = WWW_ROOT . "/img/events/";
                $src = $carpeta . $nombre;
                $src2 = $carpeta . $nombre2;
                move_uploaded_file($ruta_provicional, $src);
                move_uploaded_file($ruta_provicional2, $src2);
                $newEvent = $this->Event->create();
                $newEvent = array(
                    'Event' => array(
                        'city_id' => $data['city_id'],
                        'stage_id' => $data['stage_id'],
                        'event_type_id' => $data['event_type_id'],
                        'even_nombre' => $data['even_nombre'],
                        'even_numeResolucion' => $data['even_numeResolucion'],
                        'even_palaClave' => $data['even_palaClave'],
                        'even_observaciones' => $data['even_observaciones'],
                        'even_estado' => $data['even_estado'],
                        'even_imagen1' => $src,
                        'even_imagen2' => $src2,
                        'even_fechInicio' => $data['even_fechInicio'],
                        'even_fechFinal' => $data['even_fechFinal'],
                        'even_publicar' => $data['even_publicar'],
                        'even_codigo' => $data['even_codigo']
                    )
                );
                try {
                    $this->Event->save($newPeole);
                    $newEventId = $this->Event->getLastInsertId();

//                    $newUser = $this->User->create();
//                    $newUser = array(
//                        'User' => array(
//                            'person_id' => $newPeopleId,
//                            'username' => $data['User']['username'],
//                            'password' => $data['User']['password'],
//                            'estado' => 1,
//                            'type_user_id' => $data['User']['type_user_id'],
//                            'department_id' => $data['User']['department_id'],
//                            'validodesde' => $data['User']['validodesde']['year'] . '-' . $data['User']['validodesde']['month'] . '-' . $data['User']['validodesde']['day'],
//                            'validohasta' => $data['User']['validohasta']['year'] . '-' . $data['User']['validohasta']['month'] . '-' . $data['User']['validohasta']['day'],
//                            'identificador' => $data['User']['Identificador']
//                        )
//                    );
//                    $this->User->save($newUser);
//                    $usuario = $this->User->getLastInsertId();
//                    $this->loadModel('Authorization');
//                    $newAutirizationsUser = $this->Authorization->create();
//                    $this->Authorization->save($this->request->data);
//                    debug($this->request->data("data[User][Autorization][]"));
//                    for ($i = 0; $i < sizeof($this->request->data("data[User][Autorization][]")); $i++)
//                        $newAutirizationsUser = array(
//                            'AutorizartionUser' => array(
//                                $this
//                            )
//                        );
                    return $this->redirect(array('action' => 'index'));
                } catch (Exception $ex) {
                    $error2 = $ex->getCode();
                    if ($error2 == '23000') {
                        $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
                    }
                }
//                $this->Event->create();
                if ($this->Event->save($this->request->data)) {
                    $this->Session->setFlash(__('The event has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
                }
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
//        $hotels = $this->Event->Stage->find('list');
//        $this->set(compact('hotels'));

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

        $registrationTypes = $this->Event->RegistrationType->find('list', array(
            "fields" => array(
                "RegistrationType.id",
                "RegistrationType.nombre"
            )
        ));

//        $registrationTypes = $this->Event->RegistrationType->find('list');
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
