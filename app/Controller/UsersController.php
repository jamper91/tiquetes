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
        $this->Auth->allow('add');

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
        $this->loadModel('People');
        if ($this->request->is('post')) {

            $data = $this->data;

// this is for the case you want to insert into 2 tables at a same time
            $newPeole = $this->People->create();
            $newPeole = array(
                'People' => array(
                    'pers_primNombre' => $data['People']['pers_primNombre'],
                    'pers_primApellido' => $data['People']['pers_primApellido'],
//                    'document_type_id' => $data['User']['document_type_id'],
                    'city_id' => $data['User']['city_id'],
                    'pers_documento' => $data['People']['pers_documento'],
                    'pers_direccion' => $data['People']['pers_direccion'],
                    'pers_telefono' => $data['People']['pers_telefono'],
                    // 'pers_celular' => $data['People']['pers_celular'],
                    'pers_fechNacimiento' => $data['People']['pers_fechNacimiento'],
                    // 'pers_tipoSangre' => $data['People']['pers_tipoSangre'],
                    'pers_mail' => $data['People']['pers_mail']
                )
            );

            $consulta = "SELECT id FROM people WHERE pers_documento= " . $data['People']['pers_documento'];
            $respuesta = $this->People->query($consulta);
            if ($respuesta != array()) {
                $id = $respuesta[0]['people']['id'];
            }
            if ($respuesta === array()) {
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
//                        'validodesde' => $data['User']['validodesde']['year'] . '-' . $data['User']['validodesde']['month'] . '-' . $data['User']['validodesde']['day'],
//                        'validohasta' => $data['User']['validohasta']['year'] . '-' . $data['User']['validohasta']['month'] . '-' . $data['User']['validohasta']['day'],
                        'validodesde' => $data['validodesde'],
                        'validohasta' => $data['validohasta'],
                        'identificador' => $data['User']['Identificador']
                    )
                );
                $this->User->save($newUser);
                $this->Session->setFlash('Usuario registrado con exito', 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $nombre = $data['People']['pers_primNombre'];
                $apellido = $data['People']['pers_primApellido'];
                $documento = $data['People']['pers_documento'];
                $direccion = $data['People']['pers_direccion'];
                $telefono = $data['People']['pers_telefono'];
                $fech = $data['People']['pers_fechNacimiento'];
                $mail = $data['People']['pers_mail'];
                $city = $data['User']['city_id'];
                $sql = "UPDATE `people` SET `city_id`=$city, `pers_primNombre`='$nombre',`pers_primApellido`='$apellido',`pers_direccion`='$direccion',`pers_telefono`=$telefono,`pers_mail`='$mail' WHERE `pers_documento` ='$documento'";
                $this->People->query($sql);
                $newUser = $this->User->create();

                $newUser = array(
                    'User' => array(
                        'person_id' => $id,
                        'username' => $data['User']['username'],
                        'password' => $data['User']['password'],
                        'estado' => 1,
                        'type_user_id' => $data['User']['type_user_id'],
                        'department_id' => $data['User']['department_id'],
//                        'validodesde' => $data['User']['validodesde']['year'] . '-' . $data['User']['validodesde']['month'] . '-' . $data['User']['validodesde']['day'],
//                        'validohasta' => $data['User']['validohasta']['year'] . '-' . $data['User']['validohasta']['month'] . '-' . $data['User']['validohasta']['day'],
                        'validodesde' => $data['validodesde'],
                        'validohasta' => $data['validohasta'],
                        'identificador' => $data['User']['Identificador']
                    )
                );
                $this->User->save($newUser);
                $this->Session->setFlash('Usuario registrado con exito', 'good');
                return $this->redirect(array('action' => 'index'));
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
            $fechainicio = $this->request->data['User']['uservalidodesde'];
            $fechafinal = $this->request->data['User']['uservalidohasta'];
            $this->request->data['User']['validodesde'] = $fechainicio;
            $this->request->data['User']['validohasta'] = $fechafinal;

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

        // $authorizations = $this->User->Authorization->find('list', array(
        //     "fields" => array(
        //         "Autorization.nombre"
        // )));
        $this->set(compact('people', 'typeUsers', 'departments' /* , 'authorizations' */));
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

        $mensaje = "";
        $this->layout = "webservice";
        if ($this->request->is("POST")) {

            //Primero determino si la tarjeta esta registrada en el sistema
            $this->loadModel("Input");
            $input = $this->Input->find('first', array(
                "conditions" => array(
                    "Input.entr_codigo" => $this->request->data("codigo")
                ),
                "recursive" => -1
            ));
            if ($input) {
                try {
                    $this->Input->id = $input["Input"]["id"];
                    $this->Input->set('person_id', $this->request->data("person_id"));
                    $this->Input->save();


                    $mensaje = "Proceso realizado con exito!!";
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
//        $event_id = $this->request->query["event_id"];
        $event_id = 1;
        //debug($event_id);


        $this->loadModel('Forms');

        $forms = $this->Forms->findAllByEventId($event_id);
        //debug(!Empty($forms));
        if (!Empty($forms)) {
            foreach ($forms as $form) {
                $form_id = $form['Forms']['id'];
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
                                'forms_personal_datum_id' => key($dato),
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

        if ($this->request->is('post')) {
            $data = $this->data;
            $this->loadModel('People');
            $this->loadModel('Input');

            $datos = $this->request->data;
            $pers_id = $this->Session->read('User.id');
            $this->loadModel('Event');
            $autorizado = $this->Event->find("list", array(
                "fields" => array(
                    "Event.id"
            )));

            foreach ($autorizado as $auth) {
                $event_id = $auth;
            }

            $conditions = "";
            $conditions2 = "";
            $conditions3 = "";

            foreach ($datos as $dato) {
                while ($value = key($dato)) {
                    $value = current($dato);
                    if ($value != '') {

                        if (key($dato) != "documento" and key($dato) != "cm") {

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
                        } elseif (key($dato) == "documento") {
                            $conditions2.=' pers_documento =' . $value;
                        } elseif (key($dato) == "cm") {
                            $conditions3.='entr_identificador =' . $value;
                        }
                    }
                    next($dato);
                }
            }

            if ($conditions != '')
                $conditions = "select * from datas d, forms_personal_data fp where " . $conditions;


            if ($conditions2 != '')
                $conditions2 = "select * from people where " . $conditions2;


            if ($conditions3 != '')
                $conditions3 = "select * from inputs where " . $conditions3;

            $this->loadModel('Data');

            if ($conditions != '') {
                $datas = $this->Data->query($conditions);
                $datosVista = array();
                $datosVista2 = array();
                $datosVista3 = array();
                foreach ($datas as $data) {
                    $person_id = $data['d']['person_id'];
                    $queryDatos = "select * from datas  JOIN forms_personal_data on datas.forms_personal_datum_id=forms_personal_data.id JOIN personal_data on forms_personal_data.personal_datum_id=personal_data.id where datas.person_id=" . $person_id . "";

                    $personas = $this->Data->query($queryDatos);
                    array_push($datosVista, $personas);
                    $queryPersona = "select * from people where id=" . $person_id;
                    $personas2 = $this->People->query($queryPersona);
                    array_push($datosVista2, $personas2);
                    $queryEntrada = "select * from inputs where person_id=" . $person_id;
                    $entrada = $this->Input->query($queryEntrada);
                    array_push($datosVista3, $entrada);
                }

                $this->set('datosvista', $datosVista);
                $this->set('datosvista2', $datosVista2);
                $this->set('datosvista3', $datosVista3);
                $this->set('event_id', $event_id);
            }

            if ($conditions2 != '') {
                $people = $this->Data->query($conditions2);
                $datosVista = array();
                $datosVista2 = array();
                $datosVista3 = array();
                foreach ($people as $value) {
                    $person_id = $value['people']['id'];
                    $queryDatos = "select * from datas  JOIN forms_personal_data on datas.forms_personal_datum_id=forms_personal_data.id JOIN personal_data on forms_personal_data.personal_datum_id=personal_data.id where datas.person_id=" . $person_id . "";
                    //datos para ser enviados a la vista.
                    $personas = $this->Data->query($queryDatos);
                    array_push($datosVista, $personas);
                    $queryPersona = "select * from people where id=" . $person_id;
                    $personas2 = $this->People->query($queryPersona);
                    array_push($datosVista2, $personas2);
                    $queryEntrada = "select * from inputs where person_id=" . $person_id;
                    $entrada = $this->Input->query($queryEntrada);
                    array_push($datosVista3, $entrada);
                }

                $this->set('datosvista', $datosVista);
                $this->set('datosvista2', $datosVista2);
                $this->set('datosvista3', $datosVista3);
                $this->set('event_id', $event_id);
            }

            if ($conditions3 != '') {

                $people = $this->Input->query($conditions3);

                $datosVista = array();
                $datosVista2 = array();
                $datosVista3 = array();

                foreach ($people as $value) {


                    $person_id = $value['inputs']['person_id'];
                    $queryDatos = "select * from datas JOIN forms_personal_data on datas.forms_personal_datum_id=forms_personal_data.id JOIN personal_data on forms_personal_data.personal_datum_id=personal_data.id where datas.person_id=" . $person_id . "";

                    $personas = $this->Data->query($queryDatos);

                    array_push($datosVista, $personas);
                    $queryPersona = "select * from people where id=" . $person_id;
                    $personas2 = $this->People->query($queryPersona);
                    array_push($datosVista2, $personas2);

                    $queryEntrada = "select * from inputs where person_id=" . $person_id;
                    $entrada = $this->Input->query($queryEntrada);
                    array_push($datosVista3, $entrada);
                }
                $this->set('datosvista', $datosVista);
                $this->set('datosvista2', $datosVista2);
                $this->set('datosvista3', $datosVista3);
                $this->set('event_id', $event_id);
            }
        }


        $this->set('form', $formPersonal);
    }

    public function registrar() {
//         if ($this->request->is("POST")) {
//             //Primero determino si la tarjeta esta registrada en el sistema
//             $this->loadModel("Input");
//             $input = $this->Input->find('first', array(
//                 "conditions" => array(
//                     "Input.entr_codigo" => $this->request->data["Input"]["entr_codigo"]
//                 )
//             ));
//             if (!$input) {
//                 $newInput = $this->Input->create();
//                 $newInput = array(
//                     'Input' => array(
//                         'entr_identificador' => $data['Input']['entr_identificador'],
//                         'entr_codigo' => $data['Input']['entr_codigo'],
//                         'categoria_id' => 2,
//                     )
//                 );
//                 try {
//                     $this->Input->save($newInput);
//                     $newInputId = $this->Input->getLastInsertId();
// //                    //Agrego la entrada
// //                    if ($input['Input']["categoria_id"] == $this->request->data['User']['registration_type_id']) {
//                         $this->loadModel('People');
//                         //Creo y almaceno a la persona
//                         $newPeole = $this->People->create();
//                         $this->People->save($this->request->data);
//                         $newPeopleId = $this->People->getLastInsertId();
//                         //Almaceno la informacion de la persona
//                         $this->loadModel('Data');
//                         $cont = 0;
//                         foreach ($this->request->data["Data"] as $value) {
//                             $this->request->data["Data"][$cont]["person_id"] = $newPeopleId;
//                             $cont++;
//                         }
//                         $this->Data->saveAll($this->request->data['Data']);
//                         $this->request->data["Input"]["id"] = $newInputId;
//                         $this->request->data["Input"]["person_id"] = $newPeopleId;
// //                    $this->request->data["Input"]["events_registration_type_id"] = $this->request->data["User"]["registration_type_id"];
//                         $this->loadModel("Input");
// //                    debug($this->request->data["Input"]);
//                         $this->Input->save($this->request->data);
//                         $this->Session->setFlash('Registro realizado con exito', 'good');
//                     } else {
//                         $this->Session->setFlash('La tarjeta no concuerda con la categoria', 'error');
//                     }
// //                        $this->Session->setFlash('Registro realizado con exito', 'good');
//                         $mensaje = "Registro realizado con exito";
// //                    } else {
// ////                        $this->Session->setFlash('La tarjeta no concuerda con la categoria', 'error');
// //                        $mensaje = "La tarjeta no concuerda con la categoria";
// //                    }
//                 } catch (Exception $exc) {
//                     $error2 = $exc->getCode();
//                     if ($error2 == '23000') {
//                         $this->Session->setFlash('Ya existe un usuario con ese documento', 'error');
//                     }
//                 }
//             } else {
// //                $this->Session->setFlash('Tarjeta no esta registrada en el sistema', 'Error');
//                 $mensaje = "Tarjeta ya esta registrada";
//             }
//         }
        //Listo los eventos
        $this->loadModel("DocumentType");
        $DocumentType = $this->DocumentType->find("list", array(
            "fields" => array(
                "DocumentType.id",
                "DocumentType.tido_descripcion"
            )
        ));
//       debug($DocumentType); die;
        $fecha = date("Y-m-d");
        $this->loadModel("Event");
        $events = $this->Event->find("list", array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "conditions" => array(
                "Event.even_fechFinal >= " => $fecha
            )
        ));
        $this->set(compact('events', $events, 'DocumentType', $DocumentType));
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
            $input = $datos['input'];

            $this->loadModel('Input');
            $codigos = $this->Input->find("list", array(
                "conditions" => array(
                    'entr_identificador' => $input),
                "fields" => array(
                    "Input.entr_codigo")));

            $this->loadModel('Forms');
            $forms = $this->Forms->findAllByEventId($evento);
            $person_id = $this->People->find("list", array(
                "conditions" => array(
                    'People.pers_documento' => $documento),
                "fields" => array(
                    "People.id",
                )
            ));
            $this->loadModel('Datas');
            $this->loadModel('FormsPersonalDatum');

            foreach ($person_id as $value) {
                $queryDatos = "select * from datas JOIN forms_personal_data on datas.forms_personal_datum_id=forms_personal_data.id JOIN personal_data on forms_personal_data.personal_datum_id=personal_data.id where datas.person_id=" . $value . "";

                $datos_person = $this->Datas->query($queryDatos);
            }

            $this->set('codigos', $codigos);
            $this->set('identificador', $input);
            $this->set('form', $datos_person);
            $this->set('documento', $documento);
            $this->set('person_id', $person_id);
        }
    }

    public function generarCodigo() {
        $caracteres = "0123456789"; //posibles caracteres a usar
        $numerodeletras = 12; //numero de letras para generar el texto
        $cadena = ""; //variable para almacenar la cadena generada
        $while = TRUE;
        while ($while) {
            for ($i = 0; $i < $numerodeletras; $i++) {
                $cadena = $cadena . substr($caracteres, rand(0, strlen($caracteres)), 1); /* Extraemos 1 caracter de los caracteres
                  entre el rango 0 a Numero de letras que tiene la cadena */
            }
            $ejemplo = strlen($cadena);
            $if = TRUE;
            while ($if) {
                if ($ejemplo < 12) {
                    $numerodado = rand(0, 9);
                    $cadena = $cadena . $numerodado;
                    $ejemplo = strlen($cadena);
//                        debug($numerodado);
                } else {
                    $if = FALSE;
                }
            }
            $ejemplo = strlen($cadena);
            $sql = "SELECT id FROM inputs WHERE entr_codigo = $cadena";
            $id = $this->Input->query($sql);
//                                debug ($id);
            if ($id == array()) {
                $while = FALSE;
            }
        }
        return $cadena;
        $eve = 3;
    }

    public function generarpdf() {
        
    }

    public function obtenerCodigoBarra($documento) {
        $this->loadModel("Input");
        $this->loadModel("Person");
        $doc = $documento;
        $sql = "SELECT id, pers_primNombre, Pers_primApellido, pers_institucion, ciudad FROM people WHERE pers_documento = '$doc'";
        $eve = 3;
        $res = $this->Person->query($sql);
        if ($res != array()) {
            $id = $res[0]['people']['id'];
            $nom = $res[0]['people']['pers_primNombre'];
            $ape = $res[0]['people']['Pers_primApellido'];
            $emp = $res[0]['people']['pers_institucion'];
            $ciu = $res[0]['people']['ciudad'];
            $sql2 = "SELECT entr_codigo FROM inputs WHERE person_id = $id and event_id = $eve";
            $res2 = $this->Input->query($sql2);
            if ($res2 != array()) {
                $codigo = "-1";
            } else {
                $codigo = $this->generarCodigo();
            }
        } else {
            $codigo = $this->generarCodigo();
        }
        return $codigo;
    }

    public function registrar2() {
        $mensaje = "";
        $this->layout = "webservice";
        $this->loadModel("Input");
        if ($this->request->is("POST")) {


            //Determino si se va a ingresar por RFDI o pdf
            $tipoE = $this->request->data["User"]["tipoE"];
            $entr_codigo = "";
            if ($tipoE == "RFDI") {
                $entr_codigo = $this->request->data['Input']['entr_codigo'];
            } else {
                $entr_codigo = $this->obtenerCodigoBarra($this->request->data['People']['pers_documento']);
            }
            //Si obtenerCodigoBarra me retorna -2, es porque el usuario ya tiene una entrada, en ese caso
            //hago un update de datos
            if ($entr_codigo == -2)
                $this->request->data["Informacion"]["actualizar"] = 1;
            //determino si el formulario se envia es para actualizar
            if ($this->request->data["Informacion"]["actualizar"] == 0) {

                //Primero determino si la tarjeta esta registrada en el sistema
                $this->loadModel("Input");
                $input = $this->Input->find('first', array(
                    "conditions" => array(
                        "Input.entr_codigo" => $entr_codigo
                    )
                ));
                if (!$input) {



                    $newInput = $this->Input->create();
                    if ($tipoE == "RFDI") {
                        $newInput = array(
                            'Input' => array(
                                'entr_identificador' => $this->request->data['Input']['entr_identificador'],
                                'entr_codigo' => $entr_codigo,
                                'categoria_id' => 2,
                            )
                        );
                    } else {
                        $newInput = array(
                            'Input' => array(
                                'entr_codigo' => $entr_codigo,
                                'categoria_id' => 2,
                            )
                        );
                    }


                    try {
                        $this->Input->save($newInput);
                        $newInputId = $this->Input->getLastInsertId();



//                    //Agrego la entrada
//                    if ($input['Input']["categoria_id"] == $this->request->data['User']['registration_type_id']) {
                        try {
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
                            $this->request->data["Input"]["id"] = $newInputId;

                            $this->request->data["Input"]["person_id"] = $newPeopleId;
                            $this->loadModel("Input");
                            $this->Input->clear();
                            $this->Input->id = $newInputId;
                            $this->Input->set("person_id", $newPeopleId);
                            $this->Input->set("event_id", $this->request->data["User"]["event_id"]);
                            $this->Input->save();
                            if ($tipoE == "RFDI") {
                                $mensaje = array(
                                    "codigo" => 0,
                                    "mensaje" => "Registro realizado con exito",
                                    "person_id" => $newPeopleId,
                                    "input_id" => $newInputId,
                                    "event_id" => $this->request->data["User"]["event_id"]
                                );
                            } else {
                                $mensaje = array(
                                    "codigo" => 2,
                                    "mensaje" => "Registro realizado con exito",
                                    "person_id" => $newPeopleId,
                                    "input_id" => $newInputId,
                                    "person_document" => $this->request->data['People']["pers_documento"],
                                    "event_id" => $this->request->data["User"]["event_id"]
                                );
                            }
                        } catch (Exception $exc) {
                            $error2 = $exc->getCode();
                            $mensaje2 = $exc->getMessage();
                            if ($error2 == '23000') {
                                $mensaje = array(
                                    "codigo" => 23000,
                                    "mensaje" => "Documento ya esta registrado"
                                );
                            } else {
                                $mensaje = array(
                                    "codigo" => $error2,
                                    "mensaje" => $mensaje2
                                );
                            }
                        }

                        //comienzo con el log
                        $this->loadModel("Log");
                        $user_id = $this->Session->read("User.id");
                        $input_id = $newInputId;
                        $operacion = "VENTA";
                        $sql = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
//                        $operation = $this->Data->query($sql);
//                        
                        //termino el log
                    } catch (Exception $exc) {
                        $error2 = $exc->getCode();
                        $mensaje2 = $exc->getMessage();
                        if ($error2 == '23000') {
                            $mensaje = array(
                                "codigo" => 23000,
                                "mensaje" => "Codigo Manilla y/o Identificador de la manilla ya esta registrada*"
                            );
                        } else {
                            $mensaje = array(
                                "codigo" => $error2,
                                "mensaje" => $mensaje2
                            );
                        }
                    }
                } else {
//                $this->Session->setFlash('Tarjeta no esta registrada en el sistema', 'Error');
//                $mensaje = "Tarjeta ya esta registrada";
                    $mensaje = array(
                        "codigo" => -1,
                        "mensaje" => "Tarjeta ya esta registrada"
                    );
                }
            } else {
                //Primero determino si la tarjeta esta registrada en el sistema

                if (true) {
                    //Si se llega aqui por que se quiere ingresar por codigo de barras, esto no se hace
                    if (!$tipoE == "RFDI") {
                        $this->loadModel("Input");
                        $this->Input->id = $this->request->data["Informacion"]["input_id"];
                        if ($this->Input->id != 0) {
                            $this->Input->set('entr_codigo', $this->request->data['Input']['entr_codigo']);
                            $this->Input->set('entr_identificador', $this->request->data['Input']['entr_identificador']);
                            $this->Input->save();
                            $newInputId = $this->request->data["Informacion"]["input_id"];
                        } else {
                            $newInput = $this->Input->create();
                            $newInput = array(
                                'Input' => array(
                                    'entr_identificador' => $this->request->data['Input']['entr_identificador'],
                                    'entr_codigo' => $this->request->data['Input']['entr_codigo'],
                                    'categoria_id' => 2,
                                )
                            );
                            $this->Input->save($newInput);
                            $newInputId = $this->Input->getLastInsertId();
                        }
                    }



                    try {


                        $this->loadModel('People');

                        //Actualizo a la persona
                        if ($this->request->data["Informacion"]["person_id"] != 0)
                            $this->People->id = $this->request->data["Informacion"]["person_id"];
                        else
                            $this->People->id = $this->request->data["Person"]["pers_id"];
                        $this->People->set('pers_documento', $this->request->data['People']['pers_documento']);
                        $this->People->set('pers_primNombre', $this->request->data['People']['pers_primNombre']);
                        $this->People->set('pers_primApellido', $this->request->data['People']['pers_primApellido']);
                        $this->People->set('pers_direccion', $this->request->data['People']['pers_direccion']);
                        $this->People->set('pers_telefono', $this->request->data['People']['pers_telefono']);
                        $this->People->set('pers_mail', $this->request->data['People']['pers_mail']);
                        $this->People->save();
                        $newPeopleId = $this->People->id;

                        //Almaceno la informacion de la persona
                        $this->loadModel('Data');
                        $cont = 0;
                        foreach ($this->request->data["Data"] as $value) {
                            $this->request->data["Data"][$cont]["person_id"] = $newPeopleId;
                            $cont++;
                        }
                        $this->Data->saveAll($this->request->data['Data']);
                        $mensaje = array(
                            "codigo" => 0,
                            "mensaje" => "Actualizacion realizada con exito",
                            "person_id" => $newPeopleId,
                            "input_id" => $newInputId
                        );
                        //comienzo con el log
                        $this->loadModel("Log");
                        $user_id = $this->Session->read("User.id");
                        $input_id = $newInputId;
                        $operacion = "ACTUALIZACION";
                        $sql = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
//                        $operation = $this->Data->query($sql);
                        //termino el log
//                    } else {
////                        $this->Session->setFlash('La tarjeta no concuerda con la categoria', 'error');
//                        $mensaje = "La tarjeta no concuerda con la categoria";
//                    }
                    } catch (Exception $exc) {
                        $error2 = $exc->getCode();
                        $mensaje2 = $exc->getMessage();
                        if ($error2 == '23000') {
//                        $this->Session->setFlash('Ya existe un usuario con ese documento', 'error');
//                        $mensaje = "Ya existe un usuario con ese documento";
                        }
                        $mensaje = array(
                            "codigo" => 23000,
                            "mensaje" => $mensaje2
                        );
                    }
                } else {
//                $this->Session->setFlash('Tarjeta no esta registrada en el sistema', 'Error');
//                $mensaje = "Tarjeta ya esta registrada";
                    $mensaje = array(
                        "codigo" => -1,
                        "mensaje" => "Tarjeta ya esta registrada"
                    );
                }
            }
        }
        $this->set(
                array(
                    "datos" => $mensaje,
                    "_serialize" => array("datos")
                )
        );
    }

    public function edit2() {
        if ($this->request->is("POST")) {
            $data = $this->data;
            $datos = $this->request->data;
            $this->loadModel("Data");
            $this->loadModel("People");
            $this->loadModel("Input");
            foreach ($datos as $dato) {

                while ($value = key($dato)) {

                    $value = current($dato);
                    if ($value != '') {

                        if (key($dato) != "documento" and key($dato) != "cm" and key($dato) != "codigoNuevo" and key($dato) != "codigo" and key($dato) != "identificadorNuevo" and key($dato) != "identificador") {

                            $conditions = "select * from datas where id=" . key($dato);
                            $datas = $this->Data->query($conditions);

                            foreach ($datas as $data2) {
                                if ($data2["datas"]["id"] == key($dato)) {
                                    $this->Data->findAllById($data2["datas"]["id"]);
                                    $updateData = array(
                                        'Data' => array(
                                            'id' => $data2["datas"]["id"],
                                            'descripcion' => $datos["PersonalDatum"][key($dato)]));

                                    $this->Data->save($updateData);
                                }
                            }
                        } elseif (key($dato) == "documento") {
                            $personas = $datos["PersonalDatum"]["documento"];

                            $conditions = "select * from people where id=" . key($personas);
                            $peoples = $this->People->query($conditions);

                            foreach ($peoples as $people) {

                                if ($people["people"]["id"] == key($personas)) {
                                    $updatePeople = array(
                                        'People' => array(
                                            'id' => $people["people"]["id"],
                                            'pers_documento' => $datos["PersonalDatum"]["documento"][key($personas)]));

                                    $this->People->save($updatePeople);
                                }
                            }
                        } elseif (key($dato) == "codigo") {
                            $codigos = $datos["PersonalDatum"]["codigo"];
                            $identificadores = $datos["PersonalDatum"]["identificador"];

                            foreach ($codigos as $codigo) {
                                $conditions = "select * from inputs where entr_codigo=" . key($codigos);
                                $inputs = $this->Input->query($conditions);

                                foreach ($identificadores as $identificador) {
                                    $entr_identificador = $identificador;

                                    $updateInput = array(
                                        'Input' => array(
                                            'id' => $inputs[0]["inputs"]["id"],
                                            'entr_codigo' => $codigo,
                                            'entr_identificador' => $entr_identificador,
                                    ));

                                    $this->Input->save($updateInput);
                                    //comienzo con el log
                                    $this->loadModel("Log");
                                    $user_id = $this->Session->read("User.id");
                                    $input_id = $inputs[0]["inputs"]["id"];
                                    $operacion = "ACTUALIZACION";
                                    $sql = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
                                    $operation = $this->Data->query($sql);
                                    //termino el log
                                }
                            }
                        } elseif (key($dato) == "codigoNuevo") {
                            //codigoNuevo tiene el entr_codigo que quiero guardar en input
                            $codigoNuevo = $datos["PersonalDatum"]["codigoNuevo"];
                            //identificadorNuevo tiene el entr_identificador que quiero guardar en input
                            $identificadorNuevo = $datos["PersonalDatum"]["identificadorNuevo"];
                            $personas = $datos["PersonalDatum"]["documento"];
                            $conditions = "select * from people where id=" . key($personas);
                            $peoples = $this->People->query($conditions);

                            foreach ($peoples as $people) {
                                $newInput = $this->Input->create();
                                $newInput = array(
                                    'Input' => array(
                                        'person_id' => $people["people"]["id"],
                                        'entr_identificador' => $identificadorNuevo,
                                        'entr_codigo' => $codigoNuevo
                                    )
                                );
                                $this->Input->save($newInput);
                                $newInputId->
                                //comienzo con el log
                                $this->loadModel("Log");
                                $user_id = $this->Session->read("User.id");
                                $input_id = $this->Input->getLastInsertId();
                                ;
                                $operacion = "VENTA";
                                $sql = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
                                $operation = $this->Data->query($sql);
                                //termino el log
                            }
                        }
                    }
                    next($dato);
                }
            }
            return $this->redirect(array('action' => 'buscador'));
        }
    }

    public function buscador2() {

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

}
