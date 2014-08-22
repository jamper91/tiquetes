<?php

App::uses('AppController', 'Controller');

/**
 * Companies Controller
 *
 * @property Company $Company
 * @property PaginatorComponent $Paginator
 */
class CompaniesController extends AppController {

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
        $this->Company->recursive = 0;
        $this->set('companies', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Company->exists($id)) {
            throw new NotFoundException(__('Invalid company'));
        }
        $options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
        $this->set('company', $this->Company->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel("People");
        if ($this->request->is('post')) {
            $data = $this->data;
            $documento = $data['Company']['pers_documento'];
            $newPeole = $this->People->create();
            $newPeole = array(
                'People' => array(
                    'pers_primNombre' => $data['Company']['pers_primNombre'],
                    'pers_primApellido' => $data['Company']['pers_primApellido'],
//                    'document_type_id' => $data['User']['document_type_id'],
                    //'city_id' => $data['User']['city_id'],
                    'pers_documento' => $data['Company']['pers_documento'],
                    'pers_direccion' => $data['Company']['pers_direccion'],
                    'pers_telefono' => $data['Company']['pers_telefono'],
                    // 'pers_celular' => $data['People']['pers_celular'],
                    'pers_fechNacimiento' => $data['Company']['pers_fechNacimiento'],
                    // 'pers_tipoSangre' => $data['People']['pers_tipoSangre'],
                    'pers_mail' => $data['Company']['pers_mail']
                )
            );
            $this->Company->create();
            if ($this->Company->save($this->request->data)) {
                $this->Session->setFlash(__('The company has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The company could not be saved. Please, try again.'));
            }
        }
        $people = $this->Company->Person->find('list');
        $cities = $this->Company->City->find('list');
        $events = $this->Company->Event->find('list');
        $this->loadModel("Country");
        $countries = $this->Country->find('list');
        $this->set(compact('people', 'cities', 'events', 'countries'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Company->exists($id)) {
            throw new NotFoundException(__('Invalid company'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Company->save($this->request->data)) {
                $this->Session->setFlash(__('The company has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The company could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
            $this->request->data = $this->Company->find('first', $options);
        }
        $people = $this->Company->Person->find('list');
        $cities = $this->Company->City->find('list');
        $events = $this->Company->Event->find('list');
        $this->set(compact('people', 'cities', 'events'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Company->id = $id;
        if (!$this->Company->exists()) {
            throw new NotFoundException(__('Invalid company'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Company->delete()) {
            $this->Session->setFlash(__('The company has been deleted.'));
        } else {
            $this->Session->setFlash(__('The company could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function search() {
        $this->loadModel("Person");
        $this->layout = "webservices";
        $documento = $this->request->data["documento"]; //State
        $sql = "SELECT p.pers_primNombre, p.pers_prim_apellido, p.city_id, p.pers_direccion, p.pers_telefono  FROM people p WHERE p.pers_documento = " . $documento;
        $options = array(
            "conditions" => array(
                "Person.pers_documento" => $documento
            ),
            "fields" => array(
                "Person.pers_primNombre",
                "Person.pers_primApellido",
                "Person.city_id",
                "Person.pers_direccion",
                "Person.pers_telefono"
            ),
            "recursive" => 0
        );
        $datos = $this->Person->find("all", $options);
//        debug($datos);
        $log = $this->Person->getDataSource()->getLog(false, false);
        //debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

}
