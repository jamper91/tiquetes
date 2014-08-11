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
    public $components = array('Paginator', 'Auth', 'Session', 'RequestHandler');

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
        $this->loadModel('Input');
        $this->loadModel('Person');
        $this->loadModel('PeopleProduct');
        $this->loadModel('Data');
//        debug($this->request->data);
        //try {
        if ($this->request->is('POST')) {
            $data = $this->request->data;

            $person_id = $this->Person->find("list", array(
                "conditions" => array(
                    'Person.pers_documento' => $data['Person']['pers_documento']),
                "fields" => array(
                    "Person.id",
                )
            ));
            $entr_codigo = $this->Input->find("list", array(
                "conditions" => array(
                    'Input.entr_codigo' => $data['input_codigo']),
                "fields" => array(
                    "Input.id",
                )
            ));
            $entr_identificador = $this->Input->find("list", array(
                "conditions" => array(
                    'Input.entr_codigo' => $data['input_identificador']),
                "fields" => array(
                    "Input.id",
                )
            ));
//                var_dump($person_id); die();
//            debug($entr_codigo);
//            debug($entr_identificador);
//                




            if (($person_id == array())) { //echo "aqui"; die();
                if (($entr_codigo == array())) {
                    if (($entr_identificador == array())) {
                        $this->loadModel("Person");
                        $this->Person->create();

                        if ($this->Person->saveAll($this->request->data)) {
                            $this->Session->setFlash('Persona insertada correctamente.', 'good');

                            $categoria = $this->Categoria->find('list', array(
                                "conditions" => array(
                                    "Categoria.id" => $data['Person']['categoria_id']),
                                "fields" => array(
                                    "Categoria.id",
                                    "Categoria.descripcion"
                            )));

                            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                            $this->layout = 'pdf'; //this will use the pdf.ctp layout
                            $informacion = array('documento' => $data['Person']['pers_documento'], 'nombre' => $data['Person']['pers_primNombre'], 'apellido' => $data['Person']['pers_primApellido'], 'categoria' => $categoria, 'empresa' => $data['Person']['pers_empresa']);
                            $this->set('fpdf', new FPDF('P', 'mm', array('70', '150')));
                            //debug($informacion);
                            $this->set('data', $informacion);

                            $this->render('pdf');
//                            return $this->redirect(array('action' => 'add'));
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
                            $sql = "INSERT INTO inputs (person_id, entr_codigo, entr_identificador, categoria_id) values (" . $person_id . ", " . $codigo . ", " . $identificador . "," . $data['Person']['categoria_id'] . ");";
                            $this->Data->query($sql);
                        } catch (Exception $ex) {
                            $error2 = $ex->getCode();
                            if ($error2 == '23000') {
                                $this->Session->setFlash('Error Codigo RFID ó Identificador de manilla ya estan registrados en la base de datos', 'error');
                            }
                        }
                    } else {
                        $this->Session->setFlash('Error Identificador de manilla ya  registrado en la base de datos', 'error');
                    }
                } else {
                    $this->Session->setFlash('Error Codigo RFID  ya registrado en la base de datos', 'error');
                }
            } else {
                $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
            }
            //$this->Session->setFlash('Datos registrados correctamente', 'good');
            //debug($categoria);
        }
        /* } catch (Exception $ex) {
          //debug($ex->getMessage());
          $error2 = $ex->getCode();
          if ($error2 == '23000') {
          $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
          }
          } */

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

