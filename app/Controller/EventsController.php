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
    public $components = array('Paginator', 'Auth', 'Session', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Event->recursive = 0;
        $this->set('events', $this->Paginator->paginate());
    }

    public function mapea($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid stage'));
        }
        $this->loadModel('Location');
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
        $this->set('locations', $this->Location->find("all", array("conditions" => array('Location.event_id' => $id))));
    }

    public function guardacoords() {


        var_dump($_POST);
        $this->loadModel('Location');
        $this->Location->updateAll(
                array('Location.coord' => 'CONCAT(Location.coord, "' . $_POST["coord"] . '")'), array('Location.id' => $_POST["location"])
        );
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

            if (isset($this->request->data["even_imagen1"]) && (isset($this->request->data["even_imagen2"]))) {
                $file1 = $this->request->data["even_imagen1"];
                $file2 = $this->request->data["even_imagen2"];
                $nombre = $file1["name"];
                if ($nombre != "") {
                    $tipo = $file1["type"];
                    $ruta_provicional = $file1["tmp_name"];
                    $size = $file1["size"];
                    $dimensiones = getimagesize($ruta_provicional);
                    $width = $dimensiones[0];
                    $height = $dimensiones[1];
                    $carpeta = WWW_ROOT . "/img/events1/";
                    $src = $carpeta . $nombre;
                    if ($tipo != 'image/jpeg') {
                        $this->Session->setFlash(__('El archivo Imagen 1, no es compatible solo recibe imagenes jpg o jepg.', 'error'));
                    } elseif ($width != 500 && $height != 500) {
                        $this->Session->setFlash(__('Las dimenciones de la Imagen 1, no son correctas deben ser 500px X 500px.', 'error'));
                    } else {
                        $name2 = $file2["name"];
                        $type2 = $file2["type"];
                        $ruta_tmp2 = $file2["tmp_name"];
                        $size2 = $file2["size"];
                        $dimensiones2 = getimagesize($ruta_tmp2);
                        $ancho = $dimensiones2[0];
                        $alto = $dimensiones2[1];
                        $carpeta2 = WWW_ROOT . "/img/events2/";
                        $src2 = $carpeta2 . $name2;

                        if ($name2 != "") {
                            if ($type2 != 'image/jpeg') {
                                $this->Session->setFlash(__('El archivo Imagen 2, no es compatible solo recibe imagenes jpg o jepg.', 'error'));
                            } elseif ($ancho != 500 && $alto != 500) {
                                $this->Session->setFlash(__('Las dimenciones de la Imagen 2, no son correctas deben ser 500px X 500px.', 'error'));
                            } else {
                                move_uploaded_file($ruta_tmp2, $src2);
                                move_uploaded_file($ruta_provicional, $src);
                                $newEvent = $this->Event->create();
                                $newEvent = array(
                                    'Event' => array(
                                        'city_id' => $data['city_id'],
                                        'stage_id' => $data['stage_id'],
                                        'event_type_id' => $data['event_type_id'],
                                        'even_nombre' => strtoupper($data['even_nombre']), // strtoupper($src2)
                                        'even_numeResolucion' => strtoupper($data['even_numeResolucion']),
                                        'even_palaClave' => strtoupper($data['even_palaClave']),
                                        'even_observaciones' => strtoupper($data['even_observaciones']),
//                        'even_estado' => $data['even_estado'],
                                        'even_imagen1' => $nombre,
                                        'even_imagen2' => $name2,
                                        'even_fechInicio' => $data['even_fechInicio'],
                                        'even_fechFinal' => $data['even_fechFinal'],
                                        'even_publicar' => $data['even_publicar'],
                                        'even_codigo' => strtoupper($data['even_codigo']),
                                        'fechainiciopublicacion' => $data['fechainiciopublicacion'],
                                        'fechafinpublicacion' => $data['fechafinpublicacion'],
                                    )
                                );
                                try {
                                    $this->Event->save($newEvent);
                                    $newEventId = $this->Event->getLastInsertId();

                                    foreach ($data['Committee'] as $Committee_id) {
                                        $newCommittesEvent = $this->Event->CommitteesEvent->create();
                                        $newCommittesEvent = array(
                                            'CommittesEvent' => array(
                                                'committee_id' => $Committee_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        debug($newCommittesEvent);
                                        $this->Event->CommitteesEvent->save($newCommittesEvent);
                                    }


                                    foreach ($data['Company'] as $Company_id) {
                                        $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                        $newCompaniesEvent = array(
                                            'CompaniesEvent' => array(
                                                'committee_id' => $Company_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        debug($newCompaniesEvent);
                                        $this->Event->CompaniesEvent->save($newCompaniesEvent);
                                    }
                                    die();

                                    foreach ($data['Hotel'] as $Hotel_id) {
                                        $newEventsHotel = $this->Event->EventsHotel->create();
                                        $newEventsHotel = array(
                                            'EventsHotel' => array(
                                                'hotel_id' => $Hotel_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->EventsHotel->save($newEventsHotel);
                                    }


                                    foreach ($data['Payment'] as $Payment_id) {
                                        $newEventsPayment = $this->Event->EventsPayment->create();
                                        $newEventsPayment = array(
                                            'EventsPayment' => array(
                                                'payment_id' => $Payment_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->EventsPayment->save($newEventsPayment);
                                    }

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
                        } else {

                            move_uploaded_file($ruta_provicional, $src);
                            $newEvent = $this->Event->create();
                            $newEvent = array(
                                'Event' => array(
                                    'city_id' => $data['city_id'],
                                    'stage_id' => $data['stage_id'],
                                    'event_type_id' => $data['event_type_id'],
                                    'even_nombre' => strtoupper($data['even_nombre']), // strtoupper($src2)
                                    'even_numeResolucion' => strtoupper($data['even_numeResolucion']),
                                    'even_palaClave' => strtoupper($data['even_palaClave']),
                                    'even_observaciones' => strtoupper($data['even_observaciones']),
//                        'even_estado' => $data['even_estado'],
                                    'even_imagen1' => $nombre,
                                    'even_imagen2' => $name2,
                                    'even_fechInicio' => $data['even_fechInicio'],
                                    'even_fechFinal' => $data['even_fechFinal'],
                                    'even_publicar' => $data['even_publicar'],
                                    'even_codigo' => strtoupper($data['even_codigo']),
                                    'fechainiciopublicacion' => $data['fechainiciopublicacion'],
                                    'fechafinpublicacion' => $data['fechafinpublicacion'],
                                )
                            );
                            try {
                                $this->Event->save($newEvent);
                                $newEventId = $this->Event->getLastInsertId();

                                foreach ($data['Committee'] as $Committee_id) {
                                    $newCommittesEvent = $this->Event->CommitteesEvent->create();
                                    $newCommittesEvent = array(
                                        'CommittesEvent' => array(
                                            'committee_id' => $Committee_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    debug($newCommittesEvent);
                                    $this->Event->CommitteesEvent->save($newCommittesEvent);
                                }


                                foreach ($data['Company'] as $Company_id) {
                                    $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                    $newCompaniesEvent = array(
                                        'CompaniesEvent' => array(
                                            'committee_id' => $Company_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    debug($newCompaniesEvent);
                                    $this->Event->CompaniesEvent->save($newCompaniesEvent);
                                }
                                die();

                                foreach ($data['Hotel'] as $Hotel_id) {
                                    $newEventsHotel = $this->Event->EventsHotel->create();
                                    $newEventsHotel = array(
                                        'EventsHotel' => array(
                                            'hotel_id' => $Hotel_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->EventsHotel->save($newEventsHotel);
                                }


                                foreach ($data['Payment'] as $Payment_id) {
                                    $newEventsPayment = $this->Event->EventsPayment->create();
                                    $newEventsPayment = array(
                                        'EventsPayment' => array(
                                            'payment_id' => $Payment_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->EventsPayment->save($newEventsPayment);
                                }

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

        $cities = $this->Event->Stage->City->find('list');
        $this->set(compact('cities'));

        $stages = $this->Event->Stage->find('list', array(
            "fields" => array(
                "Stage.esce_nombre"
            ),
            "recursive" => -2
        ));
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
        $this->loadModel('Country');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            ),
            "recursive" => -2
        ));
        $this->set(compact('countriesName'));

        $this->set(compact('state'));

        $cities = $this->Event->Stage->City->find('list');
        $this->set(compact('cities'));

        $stages = $this->Event->Stage->find('list', array(
            "fields" => array(
                "Stage.id",
                "Stage.esce_nombre"
            ),
            "recursive" => -2
        ));
        $this->set(compact('stages'));
//        $hotels = $this->Event->Stage->find('list');
//        $this->set(compact('hotels'));

        $eventTypesName = $this->Event->EventType->find('list', array(
            "fields" => array(
                "EventType.id",
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

        $payments = $this->Event->Payment->find('list', array(
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
        $this->set(compact('stages', 'eventTypes', 'committees', 'companies', 'hotels', 'payments', 'registrationTypes'));
        $this->set("eventTypesName", $eventTypesName);
//        $this->set("eventTypesName", $eventTypesName);
//        $stages = $this->Event->Stage->find('list');
//        $eventTypes = $this->Event->EventType->find('list');
//        $committees = $this->Event->Committee->find('list');
//        $companies = $this->Event->Company->find('list');
//        $hotels = $this->Event->Hotel->find('list');
//        $payments = $this->Event->Payment->find('list');
////        $registrationTypes = $this->Event->RegistrationType->find('list');
//        $this->set(compact('stages', 'eventTypes', 'committees', 'companies', 'hotels', 'payments', 'registrationTypes'));
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
