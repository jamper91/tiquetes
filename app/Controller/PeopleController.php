<?php

App::uses('AppController', 'Controller');

/**
 * People Controller
 *
 * @property Person $Person
 * @property PaginatorComponent $Paginator
 */
class PeopleController extends AppController {

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
        $this->Person->recursive = 0;
        $this->set('people', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Person->exists($id)) {
            throw new NotFoundException(__('Invalid person'));
        }
        $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
        $this->set('person', $this->Person->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('Categoria');
        $this->loadModel('Product');
//        debug($this->request->data);

        try {
            if ($this->request->is('post')) {
                $data = $this->request->data;
                $sql1 = "SELECT pers_id FROM people where pers_documento= " . $data['Person']['pers_documento'];
                $sql2 = "SELECT id FROM inputs WHERE entr_codigo= " . $data['input_codigo'];
                $sql3 = "SELECT id FROM inputs WHERE entr_identificador= " . $data['input_identificador'];
                $persona = $this->Data->query($sql1);
                $encod = $this->Data->query($sql2);
                $entIdent = $this->Data->query($sql3);
                if (!empty($persona)) {
                    if (!empty($encod)) {
                        if (!empty($entIdent)) {
                            $this->Person->create();
                            if ($this->Person->save($this->request->data)) {
                                $this->Session->setFlash(__('The person has been saved.'));
                                //return $this->redirect(array('action' => 'add'));
                            } else {
                                $this->Session->setFlash(__('The person could not be saved. Please, try again.'));
                            }
                            $person_id = $this->Person->getLastInsertId();
                            if (!empty($data['producto'])) {
                                foreach ($data['producto'] as $va) {
                                    $sql = "INSERT INTO people_products (product_id, person_id) VALUES (" . $va . ", " . $person_id . ");";
                                    $this->Data->query($sql);
                                }
                            }
                            try {
                                $identificador = $data['input_identificador'];
                                $codigo = $data['input_codigo'];
                                $sql = "INSERT INTO inputs (entr_codigo, entr_identificador) values (" . $codigo . ", " . $identificador . ");";
                                $this->Data->query($sql);
                            } catch (Exception $ex) {
                                $error2 = $ex->getCode();
                                if ($error2 == '23000') {
                                    $this->Session->setFlash('Error Codigo RFID ó Identificador de manilla ya estan registrados en la base de datos', 'error');
                                }
                            }
                        } else{
                            $this->Session->setFlash('Error Identificador de manilla ya  registrado en la base de datos', 'error');
                        }
                    }else{
                       $this->Session->setFlash('Error Codigo RFID  ya registrado en la base de datos', 'error'); 
                    }
                }else{
                  $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
                }
            }
            $this->Session->setFlash('Datos registrados correctamente', 'good');
        } catch (Exception $ex) {
            //debug($ex->getMessage());
            $error2 = $ex->getCode();
            if ($error2 == '23000') {
                $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
            }
        }

        $categorias = $this->Categoria->find('list', array(
            "fields" => array(
                "Categoria.id",
                "Categoria.descripcion"
        )));
        $products = $this->Product->find('list', array(
            "fields" => array(
                "Product.product_id",
                "Product.name"
        )));

        $bloodType = Array('O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'HH');
        $documentTypes = $this->Person->DocumentType->find('list');
        $cities = $this->Person->City->find('list');
        $committeesEvents = $this->Person->CommitteesEvent->find('list');
        $this->set(compact('documentTypes', 'cities', 'committeesEvents', 'bloodType', 'categorias', 'products'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Person->exists($id)) {
            throw new NotFoundException(__('Invalid person'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Person->save($this->request->data)) {
                $this->Session->setFlash(__('The person has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The person could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
            $this->request->data = $this->Person->find('first', $options);
        }
        $documentTypes = $this->Person->DocumentType->find('list');
        $cities = $this->Person->City->find('list');
        $committeesEvents = $this->Person->CommitteesEvent->find('list');
        $this->set(compact('documentTypes', 'cities', 'committeesEvents'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Person->id = $id;
        if (!$this->Person->exists()) {
            throw new NotFoundException(__('Invalid person'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Person->delete()) {
            $this->Session->setFlash(__('The person has been deleted.'));
        } else {
            $this->Session->setFlash(__('The person could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function buscar() {
        if ($this->request->is("POST")) {
            debug($this->request->data);
            //REcorro todos los campos para determinar cuales voy agregar a la consulta
            $conditions = "";
            foreach ($this->request->data as $dato) {
                while ($value = key($dato)) {

                    $value = current($dato);
                    if ($value != '') {


                        if (!is_int($value))
                            $value = " like '%" . $value . "%'";
                        else
                            $value = " =" . $value;
                        if ($conditions != "") {
                            $conditions.=' pr ' . key($dato) . $value;
                        } else {

                            $conditions.=' ' . key($dato) . $value;
                        }
                    }
                    next($dato);
                }
            }
            if ($conditions != '')
                $conditions = "select * from people where " . $conditions;

            $datos = $this->Person->query($conditions);
            $this->set("datos", $datos);
            debug($datos);
        }
    }

}
