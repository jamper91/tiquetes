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

        $this->Auth->allow('add', 'asociartarjeta', 'add2', 'buscador');

        parent:: beforeFilter();
        if ($this->Auth->user('role') == 'admin') {
            $this->Auth->allow('add', 'asociartarjeta', 'add2');
        } else {
            $this->Auth->allow();
        }
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
                $usuario = $this->User->getLastInsertId();
                $this->loadModel('Authorization');
                $newAutirizationsUser = $this->Authorization->create();
                $this->Authorization->save($this->request->data);
                debug($this->request->data("data[User][Autorization][]"));
                for ($i = 0; $i < sizeof($this->request->data("data[User][Autorization][]")); $i++)
                    $newAutirizationsUser = array(
                        'AutorizartionUser' => array(
                            $this
                        )
                    );
                return $this->redirect(array('action' => 'index'));
            } catch (Exception $ex) {
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
        if ($this->request->is('post')) {
            debug($this->Auth->login());
            if ($this->Auth->login()) {
                $this->Session->write('User.username', $this->request->data["User"]["username"]);
                $options = array(
                    'conditions' => array(
                        "User.username" => $this->request->data["User"]["username"]
                    ),
                    'fields' => array(
                        "User.id"
                    ),
                    'recursive' => -2
                );
                $this->Session->setFlash(__('Bienvenido ' . $this->request->data["User"]["username"]));
                $datos = $this->User->find('first', $options);
                $this->Session->write('User.id', $datos['User']['id']);
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
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

    public function add2() {
        $this->loadModel('Forms');
//$forms = $this->Forms->findAllByEventId('1');
        $forms = $this->Forms->find('list', array(
            "fields" => array(
                "id",
            )
        ));
//debug($forms);
//debug($formPersonal);


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

// $nuevo=substr(key($dato),1);
// debug($nuevo);

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
        }
        $this->set('form', $formPersonal);
    }

    public function buscador() {
        $this->loadModel('Forms');
        $forms = $this->Forms->find('list', array(
            "fields" => array(
                "id",
            )
        ));
        $this->loadModel('FormsPersonalDatum');
        $formPersonal = $this->FormsPersonalDatum->findAllByFormId($forms);

        if ($this->request->is('post')) {
            $data = $this->data;
            $this->loadModel('People');

            $datos = $this->request->data;

            // if(count($datos) == 1)
            // {
            //     $conditions = 
            // }
            $conditions = "";
            $conditions2 = "";


            foreach ($datos as $dato) {
                //debug(key($dato));

                while ($value = key($dato)) {

                    $value = current($dato);
                    if ($value != '') {

                        if (key($dato) != "documento") {

                            if (!is_int($value))
                                $value = "'" . $value . "'";
                            if ($conditions != "") {

                                $conditions.=" or " . 'forms_personal_data_id=' . key($dato);

                                $conditions.=" and " . 'descripcion=' . $value;
                            } else {

                                $conditions.=' forms_personal_data_id=' . key($dato);
                                $conditions.=' and descripcion=' . $value;
                            }
                        } else {
                            $conditions2.=' pers_documento=' . $value;
                        }
                    }
                    next($dato);
                }
            }
            if ($conditions != '')
                $conditions = "select * from datas where " . $conditions;


            if ($conditions2 != '')
                $conditions2 = "select * from people where " . $conditions2;


            $this->loadModel('Data');
            if ($conditions != '') {
                $datas = $this->Data->query($conditions);
                $datosVista = array();
                $datosVista2 = array();
                foreach ($datas as $data) {
                    $person_id = $data['datas']['person_id'];
                    $queryDatos = "select * from datas where person_id=" . $person_id;

                    $personas = $this->Data->query($queryDatos);
                    array_push($datosVista, $personas);
                    $queryPersona = "select * from people where id=" . $person_id;
                    $personas2 = $this->People->query($queryPersona);
                    array_push($datosVista2, $personas2);
                }
                $this->set('datosvista', $datosVista);
                $this->set('datosvista2', $datosVista2);
            }

            if ($conditions2 != '') {
                $people = $this->Data->query($conditions2);
                $datosVista = array();
                $datosVista2 = array();
                foreach ($people as $value) {
                    $person_id = $value['people']['id'];
                    $queryDatos = "select * from datas where person_id=" . $person_id;
                    //datos para ser enviados a la vista.
                    $personas = $this->Data->query($queryDatos);
                    array_push($datosVista, $personas);
                    $queryPersona = "select * from people where id=" . $person_id;
                    $personas2 = $this->People->query($queryPersona);
                    array_push($datosVista2, $personas2);
                }
                $this->set('datosvista', $datosVista);
                $this->set('datosvista2', $datosVista2);
                ;
            }
        }

        $this->set('form', $formPersonal);
    }

    public function registrar() {
        if ($this->request->is("POST")) {
            $this->loadModel('People');

            //Creo y almaceno a la persona
            $newPeole = $this->People->create();
            $this->People->save($this->request->data);
            $newPeopleId = $this->People->getLastInsertId();

//            Almaceno la informacion de la persona
            $this->loadModel('Data');
            $cont = 0;
            foreach ($this->request->data["Data"] as $value) {
                $this->request->data["Data"][$cont]["person_id"] = $newPeopleId;
                $cont++;
            }
            $this->Data->saveAll($this->request->data['Data']);


            //Agrego la entrada
            $this->request->data["Input"]["person_id"] = $newPeopleId;
            $this->request->data["Input"]["events_registration_type_id"] = $this->request->data["User"]["registration_type_id"];
            $this->loadModel("Input");
            $this->Input->save($this->request->data);
        }

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

}
