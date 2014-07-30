<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Auth', 'Session', 'RequestHandler');

    public function beforeFilter() {
        $this->set('authUser', $this->Auth->user());
        //$this->Auth->allow('add');

        parent:: beforeFilter();
//        if ($this->Auth->user('role') == 'admin') {
//            $this->Auth->allow('add', 'asociartarjeta', 'add2');
//        } else {
//            $this->Auth->allow();
//        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->layout = false;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
//        $this->layout = false;

        if ($this->request->is('post')) {

            $data = $this->data;
            $this->loadModel('People');
// this is for the case you want to insert into 2 tables at a same time
            $newPeole = $this->People->create();
            $newPeole = array(
                'People' => array(
                    'pers_primNombre' => $data['People']['pers_primNombre'],
                    'pers_primApellido' => $data['People']['pers_primApellido'],
                    'document_type_id' => $data['User']['document_type_id'],
                    'city_id' => $data['User']['city_id'],
                    'pers_documento' => $data['People']['pers_documento'],
                    'pers_direccion' => $data['People']['pers_direccion'],
                    'pers_telefono' => $data['People']['pers_telefono'],
                    'pers_celular' => $data['People']['pers_celular'],
                    'pers_fechNacimiento' => $data['People']['pers_fechNacimiento'],
                    'pers_tipoSangre' => $data['People']['pers_tipoSangre'],
                    'pers_mail' => $data['People']['pers_mail']
                )
            );
            try {
                $this->People->save($newPeole);
                $newPeopleId = $this->People->getLastInsertId();

                $newUser = $this->User->create();

                $newUser = array(
                    'User' => array(
                        'person_id' => $newPeopleId,
                        'username' => $data['User']['username'],
                        'password' => $data['User']['password'],
                        'estado' => 1,
                        'type_user_id' => $data['User']['type_user_id'],
                        'department_id' => $data['User']['department_id'],
                        'validodesde' => $data['User']['validodesde']['year'] . '-' . $data['User']['validodesde']['month'] . '-' . $data['User']['validodesde']['day'],
                        'validohasta' => $data['User']['validohasta']['year'] . '-' . $data['User']['validohasta']['month'] . '-' . $data['User']['validohasta']['day'],
                        'identificador' => $data['User']['Identificador']
                    )
                );
                $this->User->save($newUser);
                //$usuario = $this->User->getLastInsertId();
                //$this->loadModel('AuthorizationsUsers');
                //$newAutirizationsUser = $this->AuthorizationsUsers->create();
                //$this->Authorization->save($this->request->data);
                //$data_auth = $this->request->data;
                //debug($data_auth);
                // foreach ($data_auth as $value) {
                //         $authorizations = $value['authorization_id'];
                //         foreach($authorizations as $value2){
                //         if($value2 != '')
                //         {
                //             debug($value2);
                //         }
                //     }
                // }
                // for ($i = 0; $i < count($this->request->data['authorization_id']); $i++)
                //     {
                //         $newAuthorizationsUser = array(
                //         'AutorizartionUser' => array(
                //             'authorization_id' => $data("data[User][Autorization][$i]"),
                //             'user_id'=>$usuario
                //             )
                //         );
                //         //debug($newAuthorizationsUser);
                //     }           
                return $this->redirect(array('action' => 'index'));
            } catch (Exception $ex) {
                //debug("entre aqui");
                $error2 = $ex->getCode();
                if ($error2 == '23000') {
                    $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
                }
            }


//debug($newPeopleId);
            /**
             * or if you already have Game Id, and Developer Id, then just load it on, and 
             * put it in the statement below, to create a new Assignment
             * */
//fin codigo para la isercion multiple
        }
//cargar select
//tipo de documento
        $documentTypeName = $this->User->Person->DocumentType->find('list', array(
            "fields" => array(
                "DocumentType.tido_descripcion"
            )
        ));
//debug($documentTypeName);
//tipo de usuario
        $typeUserName = $this->User->TypeUser->find('list', array(
            "fields" => array(
                "TypeUser.descripcion"
            )
        ));

        $departmentName = $this->User->Department->find('list', array(
            "fields" => array(
                "Department.descripcion"
            )
        ));
//debug($departmentName);
//pais
//               
        $this->loadModel('Country');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            ),
            "recursive" => -2
        ));
