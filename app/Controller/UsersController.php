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
    public $components = array('Paginator', 'Auth', 'Session');

    public function beforeFilter() {
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
            $this->People->save($newPeole);
            $newPeopleId = $this->People->getLastInsertId();
//debug($newPeopleId);
            /**
             * or if you already have Game Id, and Developer Id, then just load it on, and 
             * put it in the statement below, to create a new Assignment
             * */
            $newUser = $this->User->create();
            $newUser = array(
                'User' => array(
                    'person_id' => $newPeopleId,
                    'username' => $data['User']['username'],
                    'password' => $data['User']['password'],
                    'estado'=> 1,
                    'type_user_id' => $data['User']['type_user_id'],
                    'department_id' => $data['User']['department_id'],
                    'validodesde' => $data['User']['validodesde']['month'].'-'.$data['User']['validodesde']['day'].'-'.$data['User']['validodesde']['year'],
                    'validohasta' => $data['User']['validohasta']['month'].'-'.$data['User']['validohasta']['day'].'-'.$data['User']['validohasta']['year'],
                    'identificador'=> $data['User']['Identificador']
                )
            );
            $this->User->save($newUser);
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
        $authorizations = $this->User->Authorization->find('list');
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
        $people = $this->User->Person->find('list');
        $typeUsers = $this->User->TypeUser->find('list');
        $states = $this->User->State->find('list');
        $authorizations = $this->User->Authorization->find('list');
        $this->set(compact('people', 'typeUsers', 'states', 'authorizations'));
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
        $this->loadModel('FormsPersonalDatum');
        $formPersonal = $this->FormsPersonalDatum->findAllByFormId($forms);
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

}