//        $bloodType = Array('O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'HH');
        $documentTypes = $this->Person->DocumentType->find('list');
        $cities = $this->Person->City->find('list');
        $committeesEvents = $this->Person->CommitteesEvent->find('list');
        $this->set(compact('documentTypes', 'cities', 'committeesEvents', /* 'bloodType', */ 'categorias', 'products'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $data = $this->request->data;
        if (!$this->Person->exists($id)) {
            throw new NotFoundException(__('Invalid person'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Person->id = $id;
            if ($this->Person->save($this->request->data)) {

                //  echo "<pre>"; var_dump($data); echo "</pre>"; 

                $sql = "DELETE FROM people_products WHERE person_id=" . $id . "";
                $this->Person->query($sql);
                if (!empty($data['producto'])) {
                    foreach ($data['producto'] as $va) {
                        $sql = "INSERT INTO people_products (product_id, person_id) VALUES (" . $va . ", " . $id . ");";
                        $this->Person->query($sql);
                    }
                }
                $identificador = $data['input_identificador'];
                $codigo = $data['input_codigo'];

                $sql = "UPDATE inputs  SET  entr_codigo=" . $codigo . ", entr_identificador=" . $identificador . ", categoria_id=" . $data['Person']['categoria_id'] . "   WHERE person_id=" . $id . "";
                $this->Person->query($sql);


                /* $sql = "INSERT INTO inputs (person_id, entr_codigo, entr_identificador, categoria_id) values (" . $id . ", " . $codigo . ", " . $identificador . ",".$data['Person']['categoria_id'].");";
                  $this->Person->query($sql); */
                $this->Session->setFlash(__('The person has been update.'), 'good');
                //return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The person could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
            $this->request->data = $this->Person->find('first', $options);
        }

        $this->loadModel('Categoria');
        $this->loadModel('Product');
        $this->loadModel('Input');
        $categorias = $this->Categoria->find('list', array(
            "fields" => array(
                "Categoria.id",
                "Categoria.descripcion"
        )));

        $products1 = $this->Product->find('list', array(
            "fields" => array(
                "Product.product_id",
                "Product.name"
        )));


        $input = $this->Input->find('all', array(
            "fields" => array(
                "Input.entr_identificador",
                "Input.entr_codigo",
                "Input.categoria_id"
            ),
            "conditions" => array("Input.person_id" => $id),
            "limit" => "1"
        ));


        $products = $this->Product->find('list', array(
            "fields" => array(
                "Product.product_id",
                "o.product_id",
                "Product.name",
            ),
            //"contain"=>array("PeopleProduct"),
            'joins' => array(
                array(
                    'table' => 'people_products',
                    'alias' => 'o',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'o.person_id  ' => $id, 'o.product_id=Product.product_id'
                    )
                )
            ),
                // "conditions"=>array("o.person_id"=>$id) 
                )
        );
        /* echo "<pre>";
          var_dump($products); echo "</pre>"; die(); */

        $documentTypes = $this->Person->DocumentType->find('list');
        $cities = $this->Person->City->find('list');
        $committeesEvents = $this->Person->CommitteesEvent->find('list');
        $this->set(compact('documentTypes', 'cities', 'committeesEvents', 'categorias', 'products', 'products1', 'input'));
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

    public function buscador() {


        if ($this->request->is("POST")) {

            $datos = $this->request->data;
            $pers_documento = $datos["Person"]["pers_documento"];
            $pers_primNombre = $datos["Person"]["pers_primNombre"];
            $pers_primApellido = $datos["Person"]["pers_primApellido"];

            $input_identificador = $datos["input_identificador"];

            $conditions = "";

            if ($pers_documento == null && $pers_primApellido == null && $pers_primNombre == null && $input_identificador == null) {
                $conditions = "1";
            }

            // debug($datos);

            if ($pers_documento != null) {
                $conditions.=" pers_documento='" . $pers_documento . "'";
            }

            if ($pers_primNombre != null) {
                if ($pers_documento != null) {
                    $conditions.=" AND";
                } // si busco tb por doc entonces agrego el AND
                $conditions.=" pers_primNombre LIKE '" . $pers_primNombre . "%'";
            }

            if ($pers_primApellido != null) {
                if ($pers_documento != null || $pers_primNombre != null) {
                    $conditions.=" AND";
                } // si busco por doc o primNombre agrego el AND
                $conditions.=" pers_primApellido LIKE '" . $pers_primApellido . "%'";
            }

            if ($input_identificador != null) {

                $conditions = "SELECT * FROM people, inputs WHERE inputs.person_id=people.id AND " . $conditions . "  inputs.entr_identificador='" . $input_identificador . "' ";
            } else {
                $conditions = "SELECT * FROM people WHERE " . $conditions; //die();
            }




            $datos = $this->Person->query($conditions);
            $this->set("datos", $datos);
        }
    }

}
