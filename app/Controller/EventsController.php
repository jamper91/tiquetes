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
//        $sql = "SELECT e.id, e.even_codigo, s.esce_nombre, et.nombre, e.even_nombre, e.even_numeResolucion, e.even_imagen1, e.even_imagen2, e.even_fechInicio, e.even_fechFinal, e.even_publicar FROM `events` e INNER JOIN `stages` s ON s.id = e.stage_id INNER JOIN `event_types` et ON et.id = e.event_type_id";
//        $eventos = $this->Event->query($sql);
//        $this->set(compact('eventos'));
        $this->set('events', $this->Paginator->paginate());
    }

    public function mapea($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid Event'));
        }
        $this->loadModel('Location');
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
        $this->set('locations', $this->Location->find("all", array("conditions" => array('Location.event_id' => $id))));
    }

    // $id es el id del evento al que pertenece la cuadricula
    public function grid($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid Event'));
        }

        $parametros = $this->request->params["pass"];
        $id_loc = $parametros[1];
        $this->loadModel('Location');
        $this->set('location', $this->Location->find("first", array("conditions" => array('Location.id' => $id_loc))));
        $grid = $this->Location->query('SELECT * FROM grid_location WHERE id_location=' . $parametros[1]); // Traemos datos 
        $this->set('grid', $grid);
    }

    public function guardagrid() {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $existe = $this->Event->query('SELECT * FROM grid_location WHERE id_location=' . $_POST["loca"] . ' AND fila=' . $_POST["fil"] . ' AND columna=' . $_POST["col"] . '  '); // Traemos datos 

        if ($existe != null) {
            echo "Existe";
            $this->Event->query('UPDATE  grid_location SET  val =  "' . $_POST["tipo"] . '"  WHERE id_location=' . $_POST["loca"] . ' AND fila=' . $_POST["fil"] . ' AND columna=' . $_POST["col"] . '  ');
        } else {
            echo "No Existe";
            $this->Event->query('INSERT INTO grid_location (`id`, `id_location`, `fila`, `columna`, `val`, `merge`) VALUES (NULL, "' . $_POST["loca"] . '", "' . $_POST["fil"] . '", "' . $_POST["col"] . '", "' . $_POST["tipo"] . '", NULL)');
        }
        var_dump($existe);

        return $this->redirect($this->referer());
    }

    public function borracoords($id = null) {
        $parametros = $this->request->params["pass"];
        $id = $parametros[1];

        $this->loadModel('Location');
        $this->Location->id = $id;
        if (!$this->Location->exists()) {
            throw new NotFoundException(__('Invalid Location'));
        }

        //$this->Location->coord=" ";
        $this->Location->saveField("coord", " ");
        ;


        /* $this->request->allowMethod('post', 'delete');
          if ($this->Location->delete()) {
          $this->Session->setFlash(__('The Location has been deleted.'));
          } else {
          $this->Session->setFlash(__('The Location could not be deleted. Please, try again.'));
          } */
        return $this->redirect(array('action' => 'mapea', $parametros[0], 0));
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
            $sql = "SELECT id FROM `events` WHERE even_numeResolucion ='" . strtoupper($this->request->data["even_numeResolucion"]) . "'"; //
            $id = $this->Event->query($sql);
            $x = "";
            $fechaactual = date('Y-m-d');
//            debug($id);
            if ($id == array()) {

//                $x = $id[0]['events']['id'];
//            if (isset($this->request->data["even_imagen1"]) && (isset($this->request->data["even_imagen2"]))) {
                $file1 = $this->request->data["even_imagen1"];
                $file2 = $this->request->data["even_imagen2"];
                $nombre = $file1["name"];
                $fechainicial = $data['even_fechInicio'];
                $fechafinal = $data['even_fechFinal'];
                $fechainiciopub = $data['fechainiciopublicacion'];
                $fechafinalpublicacion = $data['fechafinpublicacion'];
                if ($fechainicial > $fechaactual) {
                    $this->Session->setFlash('La fecha inicial no puede ser menor q la fecha actual', 'error'); //
                    //  debug($fechafinal);
                } elseif ($fechainicial > $fechafinal) {
                    $this->Session->setFlash('La fecha inicial no puede ser mayor a la fecha final', 'error'); //
                }
//                elseif($fechainiciopub > $fechaactual){
//                    $this->Session->setFlash('La fecha inicial de publicacion no puede ser menor a la fecha actual', 'error'); //
//                } elseif ($fechainiciopub < $fechafinalpublicacion){
//                    $this->Session->setFlash('La fecha inicial de publicacion no puede ser mayor a la fecha final de publicacion', 'error'); //
//                }
                elseif ($nombre != "") {
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

                        if ($name2 != "") {
                            $type2 = $file2["type"];
                            $ruta_tmp2 = $file2["tmp_name"];
                            $size2 = $file2["size"];
                            $dimensiones2 = getimagesize($ruta_tmp2);
                            $ancho = $dimensiones2[0];
                            $alto = $dimensiones2[1];
                            $carpeta2 = WWW_ROOT . "/img/events2/";
                            $src2 = $carpeta2 . $name2;
                            if ($type2 != 'image/jpeg') {
                                $this->Session->setFlash('El archivo Imagen 2, no es compatible solo recibe imagenes jpg o jepg.', 'error');
                            } elseif ($ancho != 500 && $alto != 500) {
                                $this->Session->setFlash('Las dimenciones de la Imagen 2, no son correctas deben ser 500px X 500px.', 'error');
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
                                        'escarapela_id' => $data['escarapela_id'],
                                        'certificado_id' => $data['certificado_id'],
                                    )
                                );
                                try {
                                    $this->Event->save($newEvent);
                                    $newEventId = $this->Event->getLastInsertId();

                                    if ($data['Committee'] != "") {
                                        foreach ($data['Committee'] as $Committee_id) {
                                            $newCommitteesEvent = $this->Event->CommitteesEvent->create();
                                            $newCommitteesEvent = array(
                                                'CommitteesEvent' => array(
                                                    'committee_id' => $Committee_id,
                                                    'event_id' => $newEventId
                                                )
                                            );
                                            $this->Event->CommitteesEvent->save($newCommitteesEvent);
                                        }
                                    }

                                    if ($data['Company'] != "") {
                                        foreach ($data['Company'] as $Company_id) {
                                            $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                            $newCompaniesEvent = array(
                                                'CompaniesEvent' => array(
                                                    'company_id' => $Company_id,
                                                    'event_id' => $newEventId
                                                )
                                            );
                                            $this->Event->CompaniesEvent->save($newCompaniesEvent);
                                        }
                                    }

                                    if ($data['Hotel'] != "") {
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
                                    }

                                    if ($data['Payment'] != "") {
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
                                    }

                                    if ($data['Categoria'] != "") {
                                        foreach ($data['Categoria'] as $Categoria_id) {
                                            $newEventsCategoria = $this->Event->EventsCategoria->create();
                                            $newEventsCategoria = array(
                                                'EventsCategoria' => array(
                                                    'categoria_id' => $Categoria_id,
                                                    'event_id' => $newEventId
                                                )
                                            );
                                            $this->Event->EventsCategoria->save($newEventsCategoria);
                                        }
                                    }

                                    return $this->redirect(array('action' => 'index'));
                                } catch (Exception $ex) {
                                    $error2 = $ex->getCode();
                                    if ($error2 == '23000') {
                                        $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
                                    }
                                }
//                $this->Event->create();
//                                if ($this->Event->save($this->request->data)) {
//                                    $this->Session->setFlash(__('The event has been saved.'));
//                                    return $this->redirect(array('action' => 'index'));
//                                } else {
//                                    $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
//                                }
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
//                                    'even_imagen2' => $name2,
                                    'even_fechInicio' => $data['even_fechInicio'],
                                    'even_fechFinal' => $data['even_fechFinal'],
                                    'even_publicar' => $data['even_publicar'],
                                    'even_codigo' => strtoupper($data['even_codigo']),
                                    'fechainiciopublicacion' => $data['fechainiciopublicacion'],
                                    'fechafinpublicacion' => $data['fechafinpublicacion'],
                                    'escarapela_id' => $data['escarapela_id'],
                                    'certificado_id' => $data['certificado_id'],
                                )
                            );
                            try {
                                $this->Event->save($newEvent);
                                $newEventId = $this->Event->getLastInsertId();

                                if ($data['Committee'] != "") {
                                    foreach ($data['Committee'] as $Committee_id) {
                                        $newCommitteesEvent = $this->Event->CommitteesEvent->create();
                                        $newCommitteesEvent = array(
                                            'CommitteesEvent' => array(
                                                'committee_id' => $Committee_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->CommitteesEvent->save($newCommitteesEvent);
                                    }
                                }

                                if ($data['Company'] != "") {
                                    foreach ($data['Company'] as $Company_id) {
                                        $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                        $newCompaniesEvent = array(
                                            'CompaniesEvent' => array(
                                                'company_id' => $Company_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->CompaniesEvent->save($newCompaniesEvent);
                                    }
                                }

                                if ($data['Hotel'] != "") {
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
                                }

                                if ($data['Payment'] != "") {
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
                                }

                                if ($data['Categoria'] != "") {
                                    foreach ($data['Categoria'] as $Categoria_id) {
                                        $newEventsCategoria = $this->Event->EventsCategoria->create();
                                        $newEventsCategoria = array(
                                            'EventsCategoria' => array(
                                                'categoria_id' => $Categoria_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->EventsCategoria->save($newEventsCategoria);
                                    }
                                }


                                return $this->redirect(array('action' => 'index'));
                            } catch (Exception $ex) {
                                $error2 = $ex->getCode();
                                if ($error2 == '23000') {
                                    $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
                                }
                            }
//                $this->Event->create();
//                            if ($this->Event->save($this->request->data)) {
//                                $this->Session->setFlash(__('The event has been saved.'));
//                                return $this->redirect(array('action' => 'index'));
//                            } else {
//                                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
//                            }
                        }
                    }
                } else {
                    $newEvent = $this->Event->create();
                    $newEvent = array(
                        'Event' => array(
//                            'city_id' => $data['city_id'],
                            'stage_id' => $data['stage_id'],
                            'event_type_id' => $data['event_type_id'],
                            'even_nombre' => strtoupper($data['even_nombre']), // strtoupper($src2)
                            'even_numeResolucion' => strtoupper($data['even_numeResolucion']),
                            'even_palaClave' => strtoupper($data['even_palaClave']),
                            'even_observaciones' => strtoupper($data['even_observaciones']),
//                        'even_estado' => $data['even_estado'],
                            // 'even_imagen1' => $nombre,
//                                    'even_imagen2' => $name2,
                            'even_fechInicio' => $data['even_fechInicio'],
                            'even_fechFinal' => $data['even_fechFinal'],
                            'even_publicar' => $data['even_publicar'],
                            'even_codigo' => strtoupper($data['even_codigo']),
                            'fechainiciopublicacion' => $data['fechainiciopublicacion'],
                            'fechafinpublicacion' => $data['fechafinpublicacion'],
                            'escarapela_id' => $data['escarapela_id'],
                            'certificado_id' => $data['certificado_id'],
                        )
                    );
                    //try {
                        try{
                            debug($newEvent);
                        $preg = $this->Event->save($newEvent);
                        debug($preg);
                        } catch (Exception $ex) {
                                    $error2 = $ex->getCode();
                                    $mensaje2 = $ex->getMessage();
                                    if ($error2 == '23000') {
                                        $this->Session->setFlash('AQUI', 'error');
                                    } else {
                                        $this->Session->setFlash($mensaje2, 'error');
                                    }
                                }
                        $newEventId = $this->Event->getLastInsertId();
                        
                        if ($data['Committee'] != "") {
                            foreach ($data['Committee'] as $Committee_id) {
                                $newCommitteesEvent = $this->Event->CommitteesEvent->create();
                                $newCommitteesEvent = array(
                                    'CommitteesEvent' => array(
                                        'committee_id' => $Committee_id,
                                        'event_id' => $newEventId
                                    )
                                );
                                $this->Event->CommitteesEvent->save($newCommitteesEvent);
                            }
                        }

                        if ($data['Company'] != "") {
                            foreach ($data['Company'] as $Company_id) {
                                $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                $newCompaniesEvent = array(
                                    'CompaniesEvent' => array(
                                        'company_id' => $Company_id,
                                        'event_id' => $newEventId
                                    )
                                );
                                $this->Event->CompaniesEvent->save($newCompaniesEvent);
                            }
                        }

                        if ($data['Hotel'] != "") {
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
                        }

                        if ($data['Payment'] != "") {
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
                        }

                        if ($data['Categoria'] != "") {
                            foreach ($data['Categoria'] as $Categoria_id) {
                                $newEventsCategoria = $this->Event->EventsCategoria->create();
                                $newEventsCategoria = array(
                                    'EventsCategoria' => array(
                                        'categoria_id' => $Categoria_id,
                                        'event_id' => $newEventId
                                    )
                                );
                                    $this->Event->EventsCategoria->save($newEventsCategoria);
                            }
                        }


                        return $this->redirect(array('action' => 'index'));
//                    } catch (Exception $ex) {
//                        $error2 = $ex->getCode();
//                        $mensaje2 = $ex->getMessage();
//                        if ($error2 == '23000') {
//                            $this->Session->setFlash('Error ya existe un evento en la base de datos', 'error');
//                        } else {
//                            $this->Session->setFlash($mensaje2, 'error');
//                        }
//                    }
//                $this->Event->create();
//                    if ($this->Event->save($this->request->data)) {
//                        $this->Session->setFlash(__('The event has been saved.'));
//                        return $this->redirect(array('action' => 'index'));
//                    } else {
//                        $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
//                    }
                }
//            }
            } else {
                $this->Session->setFlash('Ya existe el evento que intenta crear', 'error');
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

        $categorias = $this->Event->Categoria->find('list', array(
            "fields" => array(
                "Categoria.descripcion"
            ),
            "recursive" => -2
        ));

        $eventTypesName = $this->Event->EventType->find('list', array(
            "fields" => array(
                "EventType.nombre"
            ),
            "recursive" => -2
        ));

        $sql = $this->Event->query("SELECT id, descripcion FROM escarapelas");
        $escarapelas = array();
        foreach ($sql as $key => $value) {
            $escarapelas[$value['escarapelas']['id']] = $value['escarapelas']['descripcion'];
        }
//            debug($escarapelas);die;
        $sql2 = $this->Event->query("SELECT id, descripcion FROM certificados");
        $certificados = array();
        foreach ($sql2 as $key => $value) {
            $certificados[$value['certificados']['id']] = $value['certificados']['descripcion'];
        }


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
        $this->set(compact('stages', 'eventTypes', 'committees', 'companies', 'hotels', 'paymentsName', 'registrationTypes', 'categorias', 'escarapelas', 'certificados'));

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
            $data = $this->request->data;
            $newEventId = $data['Event']['id'];
            $cambioresolucion = 'true';
            $resolucion = $this->request->data['Event']['even_numeResolucion'];
            $sql = "SELECT even_numeResolucion  FROM `events` WHERE id=$id"; //
            $even = $this->Event->query($sql);
            $x = "";
            if ($even != array()) {
                $x = $even[0]['events']['even_numeResolucion'];
            }
            if ($x == $resolucion) {
                $this->request->data['Event']['even_numeResolucion'] = $resolucion;
            } else {
                $sql = "SELECT id FROM `events` WHERE even_numeResolucion='$resolucion'"; //
                $even = $this->Event->query($sql);
                $y = "";
                if ($even != array()) {
                    $y = $even[0]['events']['id'];
                }
                if ($y == "") {
                    $this->request->data['Event']['even_numeResolucion'] = $resolucion;
                } else {
                    $this->Session->setFlash('El numero de resolucion ya fue asignado verifiquelo.', 'error');
                    $cambioresolucion = 'false';
                }
            }

            if ($cambioresolucion == 'true') {
                //imagenes
                $file = $this->request->data["Event"]["even_imagen3"];
//                debug($file);
                $nombre = $file["name"];
                if ($nombre != "") {
                    $tipo = $file["type"];
                    $ruta_provicional = $file["tmp_name"];
                    $size = $file["size"];
                    $dimensiones = getimagesize($ruta_provicional);
                    $width = $dimensiones[0];
                    $height = $dimensiones[1];
                    $carpeta = WWW_ROOT . "/img/escenario/";
                    $src = $carpeta . $nombre;
                    if ($tipo != 'image/jpeg') {
                        $this->Session->setFlash('El archivo no es compatible solo recibe imagenes jpg o jepg.', 'error');
                    } elseif ($width != 500 && $height != 500) {
                        $this->Session->setFlash('Las dimenciones no son correctas deben ser 500px X 500px.', 'error');
                    } else {
                        $file2 = $this->request->data["Event"]["even_imagen4"];
//                debug($file);
                        $nombre2 = $file2["name"];
                        if ($nombre2 != "") {
                            $tipo2 = $file2["type"];
                            $ruta_provicional2 = $file2["tmp_name"];
                            $size2 = $file2["size"];
                            $dimensiones2 = getimagesize($ruta_provicional2);
                            $width2 = $dimensiones2[0];
                            $height2 = $dimensiones2[1];
                            $carpeta2 = WWW_ROOT . "/img/escenario/";
                            $src2 = $carpeta2 . $nombre2;
                            if ($tipo2 != 'image/jpeg') {
                                $this->Session->setFlash(__('El archivo no es compatible solo recibe imagenes jpg o jepg.', 'error'));
                            } elseif ($width2 != 500 && $height2 != 500) {
                                $this->Session->setFlash(__('Las dimenciones no son correctas deben ser 500px X 500px.', 'error'));
                            } else {
                                move_uploaded_file($ruta_provicional, $src);
                                move_uploaded_file($ruta_provicional2, $src2);
                                $this->request->data["Event"]["even_imagen1"] = $nombre;
                                $this->request->data["Event"]["even_imagen2"] = $nombre2;

                                //fechas           
                                $fechainicio = $this->request->data['Event']['EvenFechInicio'];
                                $fechafinal = $this->request->data['Event']['EvenFechFinal'];
                                $this->request->data['Event']['even_fechInicio'] = $fechainicio;
                                $this->request->data['Event']['even_fechFinal'] = $fechafinal;

                                $fechainiciopublicacion = $this->request->data['Event']['EvenFechainiciopublicacion'];
                                $fechafinalpublicacion = $this->request->data['Event']['EvenFechafinpublicacion'];
                                $this->request->data['Event']['fechainiciopublicacion'] = $fechainiciopublicacion;
                                $this->request->data['Event']['fechafinpublicacion'] = $fechafinalpublicacion;

                                //multiselects
                                $sqlOld = "DELETE FROM committees_events WHERE event_id=" . $newEventId;
                                $this->Event->CommitteesEvent->query($sqlOld);
                                if ($data['Committee']['Committee'] != "") {
                                    foreach ($data['Committee']['Committee'] as $Committee_id) {
                                        $newCommitteesEvent = $this->Event->CommitteesEvent->create();
                                        $newCommitteesEvent = array(
                                            'CommitteesEvent' => array(
                                                'committee_id' => $Committee_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->CommitteesEvent->save($newCommitteesEvent);
                                    }
                                }

                                $sqlOld = "DELETE FROM companies_events WHERE event_id=" . $newEventId;
                                $this->Event->CompaniesEvent->query($sqlOld);
                                if ($data['Company']['Company'] != "") {
                                    foreach ($data['Company']['Company'] as $Company_id) {
                                        $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                        $newCompaniesEvent = array(
                                            'CompaniesEvent' => array(
                                                'company_id' => $Company_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->CompaniesEvent->save($newCompaniesEvent);
                                    }
                                }

                                $sqlOld = "DELETE FROM events_hotels WHERE event_id=" . $newEventId;
                                $this->Event->EventsHotel->query($sqlOld);
                                if ($data['Hotel']['Hotel'] != "") {
                                    foreach ($data['Hotel']['Hotel'] as $Hotel_id) {
                                        $newEventsHotel = $this->Event->EventsHotel->create();
                                        $newEventsHotel = array(
                                            'EventsHotel' => array(
                                                'hotel_id' => $Hotel_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->EventsHotel->save($newEventsHotel);
                                    }
                                }

                                $sqlOld = "DELETE FROM events_payments WHERE event_id=" . $newEventId;
                                $this->Event->EventsPayment->query($sqlOld);
                                if ($data['Payment']['Payment'] != "") {
                                    foreach ($data['Payment']['Payment'] as $Payment_id) {
                                        $newEventsPayment = $this->Event->EventsPayment->create();
                                        $newEventsPayment = array(
                                            'EventsPayment' => array(
                                                'payment_id' => $Payment_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->EventsPayment->save($newEventsPayment);
                                    }
                                }

                                $sqlOld = "DELETE FROM events_categorias WHERE event_id=" . $newEventId;
                                $this->Event->EventsCategoria->query($sqlOld);
                                if ($data['Categoria']['Categoria'] != "") {
                                    foreach ($data['Categoria']['Categoria'] as $Categoria_id) {
                                        $newEventsCategoria = $this->Event->EventsCategoria->create();
                                        $newEventsCategoria = array(
                                            'EventsCategoria' => array(
                                                'categoria_id' => $Categoria_id,
                                                'event_id' => $newEventId
                                            )
                                        );
                                        $this->Event->EventsCategoria->save($newEventsCategoria);
                                    }
                                }


                                if ($this->Event->save($this->request->data)) {
                                    CakeSession::write('sw', '0');
                                    $this->Session->setFlash(__('The event has been saved.'));
                                    return $this->redirect(array('action' => 'index'));
                                } else {
                                    $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
                                }
                            }
                        } else {
                            move_uploaded_file($ruta_provicional, $src);
                            $this->request->data["Event"]["even_imagen1"] = $nombre;
                            $this->request->data["Event"]["even_imagen2"] = $this->request->data["nameImage2"];

                            //fechas           
                            $fechainicio = $this->request->data['Event']['EvenFechInicio'];
                            $fechafinal = $this->request->data['Event']['EvenFechFinal'];
                            $this->request->data['Event']['even_fechInicio'] = $fechainicio;
                            $this->request->data['Event']['even_fechFinal'] = $fechafinal;

                            $fechainiciopublicacion = $this->request->data['Event']['EvenFechainiciopublicacion'];
                            $fechafinalpublicacion = $this->request->data['Event']['EvenFechafinpublicacion'];
                            $this->request->data['Event']['fechainiciopublicacion'] = $fechainiciopublicacion;
                            $this->request->data['Event']['fechafinpublicacion'] = $fechafinalpublicacion;

                            //multiselects
                            //multiselects
                            $sqlOld = "DELETE FROM committees_events WHERE event_id=" . $newEventId;
                            $this->Event->CommitteesEvent->query($sqlOld);
                            if ($data['Committee']['Committee'] != "") {
                                foreach ($data['Committee']['Committee'] as $Committee_id) {
                                    $newCommitteesEvent = $this->Event->CommitteesEvent->create();
                                    $newCommitteesEvent = array(
                                        'CommitteesEvent' => array(
                                            'committee_id' => $Committee_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->CommitteesEvent->save($newCommitteesEvent);
                                }
                            }

                            $sqlOld = "DELETE FROM companies_events WHERE event_id=" . $newEventId;
                            $this->Event->CompaniesEvent->query($sqlOld);
                            if ($data['Company']['Company'] != "") {
                                foreach ($data['Company']['Company'] as $Company_id) {
                                    $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                    $newCompaniesEvent = array(
                                        'CompaniesEvent' => array(
                                            'company_id' => $Company_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->CompaniesEvent->save($newCompaniesEvent);
                                }
                            }

                            $sqlOld = "DELETE FROM events_hotels WHERE event_id=" . $newEventId;
                            $this->Event->EventsHotel->query($sqlOld);
                            if ($data['Hotel']['Hotel'] != "") {
                                foreach ($data['Hotel']['Hotel'] as $Hotel_id) {
                                    $newEventsHotel = $this->Event->EventsHotel->create();
                                    $newEventsHotel = array(
                                        'EventsHotel' => array(
                                            'hotel_id' => $Hotel_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->EventsHotel->save($newEventsHotel);
                                }
                            }

                            $sqlOld = "DELETE FROM events_payments WHERE event_id=" . $newEventId;
                            $this->Event->EventsPayment->query($sqlOld);
                            if ($data['Payment']['Payment'] != "") {
                                foreach ($data['Payment']['Payment'] as $Payment_id) {
                                    $newEventsPayment = $this->Event->EventsPayment->create();
                                    $newEventsPayment = array(
                                        'EventsPayment' => array(
                                            'payment_id' => $Payment_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->EventsPayment->save($newEventsPayment);
                                }
                            }

                            $sqlOld = "DELETE FROM events_categorias WHERE event_id=" . $newEventId;
                            $this->Event->EventsCategoria->query($sqlOld);
                            if ($data['Categoria']['Categoria'] != "") {
                                foreach ($data['Categoria']['Categoria'] as $Categoria_id) {
                                    $newEventsCategoria = $this->Event->EventsCategoria->create();
                                    $newEventsCategoria = array(
                                        'EventsCategoria' => array(
                                            'categoria_id' => $Categoria_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->EventsCategoria->save($newEventsCategoria);
                                }
                            }

                            if ($this->Event->save($this->request->data)) {
                                CakeSession::write('sw', '0');
                                $this->Session->setFlash(__('The event has been saved.'));
                                return $this->redirect(array('action' => 'index'));
                            } else {
                                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
                            }
                        }
                    }
                } else {
                    $file2 = $this->request->data["Event"]["even_imagen4"];
//                debug($file);
                    $nombre2 = $file2["name"];
                    if ($nombre2 != "") {
                        $tipo2 = $file2["type"];
                        $ruta_provicional2 = $file2["tmp_name"];
                        $size2 = $file2["size"];
                        $dimensiones2 = getimagesize($ruta_provicional2);
                        $width2 = $dimensiones2[0];
                        $height2 = $dimensiones2[1];
                        $carpeta2 = WWW_ROOT . "/img/escenario/";
                        $src2 = $carpeta2 . $nombre2;
                        if ($tipo2 != 'image/jpeg') {
                            $this->Session->setFlash(__('El archivo no es compatible solo recibe imagenes jpg o jepg.', 'error'));
                        } elseif ($width2 != 500 && $height2 != 500) {
                            $this->Session->setFlash(__('Las dimenciones no son correctas deben ser 500px X 500px.', 'error'));
                        } else {
                            move_uploaded_file($ruta_provicional2, $src2);
                            $this->request->data["Event"]["even_imagen1"] = $this->request->data["nameImage1"];
                            $this->request->data["Event"]["even_imagen2"] = $nombre2;

                            //fechas           
                            $fechainicio = $this->request->data['Event']['EvenFechInicio'];
                            $fechafinal = $this->request->data['Event']['EvenFechFinal'];
                            $this->request->data['Event']['even_fechInicio'] = $fechainicio;
                            $this->request->data['Event']['even_fechFinal'] = $fechafinal;

                            $fechainiciopublicacion = $this->request->data['Event']['EvenFechainiciopublicacion'];
                            $fechafinalpublicacion = $this->request->data['Event']['EvenFechafinpublicacion'];
                            $this->request->data['Event']['fechainiciopublicacion'] = $fechainiciopublicacion;
                            $this->request->data['Event']['fechafinpublicacion'] = $fechafinalpublicacion;

                            //multiselects
                            //multiselects
                            $sqlOld = "DELETE FROM committees_events WHERE event_id=" . $newEventId;
                            $this->Event->CommitteesEvent->query($sqlOld);
                            if ($data['Committee']['Committee'] != "") {
                                foreach ($data['Committee']['Committee'] as $Committee_id) {
                                    $newCommitteesEvent = $this->Event->CommitteesEvent->create();
                                    $newCommitteesEvent = array(
                                        'CommitteesEvent' => array(
                                            'committee_id' => $Committee_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->CommitteesEvent->save($newCommitteesEvent);
                                }
                            }

                            $sqlOld = "DELETE FROM companies_events WHERE event_id=" . $newEventId;
                            $this->Event->CompaniesEvent->query($sqlOld);
                            if ($data['Company']['Company'] != "") {
                                foreach ($data['Company']['Company'] as $Company_id) {
                                    $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                    $newCompaniesEvent = array(
                                        'CompaniesEvent' => array(
                                            'company_id' => $Company_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->CompaniesEvent->save($newCompaniesEvent);
                                }
                            }

                            $sqlOld = "DELETE FROM events_hotels WHERE event_id=" . $newEventId;
                            $this->Event->EventsHotel->query($sqlOld);
                            if ($data['Hotel']['Hotel'] != "") {
                                foreach ($data['Hotel']['Hotel'] as $Hotel_id) {
                                    $newEventsHotel = $this->Event->EventsHotel->create();
                                    $newEventsHotel = array(
                                        'EventsHotel' => array(
                                            'hotel_id' => $Hotel_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->EventsHotel->save($newEventsHotel);
                                }
                            }

                            $sqlOld = "DELETE FROM events_payments WHERE event_id=" . $newEventId;
                            $this->Event->EventsPayment->query($sqlOld);
                            if ($data['Payment']['Payment'] != "") {
                                foreach ($data['Payment']['Payment'] as $Payment_id) {
                                    $newEventsPayment = $this->Event->EventsPayment->create();
                                    $newEventsPayment = array(
                                        'EventsPayment' => array(
                                            'payment_id' => $Payment_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->EventsPayment->save($newEventsPayment);
                                }
                            }

                            $sqlOld = "DELETE FROM events_categorias WHERE event_id=" . $newEventId;
                            $this->Event->EventsCategoria->query($sqlOld);
                            if ($data['Categoria']['Categoria'] != "") {
                                foreach ($data['Categoria']['Categoria'] as $Categoria_id) {
                                    $newEventsCategoria = $this->Event->EventsCategoria->create();
                                    $newEventsCategoria = array(
                                        'EventsCategoria' => array(
                                            'categoria_id' => $Categoria_id,
                                            'event_id' => $newEventId
                                        )
                                    );
                                    $this->Event->EventsCategoria->save($newEventsCategoria);
                                }
                            }

                            if ($this->Event->save($this->request->data)) {
                                CakeSession::write('sw', '0');
                                $this->Session->setFlash(__('The event has been saved.'));
                                return $this->redirect(array('action' => 'index'));
                            } else {
                                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
                            }
                        }
                    } else {
                        //debug($this->request->data["nameImage1"]);debug($this->request->data["nameImage2"]);die;
                        if ($this->request->data["nameImage1"] != "") {
                            $this->request->data["Event"]["even_imagen1"] = $this->request->data["nameImage1"];
                        }
                        if ($this->request->data["nameImage2"] != "") {
                            $this->request->data["Event"]["even_imagen2"] = $this->request->data["nameImage2"];
                        }
                        //fechas           
                        $fechainicio = $this->request->data['Event']['EvenFechInicio'];
                        $fechafinal = $this->request->data['Event']['EvenFechFinal'];
                        $this->request->data['Event']['even_fechInicio'] = $fechainicio;
                        $this->request->data['Event']['even_fechFinal'] = $fechafinal;

                        $fechainiciopublicacion = $this->request->data['Event']['EvenFechainiciopublicacion'];
                        $fechafinalpublicacion = $this->request->data['Event']['EvenFechafinpublicacion'];
                        $this->request->data['Event']['fechainiciopublicacion'] = $fechainiciopublicacion;
                        $this->request->data['Event']['fechafinpublicacion'] = $fechafinalpublicacion;

                        //multiselects
                        //multiselects
                        $sqlOld = "DELETE FROM committees_events WHERE event_id=" . $newEventId;
                        $this->Event->CommitteesEvent->query($sqlOld);
                        if ($data['Committee']['Committee'] != "") {
                            foreach ($data['Committee']['Committee'] as $Committee_id) {
                                $newCommitteesEvent = $this->Event->CommitteesEvent->create();
                                $newCommitteesEvent = array(
                                    'CommitteesEvent' => array(
                                        'committee_id' => $Committee_id,
                                        'event_id' => $newEventId
                                    )
                                );
                                $this->Event->CommitteesEvent->save($newCommitteesEvent);
                            }
                        }

                        $sqlOld = "DELETE FROM companies_events WHERE event_id=" . $newEventId;
                        $this->Event->CompaniesEvent->query($sqlOld);
                        if ($data['Company']['Company'] != "") {
                            foreach ($data['Company']['Company'] as $Company_id) {
                                $newCompaniesEvent = $this->Event->CompaniesEvent->create();
                                $newCompaniesEvent = array(
                                    'CompaniesEvent' => array(
                                        'company_id' => $Company_id,
                                        'event_id' => $newEventId
                                    )
                                );
                                $this->Event->CompaniesEvent->save($newCompaniesEvent);
                            }
                        }

                        $sqlOld = "DELETE FROM events_hotels WHERE event_id=" . $newEventId;
                        $this->Event->EventsHotel->query($sqlOld);
                        if ($data['Hotel']['Hotel'] != "") {
                            foreach ($data['Hotel']['Hotel'] as $Hotel_id) {
                                $newEventsHotel = $this->Event->EventsHotel->create();
                                $newEventsHotel = array(
                                    'EventsHotel' => array(
                                        'hotel_id' => $Hotel_id,
                                        'event_id' => $newEventId
                                    )
                                );
                                $this->Event->EventsHotel->save($newEventsHotel);
                            }
                        }

                        $sqlOld = "DELETE FROM events_payments WHERE event_id=" . $newEventId;
                        $this->Event->EventsPayment->query($sqlOld);
                        if ($data['Payment']['Payment'] != "") {
                            foreach ($data['Payment']['Payment'] as $Payment_id) {
                                $newEventsPayment = $this->Event->EventsPayment->create();
                                $newEventsPayment = array(
                                    'EventsPayment' => array(
                                        'payment_id' => $Payment_id,
                                        'event_id' => $newEventId
                                    )
                                );
                                $this->Event->EventsPayment->save($newEventsPayment);
                            }
                        }

                        $sqlOld = "DELETE FROM events_categorias WHERE event_id=" . $newEventId;
                        $this->Event->EventsCategoria->query($sqlOld);
                        if ($data['Categoria']['Categoria'] != "") {
                            foreach ($data['Categoria']['Categoria'] as $Categoria_id) {
                                $newEventsCategoria = $this->Event->EventsCategoria->create();
                                $newEventsCategoria = array(
                                    'EventsCategoria' => array(
                                        'categoria_id' => $Categoria_id,
                                        'event_id' => $newEventId
                                    )
                                );
                                $this->Event->EventsCategoria->save($newEventsCategoria);
                            }
                        }

                        if ($this->Event->save($this->request->data)) {
                            CakeSession::write('sw', '0');
                            $this->Session->setFlash('El evento se guardo correctamente.', 'good');
                            return $this->redirect(array('action' => 'index'));
                        } else {
                            $this->Session->setFlash('El evento no pudo ser editado. Por favor, intente nuevamente.', 'error');
                        }
                    }
                }
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

        $categorias = $this->Event->Categoria->find('list', array(
            "fields" => array(
                "Categoria.descripcion"
            ),
            "recursive" => -2
        ));

        $sql = $this->Event->query("SELECT id, descripcion FROM escarapelas");
        $escarapelas = array();
        foreach ($sql as $key => $value) {
            $escarapelas[$value['escarapelas']['id']] = $value['escarapelas']['descripcion'];
        }

        $sql2 = $this->Event->query("SELECT id, descripcion FROM certificados");
        $certificados = array();
        foreach ($sql2 as $key => $value) {
            $certificados[$value['certificados']['id']] = $value['certificados']['descripcion'];
        }

//        $registrationTypes = $this->Event->RegistrationType->find('list');
        $this->set(compact('stages', 'eventTypes', 'committees', 'companies', 'hotels', 'payments', 'registrationTypes', 'categorias', 'escarapelas', 'certificados'));
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

    public function getDaysByEvent() {
        $this->layout = "webservices";
        $this->loadModel("Event");
        $event_id = $this->request->data["event_id"]; //State
        $sql = "SELECT datediff(`even_fechFinal`, `even_fechInicio`) AS cantidad FROM `events` e WHERE `id` = $event_id";
        $cantidad = $this->Event->query($sql);
        $total = $cantidad[0][0]['cantidad'];
        $sql2 = "SELECT even_fechInicio FROM events WHERE id = $event_id";
        $fecha = $this->Event->query($sql2);
        if ($fecha != array()) {
            $date = $fecha[0]['events']['even_fechInicio'];
            $f = date('Y-m-d', strtotime($date));
        }
//       debug($date ." asdasdasd   ".$f);die;
        $datos = array();

//        for ($i = 0; $i < $total; $i++) {
//            $datos[$i]['g']['id'] = [$f];
//            $datos[$i]['g']['name'] = [$f];
//            $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));

        if ($total > 0) {
            for ($i = 0; $i < $total; $i++) {
                $datos[$i]['g']['id'] = $f;
                $datos[$i]['g']['name'] = $f;
                $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));
            }
        }
//        debug($datos); die;

        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

}