//debug($countriesName);
        $people = $this->User->Person->find('list');
        $typeUsers = $this->User->TypeUser->find('list');
        $authorizations = $this->User->Authorization->find('list', array(
            'fields' => array(
                "Authorization.nombre"
            )
        ));
        $this->set(compact('people', 'typeUsers', 'authorizations', 'documentTypes', 'countries'));
        $this->set(compact('state'));

        $cities = $this->User->Person->City->find('list');
        $this->set(compact('cities'));
//montar descripcion a select
        $this->set(compact("documentTypeName"));
        $this->set("typeUserName", $typeUserName);
        $this->set("departmentName", $departmentName);
        $this->set(compact("countriesName"));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }

        $typeUsers = $this->User->TypeUser->find('list', array(
            "fields" => array(
                "TypeUser.descripcion"
            )
        ));
        $departments = $this->User->Department->find('list', array(
            "fields" => array(
                "Department.descripcion"
            )
        ));

        $authorizations = $this->User->Authorization->find('list', array(
            "fields" => array(
                "Autorization.nombre"
        )));
        $this->set(compact('people', 'typeUsers', 'departments', 'authorizations'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function login() {

        $this->Session->destroy();
        if ($this->request->is('post')) {
            //debug($this->request->data);
//            debug($this->Auth->login());
//            debug($this->request->data);
            if ($this->Auth->login() == true) {
                $this->Session->write('User.username', $this->request->data["User"]["username"]);
                $this->Session->write('User.password', $this->request->data["User"]["password"]);
//                debug($this->Auth->user());
                $options = array(
                    'conditions' => array(
                        "User.id" => $this->Auth->user('id')
//                        "User.password" => $this->request->data["User"]["password"]
                    ),
                    'fields' => array(
                        "User.id",
                        "User.type_user_id"
                    ),
                    'recursive' => -2
                );
//                debug($options);
                $this->Session->setFlash(__('Bienvenido ' . $this->request->data["User"]["username"]));
                $datos = $this->User->find('first', $options);
//                debug($datos);
                if ($datos === null) {
                    $this->Session->setFlash(__('El usuario no está registrado, intenta nuevamente'));
                } else {
                    $this->Session->write('User.id', $datos['User']['id']);
                    $this->Session->write('User.type_user_id', $datos['User']['type_user_id']);

                    $user_id = $this->Session->read('User.id');
                    $this->loadModel('AuthorizationsUsers');
                    $queryDatos = "select * from authorizations_users JOIN authorizations on authorizations_users.authorization_id=authorizations.id where authorizations_users.user_id=" . $user_id . "";

                    $permisos = $this->AuthorizationsUsers->query($queryDatos);
                    //debug($permisos);
                    $controladores = array();
                    $acciones = array();
                    //$nombres = array();

                    foreach ($permisos as $permiso) {
                        //array_push($nombres, $permiso['authorizations']['nombre']);
                        // array_push($acciones, $permiso['authorizations']['accion']);
                        array_push($controladores, $permiso['authorizations']['controlador']);
                    }
                    // $accion = array_unique($acciones);
                    $controlador = array_unique($controladores);
                    //$nombre = array_unique($nombres);
                    //debug( $controlador);
                    // $this->Session->write('accion', $accion);
                    $this->Session->write('controlador', $controlador);
                    //$this->Session->write('nombre', $nombre);

                    return $this->redirect($this->Auth->redirect());
                }
            }
            $this->Session->setFlash(__('el usuario o la clave son incorrectas, intente otra vez'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function asociartarjeta() {

        $this->loadModel('Entrada');
        if ($this->request->is('post')) {
            $datos = $this->data;


            $newUser = $this->User->create();
            $newUser = array(
                'User' => array(
                    'nombre' => $datos['User']['nombre']));
            $this->User->save($datos);
            $newUserId = $this->User->getLastInsertId();

            $newEntrada = $this->Entrada->create();
            $newEntrada = array(
                'Entrada' => array(
                    'usuario_id' => $newUserId,
                    'tarjeta' => $datos['Entrada']['tarjeta']));

            $this->Session->setFlash("Operacion realizada con exito");
            $this->Entrada->save($newEntrada);
            $this->redirect(array('action' => 'asociartarjeta'));
        }
    }

    public function asociar() {
        $this->loadModel('Entrada');
        if ($this->request->is('post')) {
            $datos = $this->data;
            $options = array(
                "conditions" => array(
                    'User.documento' => $datos["User"]["documento"]
                )
            );
            $usuario = $this->User->find("first", $options);
            if ($usuario) {
                $newEntrada = $this->Entrada->create();
                $newEntrada = array(
                    'Entrada' => array(
                        'usuario_id' => $usuario["User"]["id"],
                        'tarjeta' => $datos['Entrada']['tarjeta']));

                $this->Session->setFlash("Operacion realizada con exito");
                $this->Entrada->save($newEntrada);
                $this->redirect(array('action' => 'asociartarjeta'));
            } else {
                
            }
        }
    }

    public function elegirEvento() {
        $this->loadModel('Event');
        $eventos = $this->Event->find('list', array(
            "fields" => array(
                "Event.even_nombre"
        )));
        //debug($eventos);
        if ($this->request->is('post')) {
            $data = $this->data;
            //debug($data['User']['event_id']);
            // $event_id = $data['User']['event_id'];
            // $_SESSION['event_id'] = $event_id;

            $this->redirect(array('action' => 'add2', '?' => array(
                    'event_id' => $data['User']['event_id'])));
        }
        $this->set('eventos', $eventos);
    }

    public function add2() {
        // $this->layout = "webservices";
        //$event_id = $this->request->query["event_id"];
        // debug(implode("','",$event_id));
        $event_id = $this->request->query["event_id"];
        //debug($event_id);


        $this->loadModel('Forms');

        $forms = $this->Forms->findAllByEventId($event_id);
        //debug(!Empty($forms));
        if (!Empty($forms)) {
            foreach ($forms as $form) {
                $form_id = $form['Forms']['event_id'];
            }
            $this->loadModel('FormsPersonalDatum');
            $formPersonal = $this->FormsPersonalDatum->findAllByFormId($form_id);
        } else {
            $formPersonal = '';
        }


        if ($this->request->is('post')) {

            $data = $this->data;
            $this->loadModel('People');

            $newPeole = $this->People->create();
            $newPeole = array(
                'People' => array(
                    'pers_documento' => $data['PersonalDatum']['documento'],
                )
            );
            $this->People->save($newPeole);
            $newPeopleId = $this->People->getLastInsertId();

            $datos = $this->request->data;

            foreach ($datos as $dato) {
                while ($value = current($dato)) {


                    if (key($dato) != 'documento') {
                        $this->loadModel('Data');
                        $newData = $this->Data->create();
                        $newData = array(
                            'Data' => array(
                                'descripcion' => $value,
                                'forms_personal_data_id' => key($dato),
                                'person_id' => $newPeopleId,
                            )
                        );
                        $this->Data->save($newData);
                    }
                    next($dato);
                }
            }
            return $this->redirect(array('action' => 'elegirEvento'));
        }
        $this->set('form', $formPersonal);
    }

    public function buscador() {

        $this->loadModel('PersonalDatum');
        $formPersonal = $this->PersonalDatum->find('all');
        //debug($this->Auth->user('User.username'));


        if ($this->request->is('post')) {
            $data = $this->data;
            $this->loadModel('People');

            $datos = $this->request->data;
            $pers_id = $this->Session->read('User.id');
            // debug($pers_id);

            $this->loadModel('Event');
            $autorizado = $this->Event->find("list", array(
                "fields" => array(
                    "Event.even_nombre")));

            //$event = array();

            foreach ($autorizado as $auth) {
                $event_id = $auth;
                debug($event_id);
                $this->loadModel('Event');
                $event = $this->Event->find('list', array(
                    "options" => array(
                        "Event.id" => "event_id"),
                    "fields" => array(
                        "Event.even_nombre"
                )));
            }
            //debug($event);

            $conditions = "";
            $conditions2 = "";

            foreach ($datos as $dato) {
                while ($value = key($dato)) {

                    $value = current($dato);
                    if ($value != '') {

                        if (key($dato) != "documento") {

                            if (!is_int($value))
                                $value = "like '%" . $value . "%'";
                            else
                                $value = "=" . $value;
                            if ($conditions != "") {

                                $conditions.=" or " . 'and d.forms_personal_datum_id=fp.id and fp.personal_datum_id=' . key($dato);

                                $conditions.=" and " . 'd.descripcion ' . $value;
                            } else {

                                $conditions.='  d.forms_personal_datum_id=fp.id and fp.personal_datum_id=' . key($dato);
                                $conditions.='  and d.descripcion ' . $value;
                            }
                        } else {
                            $conditions2.=' pers_documento =' . $value;
                        }
                    }
                    next($dato);
                }
            }

            if ($conditions != '')
                $conditions = "select * from datas d, forms_personal_data fp where " . $conditions;


            if ($conditions2 != '')
                $conditions2 = "select * from people where " . $conditions2;


            $this->loadModel('Data');

            if ($conditions != '') {
                $datas = $this->Data->query($conditions);
                $datosVista = array();
                $datosVista2 = array();
                foreach ($datas as $data) {
                    //debug($data);
                    $person_id = $data['d']['person_id'];

                    $queryDatos = "select * from datas  JOIN forms_personal_data on datas.forms_personal_datum_id=forms_personal_data.id JOIN personal_data on forms_personal_data.personal_datum_id=personal_data.id where datas.person_id=" . $person_id . "";


                    $personas = $this->Data->query($queryDatos);
                    array_push($datosVista, $personas);
                    $queryPersona = "select * from people where id=" . $person_id;
                    $personas2 = $this->People->query($queryPersona);
                    array_push($datosVista2, $personas2);
                }
                //debug($datosVista);

                $this->set('datosvista', $datosVista);
                $this->set('datosvista2', $datosVista2);
                $this->set('autorizado', $autorizado);
                $this->set('event', $event);
            }




            if ($conditions2 != '') {
                $people = $this->Data->query($conditions2);
                $datosVista = array();
                $datosVista2 = array();
                foreach ($people as $value) {
                    $person_id = $value['people']['id'];
                    $queryDatos = "select * from datas  JOIN forms_personal_data on datas.forms_personal_datum_id=forms_personal_data.id JOIN personal_data on forms_personal_data.personal_datum_id=personal_data.id where datas.person_id=" . $person_id . "";
                    //datos para ser enviados a la vista.
                    $personas = $this->Data->query($queryDatos);
                    array_push($datosVista, $personas);
                    $queryPersona = "select * from people where id=" . $person_id;
                    $personas2 = $this->People->query($queryPersona);
                    array_push($datosVista2, $personas2);
                }



                $this->set('datosvista', $datosVista);
                $this->set('datosvista2', $datosVista2);
                $this->set('autorizado', $autorizado);
                $this->set('event', $event);
            }
        }



        $this->set('form', $formPersonal);
    }

    public function registrar2() {
        $mensaje = "";
        $this->layout = "webservice";
        if ($this->request->is("POST")) {

            //Primero determino si la tarjeta esta registrada en el sistema
            $this->loadModel("Input");
            $input = $this->Input->find('first', array(
                "conditions" => array(
                    "Input.entr_codigo" => $this->request->data["Input"]["entr_codigo"]
                )
            ));
            if ($input) {

                try {



                    //Agrego la entrada
                    if ($input['Input']["categoria_id"] == $this->request->data['User']['registration_type_id']) {
                        $this->loadModel('People');

                        //Creo y almaceno a la persona
                        $newPeole = $this->People->create();
                        $this->People->save($this->request->data);
                        $newPeopleId = $this->People->getLastInsertId();

                        //Almaceno la informacion de la persona
                        $this->loadModel('Data');
                        $cont = 0;
                        foreach ($this->request->data["Data"] as $value) {
                            $this->request->data["Data"][$cont]["person_id"] = $newPeopleId;
                            $cont++;
                        }
                        $this->Data->saveAll($this->request->data['Data']);
                        $this->request->data["Input"]["id"] = $input["Input"]["id"];

                        $this->request->data["Input"]["person_id"] = $newPeopleId;
//                    $this->request->data["Input"]["events_registration_type_id"] = $this->request->data["User"]["registration_type_id"];
                        $this->loadModel("Input");
//                    debug($this->request->data["Input"]);
                        $this->Input->save($this->request->data);
//                        $this->Session->setFlash('Registro realizado con exito', 'good');
                        $mensaje = "Registro realizado con exito";
                    } else {
//                        $this->Session->setFlash('La tarjeta no concuerda con la categoria', 'error');
                        $mensaje = "La tarjeta no concuerda con la categoria";
                    }
                } catch (Exception $exc) {
                    $error2 = $exc->getCode();
                    if ($error2 == '23000') {
//                        $this->Session->setFlash('Ya existe un usuario con ese documento', 'error');
                        $mensaje = "Ya existe un usuario con ese documento";
                    }
                }
            } else {
//                $this->Session->setFlash('Tarjeta no esta registrada en el sistema', 'Error');
                $mensaje = "Tarjeta no esta registrada en el sistema";
            }
        }
        $this->set(
                array(
                    "datos" => $mensaje,
                    "_serialize" => array("datos")
                )
        );
    }

    public function registrar() {

        //Listo los eventos
        $this->loadModel("Event");
        $events = $this->Event->find("list", array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            )
        ));
        $this->set('events', $events);
    }

    public function getPersonalDataByEvent() {
        $this->layout = "webservices";
        $eventId = $this->request->data("event_id");
        $this->loadModel('Forms');
        $form = $this->Forms->findByEventId($eventId);
        $this->loadModel('FormsPersonalDatum');
        $formPersonal = $this->FormsPersonalDatum->findAllByFormId($form["Forms"]["id"]);
        $this->set(
                array(
                    "datos" => $formPersonal,
                    "_serialize" => array("datos")
                )
        );
    }

    public function add3() {

        if ($this->request->is("POST")) {
            $data = $this->data;
            $this->loadModel('People');


            $datos = $this->request->data;
            $documento = $datos['user'];
            $evento = $datos['event'];
            $this->loadModel('Forms');
            $forms = $this->Forms->findAllByEventId($evento);

            if (!Empty($forms)) {
                foreach ($forms as $form) {
                    $form_id = $form['Forms']['event_id'];
                }
                $this->loadModel('FormsPersonalDatum');
                $queryDatos = "select * from datas  JOIN forms_personal_data on datas.forms_personal_datum_id=forms_personal_data.id JOIN personal_data on forms_personal_data.personal_datum_id=personal_data.id where datas.person_id=" . $person_id . "";
                $formPersonal = $this->FormsPersonalDatum->findAllByFormId($form_id);
            } else {
                $formPersonal = '';
            }

            //debug($formPersonal);

            $person_id = $this->People->find("list", array(
                "conditions" => array(
                    'People.pers_documento' => $documento),
                "fields" => array(
                    "People.id",
                )
            ));
            $this->loadModel('Datas');

            foreach ($person_id as $value) {

                $datos_person = $this->Datas->find("all", array(
                    "conditions" => array(
                        'Datas.person_id' => $value)));
            }
            //formPersonal->contiene el personalDatum con los campos a pintar
            //datos_person->contiene los datos que van a ir en cada campo.
            $this->set('form', $formPersonal);
            $this->set('documento', $documento);
            $this->set('datos_person', $datos_person);
        }
    }

}
