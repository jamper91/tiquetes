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
    public $helpers = array('PhpExcel');

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
        $this->loadModel('Event');
        //try {
        $eve = $this->Session->read('event_id');
        if ($eve != NULL) {
            $user_id = $this->Session->read("User.id");
            if ($this->request->is('POST')) {
                $data = $this->request->data;
                $person_id = $data['people']['pers_id'];
                if ($data['people']['pers_id'] != '' || $data['people']['pers_id'] != null) {
                    
                } else {
                    $per_id = $this->Person->find("list", array(
                        "conditions" => array(
                            'Person.pers_documento' => $data['Person']['pers_documento']),
                        "fields" => array(
                            "Person.id",
                        )
                    ));
                    foreach ($per_id as $key => $v) {
                        $person_id = $v;
                    }
//                debug($person_id);die;
                }

                $if = true;
                $while = true;
                while ($while) {
                    $cadena = ""; //variable para almacenar la cadena generada
                    $ejemplo = strlen($cadena);
                    while ($if) {
                        if ($ejemplo < 12) {
                            $numerodado = rand(0, 9);
//                        debug($numerodado);
                            $cadena = $cadena . $numerodado;
                            $ejemplo = strlen($cadena);
                        } else {
                            $if = FALSE;
                        }
                    }
//                    debug(strlen($cadena));die;
                    $pdigit = substr($cadena, -12, 1);
                    if ($pdigit != '0') {
                        $sql = "SELECT id FROM inputs WHERE entr_codigo = $cadena";
                        $id = $this->Input->query($sql);
                        if ($id == array()) {
                            $while = false;
                        }
                    } else {
                        $while = true;
                    }
                }
                if ($person_id == '') { //echo "aqui"; die();
//                if (($entr_codigo == array())) {
//                    if (($entr_identificador == array())) {
                    $this->loadModel("Person");
                    $this->Person->create();
                    //debug($data['Person']['categoria_id']);die;
                    if ($data['Person']['categoria_id'] == '') {
                        $data['Person']['categoria_id'] = 0;
                        //debug($data['Person']['categoria_id']);die;
                    }
//                if ($this->Person->saveAll($this->request->data) == true) {


                    $cat = '';

                    if ($this->Person->saveAll($this->request->data) == true) {
                        $categoria = $this->Categoria->find('list', array(
                            "conditions" => array(
                                "Categoria.id" => $data['Person']['categoria_id']),
                            "fields" => array(
                                "Categoria.id",
                                "Categoria.descripcion"
                        )));
                        foreach ($categoria as $key => $value) {
                            $cat = $value;
                        }
                        $esc_id = $this->Event->query("SELECT `escarapela_id` FROM `events` WHERE id= $eve");

                        $escarapela_id = $esc_id[0]['events']['escarapela_id'];
                        $esc = $this->Event->query("SELECT * FROM `escarapelas` WHERE id= $escarapela_id");

                        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                        $this->layout = 'pdf'; //this will use the pdf.ctp layout
                        $this->set('pdf', new FPDF($orientation = 'P', $unit = 'mm', array('287', '343')));
                        $informacion = array('documento' => $data['Person']['pers_documento'], 'nombre' => $data['Person']['pers_primNombre'], 'apellido' => $data['Person']['pers_primApellido'], 'categoria' => $cat, 'empresa' => $data['Person']['pers_empresa'], 'codigo' => $cadena, 'tipo' => 2, 'escarapela' => $esc);
                        $this->set('data', $informacion);

                        $this->render('pdf');
//                            return $this->redirect(array('action' => 'add'));
                        $this->Session->setFlash('Persona insertada correctamente.', 'good');
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
//                    $identificador = $data['input_identificador'];
//                    $codigo = $data['input_codigo'];

                        $sql = "INSERT INTO inputs (person_id, entr_codigo, categoria_id, event_id, usuarioescarapela, fechaescarapela) values ($person_id, '$cadena', " . $data['Person']['categoria_id'] . ", $eve, $user_id, now())";
                        $this->Input->query($sql);
                        $newInputId = $this->Input->getLastInsertId();
                        //comienzo con el log
                        $this->loadModel("Log");
                        $user_id = $this->Session->read("User.id");
                        $input_id = $newInputId;
                        $operacion = "VENTA";
                        $sql3 = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
                        $operation = $this->Data->query($sql3);
                        //termino el log
                    } catch (Exception $ex) {
                        $error2 = $ex->getCode();
                        if ($error2 == '23000') {
                            $this->Session->setFlash('Error Codigo RFID ó Identificador de manilla ya estan registrados en la base de datos', 'error');
                        }
                    }
//                    } else {
//                        $this->Session->setFlash('Error Identificador de manilla ya  registrado en la base de datos', 'error');
//                    }
//                } else {
//                    $this->Session->setFlash('Error Codigo RFID  ya registrado en la base de datos', 'error');
//                }
                } else {

                    $this->loadModel("Person");
                    $doc = strtoupper($data['Person']['pers_documento']);
//                $res = $this->Person->query("SELECT id FROM people WHERE pers_documento= '$doc'");
//                $people_id = $res[0]['people']['id'];
                    $data = $this->request->data;
                    $tdoc = $data['Person']['document_type_id'];

                    $nom = strtoupper($data['Person']['pers_primNombre']);
                    $ape = strtoupper($data['Person']['pers_primApellido']);
                    $empr = $data['Person']['pers_empresa'];
                    $car = strtoupper($data['Person']['cargo']);
                    $tel = $data['Person']['pers_telefono'];
                    $cel = $data['Person']['pers_celular'];
                    $mail = $data['Person']['pers_mail'];
                    $ciu = strtoupper($data['Person']['ciudad']);
                    $pais = strtoupper($data['Person']['pais']);
                    $sec = $data['Person']['sector'];
                    $sta = strtoupper($data['Person']['stan']);
                    $obser = strtoupper($data['Person']['observaciones']);
                    if ($data['Person']['categoria_id'] != '') {
                        $cat = $data['Person']['categoria_id'];
                    } else {
                        $cat = 0;
                    }
                    $sql = "UPDATE `people` SET `document_type_id`=$tdoc,`pers_documento`='$doc',`pers_primNombre`='$nom',`pers_primApellido`='$ape',`pers_telefono`='$tel',`pers_celular`='$cel',`pers_mail`='$mail',`pers_empresa`='$empr',`ciudad`='$ciu',`diligenciamiento`=NOW(),`pais`='$pais',`sector`='$sec',`stan`='$sta', `cargo`='$car',  `categoria_id`=$cat, `observaciones`='$obser'  WHERE `id` = $person_id ";
                    $this->Person->query($sql);
                    $sql2 = "SELECT id FROM people WHERE pers_documento = '$doc'";
                    $res = $this->Person->query($sql2);
                    $id = $res[0]['people']['id'];
                    $sql3 = "SELECT id, entr_codigo FROM inputs WHERE person_id = $id and event_id = $eve";
                    $codigo = $this->Input->query($sql3);

                    if ($codigo == array()) {
                        $sql = "INSERT INTO inputs (person_id, entr_codigo, categoria_id, event_id, tipo_entrada, usuarioescarapela, fechaescarapela) values (" . $id . ", " . $cadena . ", " . $cat . ", $eve, 2, $user_id, NOW());";
                        $this->Input->query($sql);
                        $sql3 = "SELECT id FROM inputs WHERE person_id = $id and event_id = $eve";
                        $codigo2 = $this->Input->query($sql3);
                        //comienzo con el log
                        $this->loadModel("Log");
                        $user_id = $this->Session->read("User.id");
                        $input_id = $codigo2[0]['inputs']['id'];
                        $operacion = "VENTA";
                        $sql = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
                        $operation = $this->Data->query($sql);
                        //termino el log
                        $categoria = $this->Categoria->find('list', array(
                            "conditions" => array(
                                "Categoria.id" => $data['Person']['categoria_id']),
                            "fields" => array(
                                "Categoria.id",
                                "Categoria.descripcion"
                        )));
//                    debug(cat)
                        foreach ($categoria as $key => $value) {
                            $cat = $value;
                        }
                        $esc_id = $this->Event->query("SELECT `escarapela_id` FROM `events` WHERE id= $eve");
                        $escarapela_id = $esc_id[0]['events']['escarapela_id'];
                        $esc = $this->Event->query("SELECT * FROM `escarapelas` WHERE id= $escarapela_id");

                        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                        $this->layout = 'pdf'; //this will use the pdf.ctp layout
                        $this->set('pdf', new FPDF($orientation = 'P', $unit = 'mm', 'A4', array('287', '343')));
                        $informacion = array('documento' => $data['Person']['pers_documento'], 'nombre' => $data['Person']['pers_primNombre'], 'categoria' => $cat, 'apellido' => $data['Person']['pers_primApellido'], 'empresa' => $data['Person']['pers_empresa'], 'codigo' => $cadena, 'tipo' => 2, 'escarapela' => $esc);
                        $this->set('data', $informacion);
                        $this->render('pdf');
                    } else {
                        $c = $codigo[0]['inputs']['entr_codigo'];
                        $id = $codigo[0]['inputs']['id'];
                        $user_id = $this->Session->read("User.id");
                        if ($c == null) {
//                            dCebug($cadena);die;
                            $this->Input->query("UPDATE inputs SET usuarioescarapela=$user_id, fechaescarapela=NOW(), categoria_id=$cat, entr_codigo = '$cadena' WHERE id =$id");
                            
                            if ($codigo != array()) {
                                $categoria = $this->Categoria->find('list', array(
                                    "conditions" => array(
                                        "Categoria.id" => $data['Person']['categoria_id']),
                                    "fields" => array(
                                        "Categoria.id",
                                        "Categoria.descripcion"
                                )));
//                    debug(cat)
                                if ($categoria != array()) {
                                    foreach ($categoria as $key => $value) {
                                        $cat = $value;
                                    }
                                } else {
                                    $cat = '';
                                }
                                $esc_id = $this->Event->query("SELECT `escarapela_id` FROM `events` WHERE id= $eve");
                                $escarapela_id = $esc_id[0]['events']['escarapela_id'];
                                $esc = $this->Event->query("SELECT * FROM `escarapelas` WHERE id= $escarapela_id");

                                App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                                $this->layout = 'pdf'; //this will use the pdf.ctp layout
                                $this->set('pdf', new FPDF($orientation = 'P', $unit = 'mm', array('287', '343')));
                                $informacion = array('documento' => $data['Person']['pers_documento'], 'nombre' => $data['Person']['pers_primNombre'], 'categoria' => $cat, 'apellido' => $data['Person']['pers_primApellido'], 'empresa' => $data['Person']['pers_empresa'], 'codigo' => $cadena, 'tipo' => 2, 'escarapela' => $esc);
                                $this->set('data', $informacion);
                                $this->render('pdf');
                            }
                        } else {

                            $this->Input->query("UPDATE inputs SET usuarioescarapela=$user_id, fechaescarapela=NOW(), categoria_id=$cat WHERE entr_codigo =$c");
                            if ($codigo != array()) {
//                    debug($codigo); die;
                                $c = $codigo[0]['inputs']['entr_codigo'];
                                $categoria = $this->Categoria->find('list', array(
                                    "conditions" => array(
                                        "Categoria.id" => $data['Person']['categoria_id']),
                                    "fields" => array(
                                        "Categoria.id",
                                        "Categoria.descripcion"
                                )));
//                    debug(cat)
                                if ($categoria != array()) {
                                    foreach ($categoria as $key => $value) {
                                        $cat = $value;
                                    }
                                } else {
                                    $cat = '';
                                }
                                $esc_id = $this->Event->query("SELECT `escarapela_id` FROM `events` WHERE id= $eve");
                                $escarapela_id = $esc_id[0]['events']['escarapela_id'];
                                $esc = $this->Event->query("SELECT * FROM `escarapelas` WHERE id= $escarapela_id");

                                App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                                $this->layout = 'pdf'; //this will use the pdf.ctp layout
                                $this->set('pdf', new FPDF($orientation = 'P', $unit = 'mm', array('287', '343')));
                                $informacion = array('documento' => $data['Person']['pers_documento'], 'nombre' => $data['Person']['pers_primNombre'], 'categoria' => $cat, 'apellido' => $data['Person']['pers_primApellido'], 'empresa' => $data['Person']['pers_empresa'], 'codigo' => $c, 'tipo' => 2, 'escarapela' => $esc);
                                $this->set('data', $informacion);
                                $this->render('pdf');
                            }
//               
                        }
                    }
//                $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
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

            $options = "SELECT c.`id`, c.`descripcion` AS name FROM `categorias` c INNER JOIN `events_categorias` e ON e.`categoria_id` = c.`id` WHERE e.`event_id` = $eve order by c.`descripcion` asc ";
            $catego = $this->Categoria->query($options);
//      debug($catego);  
            $categorias = array();
            $p = count($catego);
            if ($p != 0) {
                for ($i = 0; $i < $p; $i++) {
                    $categorias[$catego[$i]['c']['id']] = $catego[$i]['c']['name'];
                }
            }
//        debug($catego);die;
//        $products = $this->Product->find('list', array(
//            "fields" => array(
//                "Product.product_id",
//                "Product.name"
//        )));
//        $bloodType = Array('O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'HH');
            $documentTypes = $this->Person->DocumentType->find('list', array(
                "fields" => array(
                    "DocumentType.id",
                    "DocumentType.tido_descripcion"
            )));
            $cities = $this->Person->City->find('list');
            $committeesEvents = $this->Person->CommitteesEvent->find('list');
            $this->set(compact('documentTypes', 'cities', 'committeesEvents', /* 'bloodType',  'products', */ 'categorias'));
        } else {
            $this->Session->setFlash('Seleccione el evento al que desea realizar registros y confirme', 'error');
            return $this->redirect(array('action' => '../Pages/display'));
        }
    }

    /**
     * add2 method
     *
     * @return void
     */
    public function add2() {
        $this->loadModel('Categoria');
        $this->loadModel('Product');
        $this->loadModel('Input');
        $this->loadModel('Person');
        $this->loadModel('PeopleProduct');
        $this->loadModel('Data');
        //try {
        $user_id = $this->Session->read("User.id");
        if ($this->request->is('POST')) {
            $data = $this->request->data;
//            debug($data['people']['pers_id']);die;
            $person_id = $data['people']['pers_id'];
//           debug($person_id);die;
//           debug($data['people']['pers_id']);die;
            if ($data['people']['pers_id'] != '' || $data['people']['pers_id'] != null) {
//                debug(vacio);die;
            } else {
                $per_id = $this->Person->find("list", array(
                    "conditions" => array(
                        'Person.pers_documento' => $data['Person']['pers_documento']),
                    "fields" => array(
                        "Person.id",
                    )
                ));
//                debug($per_id);die;
                foreach ($per_id as $key => $v) {
                    $person_id = $v;
                }
//                debug($person_id);die;
            }
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
            $eve = 8;
            if ($person_id == '') { //echo "aqui"; die();
//                if (($entr_codigo == array())) {
//                    if (($entr_identificador == array())) {
                $this->loadModel("Person");
                $this->Person->create();

                if ($this->Person->saveAll($this->request->data) == true) {


                    $categoria = $this->Categoria->find('list', array(
                        "conditions" => array(
                            "Categoria.id" => $data['Person']['categoria_id']),
                        "fields" => array(
                            "Categoria.id",
                            "Categoria.descripcion"
                    )));
//                    
                    foreach ($categoria as $key => $value) {
                        $cat = $value;
                    }
//                    debug($cat);die;

                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf_1.php'));
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    $this->set('fpdf_1', new FPDF('L', 'mm', array('105', '130')));
                    $informacion = array('documento' => $data['Person']['pers_documento'], 'nombre' => $data['Person']['pers_primNombre'], 'apellido' => $data['Person']['pers_primApellido'], 'categoria' => $cat, 'empresa' => $data['Person']['pers_empresa'], 'codigo' => $cadena, 'tipo' => 2);
                    $this->set('data', $informacion);

                    $this->render('pdf_1');
//                            return $this->redirect(array('action' => 'add'));
                    $this->Session->setFlash('Persona insertada correctamente.', 'good');
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
//                    $identificador = $data['input_identificador'];
//                    $codigo = $data['input_codigo'];

                    $sql = "INSERT INTO inputs (person_id, entr_codigo, categoria_id, event_id, usuariocertificate, fechacertificate) values ($person_id, '$cadena', " . $data['Person']['categoria_id'] . ", $eve, $user_id, now())";
                    $this->Input->query($sql);
                    $newInputId = $this->Input->getLastInsertId();
                    //comienzo con el log
                    $this->loadModel("Log");
                    $user_id = $this->Session->read("User.id");
                    $input_id = $newInputId;
                    $operacion = "VENTA";
                    $sql3 = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
                    $operation = $this->Data->query($sql3);
                    //termino el log
                } catch (Exception $ex) {
                    $error2 = $ex->getCode();
                    if ($error2 == '23000') {
                        $this->Session->setFlash('Error Codigo RFID ó Identificador de manilla ya estan registrados en la base de datos', 'error');
                    }
                }
//                    } else {
//                        $this->Session->setFlash('Error Identificador de manilla ya  registrado en la base de datos', 'error');
//                    }
//                } else {
//                    $this->Session->setFlash('Error Codigo RFID  ya registrado en la base de datos', 'error');
//                }
            } else {

                $this->loadModel("Person");
                $doc = strtoupper($data['Person']['pers_documento']);
//                $res = $this->Person->query("SELECT id FROM people WHERE pers_documento= '$doc'");
//                $people_id = $res[0]['people']['id'];
                $data = $this->request->data;
                $tdoc = $data['Person']['document_type_id'];

                $nom = strtoupper($data['Person']['pers_primNombre']);
                $ape = strtoupper($data['Person']['pers_primApellido']);
                $empr = $data['Person']['pers_empresa'];
                $car = strtoupper($data['Person']['cargo']);
                $tel = $data['Person']['pers_telefono'];
                $cel = $data['Person']['pers_celular'];
                $mail = $data['Person']['pers_mail'];
                $ciu = strtoupper($data['Person']['ciudad']);
                $pais = strtoupper($data['Person']['pais']);
                $sec = '';
                $sta = strtoupper($data['Person']['stan']);
                $cat = $data['Person']['categoria_id'];
                $sql = "UPDATE `people` SET `document_type_id`=$tdoc,`pers_documento`='$doc',`pers_primNombre`='$nom',`pers_primApellido`='$ape',`pers_telefono`='$tel',`pers_celular`='$cel',`pers_mail`='$mail',`pers_empresa`='$empr',`ciudad`='$ciu',`diligenciamiento`=`diligenciamiento`,`pais`='$pais',`sector`='$sec',`stan`='$sta', `cargo`='$car',  `categoria_id`=$cat  WHERE `id` = $person_id ";
                $this->Person->query($sql);
                $sql2 = "SELECT id FROM people WHERE pers_documento = '$doc'";
                $res = $this->Person->query($sql2);
                $id = $res[0]['people']['id'];
                $sql3 = "SELECT entr_codigo FROM inputs WHERE person_id = $id and event_id = $eve";
                $codigo = $this->Input->query($sql3);

                if ($codigo == array()) {
                    $sql = "INSERT INTO inputs (person_id, entr_codigo, categoria_id, event_id, tipo_entrada, usuariocertificate, fechacertificate) values (" . $id . ", " . $cadena . ", " . $data['Person']['categoria_id'] . ", $eve, 2, $user_id, NOW());";
                    $this->Input->query($sql);
                    $sql3 = "SELECT id FROM inputs WHERE person_id = $id and event_id = $eve";
                    $codigo2 = $this->Input->query($sql3);
                    //comienzo con el log
                    $this->loadModel("Log");
                    $user_id = $this->Session->read("User.id");
                    $input_id = $codigo2[0]['inputs']['id'];
                    $operacion = "VENTA";
                    $sql = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
                    $operation = $this->Data->query($sql);
                    //termino el log
                    $categoria = $this->Categoria->find('list', array(
                        "conditions" => array(
                            "Categoria.id" => $data['Person']['categoria_id']),
                        "fields" => array(
                            "Categoria.id",
                            "Categoria.descripcion"
                    )));
//                    debug(cat)
                    foreach ($categoria as $key => $value) {
                        $cat = $value;
                    }
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf_1.php'));
                    $this->layout = 'pdf'; //this will use the pdf.ctp layout
                    $this->set('fpdf_1', new FPDF('L', 'mm', array('105', '130')));
                    $informacion = array('documento' => $data['Person']['pers_documento'], 'nombre' => $data['Person']['pers_primNombre'], 'categoria' => $cat, 'apellido' => $data['Person']['pers_primApellido'], 'empresa' => $data['Person']['pers_empresa'], 'codigo' => $cadena, 'tipo' => 2);
                    $this->set('data', $informacion);
                    $this->render('pdf_1');
                } else {
                    $c = $codigo[0]['inputs']['entr_codigo'];
                    $user_id = $this->Session->read("User.id");
                    $this->Input->query("UPDATE inputs SET usuariocertificate=$user_id, fechacertificate=NOW() WHERE entr_codigo =$c");
                    if ($codigo != array()) {
//                    debug($codigo); die;
                        $c = $codigo[0]['inputs']['entr_codigo'];
                        $categoria = $this->Categoria->find('list', array(
                            "conditions" => array(
                                "Categoria.id" => $data['Person']['categoria_id']),
                            "fields" => array(
                                "Categoria.id",
                                "Categoria.descripcion"
                        )));
//                    debug(cat)
                        foreach ($categoria as $key => $value) {
                            $cat = $value;
                        }
                        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf_1.php'));
                        $this->layout = 'pdf'; //this will use the pdf.ctp layout
                        $this->set('fpdf_1', new FPDF('L', 'mm', array('105', '130')));
                        $informacion = array('documento' => $data['Person']['pers_documento'], 'nombre' => $data['Person']['pers_primNombre'], 'categoria' => $cat, 'apellido' => $data['Person']['pers_primApellido'], 'empresa' => $data['Person']['pers_empresa'], 'codigo' => $c, 'tipo' => 2);
                        $this->set('data', $informacion);
                        $this->render('pdf_1');
                    }
//               
                }


//                $this->Session->setFlash('Error ya hay una persona con el mismo documento en la base de datos', 'error');
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

        $options = "SELECT c.`id`, c.`descripcion` AS name FROM `categorias` c INNER JOIN `events_categorias` e ON e.`categoria_id` = c.`id` WHERE e.`event_id` = 7 order by c.`descripcion` asc ";
        $catego = $this->Categoria->query($options);
//      debug($catego);  
        $categorias = array();
        $p = count($catego);
        if ($p != 0) {
            for ($i = 0; $i < $p; $i++) {
                $categorias[$catego[$i]['c']['id']] = $catego[$i]['c']['name'];
            }
        }
//        debug($catego);die;
//        $products = $this->Product->find('list', array(
//            "fields" => array(
//                "Product.product_id",
//                "Product.name"
//        )));
//        $bloodType = Array('O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'HH');
        $documentTypes = $this->Person->DocumentType->find('list', array(
            "fields" => array(
                "DocumentType.id",
                "DocumentType.tido_descripcion"
        )));
        $cities = $this->Person->City->find('list');
        $committeesEvents = $this->Person->CommitteesEvent->find('list');
        $this->set(compact('documentTypes', 'cities', 'committeesEvents', /* 'bloodType',  'products', */ 'categorias'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->loadModel('Categoria');
        $this->loadModel('Product');
        $this->loadModel('Input');
        $this->loadModel('Person');
        $this->loadModel('PeopleProduct');
        $this->loadModel('Data');
        $data = $this->request->data;
        if (!$this->Person->exists($id)) {
            throw new NotFoundException(__('Invalid person'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Person->id = $id;
            if ($this->Person->save($this->request->data)) {
                $sql = "DELETE FROM people_products WHERE person_id=$id";
                $this->Person->query($sql);
                if (!empty($data['producto'])) {
                    foreach ($data['producto'] as $va) {
                        $sql = "INSERT INTO people_products (product_id, person_id) VALUES (" . $va . ", " . $id . ");";
                        $this->Person->query($sql);
                    }
                }
//               
                $this->Session->setFlash(__('La persona se modificó satisfactoriamente.'), 'good');
            } else {
                $this->Session->setFlash(__('The person could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
            $this->request->data = $this->Person->find('first', $options);
        }

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
            $this->loadModel("Input");
            $sql = "DELETE FROM inputs  WHERE person_id = $id";
            $this->Input->query($sql);
            $this->Session->setFlash('La persona ha sido eliminada', 'good');
        } else {
            $this->Session->setFlash(__('The person could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'buscador'));
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
//            debug($datos); die;
            $this->set("datos", $datos);
        }
    }

    public function excel() {
        $this->loadModel('Event');
        $this->loadModel('Input');
        if ($this->request->is('POST')) {

            $llave = $this->request->data['llave'];
            $datos = $this->request->data;
            if ($llave == 's') {
                
            } else {
                $event_id = $datos['Person']['event_id'];
                $tam = $datos['size'];
                $inicio = "Se registraron  ";
                $medio = "Y se actualizaron las personas con los siguientes numeros de documento: ";
                $repetidos = "";
                $cont = 0;
                for ($i = 1; $i <= $tam; $i++) {
                    $doc = $datos["doc$i"];
                    $ti = $datos["ti$i"];
                    $cat = $datos["cat$i"];
                    $nom = $datos["nom$i"];
                    $ape = $datos["ape$i"];
                    $ent = $datos["ent$i"];
                    $mail = $datos["mai$i"];
                    $cel = $datos["cel$i"];
                    $tel = $datos["tel$i"];
                    $ciu = $datos["ciu$i"];
                    $pai = $datos["pai$i"];
                    $sta = $datos["sta$i"];
                    $sec = $datos["sec$i"];
                    $pro = $datos["pro$i"];

                    $p = $this->Person->query("SELECT id FROM people WHERE pers_documento='$doc'");
                    if ($p != array()) {
                        $person_id = $p[0]['people']['id'];
                        $input = $this->Input->find('first', array('conditions' => array("Input.event_id=$event_id", "Input.person_id=$person_id"), 'fields' => array('Input.entr_codigo')));
                        if ($input == array()) {
                            $this->Input->query("INSERT INTO inputs (person_id, categoria_id, event_id, fechaescarapela) VALUES ($person_id, $cat, $event_id, NULL )");
                            $sql2 = "UPDATE `people` SET `document_type_id` = $ti, `categoria_id`=$cat, `pers_primNombre`='$nom',`pers_primApellido`='$ape',`pers_empresa`='$ent',`pers_mail`='$mail', `pers_celular`='$cel',`pers_telefono`='$tel',`ciudad` = '$ciu', `pais`= '$pai', `stan`= '$sta', `sector`='$sec', `cargo`='$pro' WHERE `pers_documento` = '$doc'";
                            $this->Person->query($sql2);
                        }
                        $repetidos = $repetidos . ", " . $doc;
                    } else {
                        $cont = $cont + 1;
                        $sql = "INSERT INTO people (pers_documento,  document_type_id, categoria_id, pers_primNombre, pers_primApellido, pers_empresa, pers_mail, pers_celular, pers_telefono,  ciudad, pais, stan, sector, cargo) VALUES ('$doc', $ti, $cat,'$nom','$ape', '$ent', '$mail', '$cel', '$tel', '$ciu', '$pai', '$sta', '$sec', '$pro')";
                        $this->Person->query($sql);
                        $person = $this->Person->find('list', array('conditions' => array("Person.pers_documento='$doc'"), 'fields' => array('Person.id')));
                        foreach ($person as $key => $value) {
                            $person_id = $value;
                        }
                        $this->Input->query("INSERT INTO inputs (person_id, categoria_id, event_id, fechaescarapela) VALUES ($person_id, $cat, $event_id, NULL )");
                    }
                }
                $this->Session->setFlash($inicio . $cont . " nuevas personas. " . $medio . $repetidos . ".", 'good');
            }
        }
        $date = date('Y-m-d');
//                    debug($date);
        //van los eventos disponibles 
        $events = $this->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "conditions" => array(
                "Event.even_fechFinal >= '$date'"
            )
        ));
        $this->set(compact('events'));
    }

    public function reimprimir($doc1 = null, $event_id = null, $tipo = null) {
        $this->loadModel("Input");
        if ($this->request->is("POST")) {
            $data = $this->request->data;
//            debug($data);
//            die;
            $tipo = $data['Person']['tipoE'];
            if ($tipo == "Codigo Barra" || $tipo == "ambos") {
                $doc = $data['Person']['pers_documento'];
                $sql = "SELECT * FROM people WHERE pers_documento = '$doc'";
                $eve = $data['Person']['event_id'];
                if ($tipo == "ambos") {
                    $chip = $data['Person']['input_codigo'];
                    $new = $this->Input->query("SELECT id FROM inputs WHERE entr_codigo = $chip");
//                    $newInputId = $new[0]['inputs']['id'];
                    $rfid = $this->Input->query("UPDATE inputs set entr_codigo ='$chip' WHERE person_id = $id AND event_id = $eve AND tipo_entrada = 1");
                }
                $res = $this->Person->query($sql);
//                debug($res);die;
                if ($res != array()) {
                    $id = $res[0]['people']['id'];
                    $nom = $res[0]['people']['pers_primNombre'];
                    $ape = $res[0]['people']['pers_primApellido'];
                    $doc = $res[0]['people']['pers_documento'];
                    $emp = $res[0]['people']['pers_empresa'];

                    $sql2 = "SELECT id, entr_codigo, categoria_id FROM inputs WHERE person_id = $id and event_id = $eve AND tipo_entrada = 2";
                    $res2 = $this->Input->query($sql2);
                    if ($res2 != array()) {

                        $newInputId = $res2[0]['inputs']['id'];
                        //llenado de la tabla log
                        $this->loadModel("Log");
                        $user_id = $this->Session->read("User.id");
                        $input_id = $newInputId;
                        $operacion = "REIMPRESION";
                        $sql = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
                        $operation = $this->Log->query($sql);

                        $options = array(
                            "conditions" => array(
                                "Data.person_id" => $id,
                                "Data.forms_personal_datum_id" => 6,
                            ),
                            "fields" => array(
//                                "Data.id",
                                "Data.descripcion",
//                                "Data.forms_personal_datum_id",
//                                "Data.person_id",
//                "Data.personal_datum_id",
                            ),
                        );
                        $this->loadModel("Data");
//                        $datos = $this->Data->find("first", $options);
//                        $ax = $datos['Data']['descripcion'];
                        $cadena = $res2[0]['inputs']['entr_codigo'];
                        $cate = $res2[0]['inputs']['categoria_id'];
                        $s = $this->Input->query("SELECT descripcion FROM categorias WHERE id = $cate");
                        $cat = $s[0]['categorias']['descripcion'];
                        $cadena = $res2[0]['inputs']['entr_codigo'];
                        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                        $this->layout = 'pdf'; //this will use the pdf.ctp layout
                        $this->set('fpdf', new FPDF('L', 'mm', array('60', '40')));
                        $informacion = array('documento' => $doc, 'nombre' => $nom, 'categoria' => $cat, 'apellido' => $ape, 'empresa' => $emp, 'codigo' => $cadena, 'tipo' => 2);
                        $this->set('data', $informacion);
                        $this->render('pdf');
//                        $this->Session->setFlash("Operacion realizada con exito", 'good');
                    } else {
                        $this->Session->setFlash("Lo sentimos no existe una persona con el numero de documento " . $doc . " registrada para este evento", 'error');
                    }
                } else {
                    $this->Session->setFlash("Lo sentimos no existe una persona con el numero de documento " . $doc . " registrada en la base de datos", 'error');
                }
            } else if ($tipo == "RFID") {
                $doc = $data['Person']['pers_documento'];
                $sql = "SELECT id, pers_primNombre, Pers_primApellido, pers_institucion, ciudad FROM people WHERE pers_documento = '$doc'";
                $eve = $data['Person']['event_id'];
                $res = $this->Person->query($sql);

                if ($res != array()) {
                    $id = $res[0]['people']['id'];
                    $nom = $res[0]['people']['pers_primNombre'];
                    $ape = $res[0]['people']['Pers_primApellido'];
                    $emp = $res[0]['people']['pers_institucion'];
                    $ciu = $res[0]['people']['ciudad'];
                    $sql2 = "SELECT id, entr_codigo FROM inputs WHERE person_id = $id and event_id = $eve AND tipo_entrada = 1";
                    $res2 = $this->Input->query($sql2);
//                    debug($res2);
//                    die;
                    if ($res2 != array()) {
                        //creacion del log                        
                        $newInputId = $res2[0]['inputs']['id'];
                        $this->loadModel("Log");
                        $user_id = $this->Session->read("User.id");
                        $input_id = $newInputId;
                        $operacion = "REIMPRESION";
                        $sql = "INSERT INTO `logs`(`user_id`, `input_id`, `descripcion`) VALUES (" . $user_id . ", " . $input_id . ", '$operacion')";
                        $operation = $this->Log->query($sql);
                        $options = array(
                            "conditions" => array(
                                "Data.person_id" => $id,
                                "Data.forms_personal_datum_id" => 6,
                            ),
                            "fields" => array(
//                                "Data.id",
                                "Data.descripcion",
//                                "Data.forms_personal_datum_id",
//                                "Data.person_id",
//                "Data.personal_datum_id",
                            ),
                        );
                        $datos = $this->Data->find("first", $options);
                        $ax = $datos['Data']['descripcion'];
//                        debug($datos);die;
                        $cadena = $res2[0]['inputs']['entr_codigo'];
                        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                        $this->layout = 'pdf'; //this will use the pdf.ctp layout
                        $this->set('fpdf', new FPDF('L', 'mm', array('60', '40')));
                        $informacion = array('documento' => $doc, 'nombre' => $nom, 'apellido' => $ape, 'empresa' => $ax, 'ciudad' => $ciu, 'codigo' => $cadena, 'tipo' => 1);
                        $this->set('data', $informacion);
                        $this->render('pdf');
                    } else {
                        $this->Session->setFlash("Lo sentimos no existe una persona con el numero de documento " . $doc . " registrada para este evento en especifico", 'error');
                    }
                } else {
                    $this->Session->setFlash("Lo sentimos no existe una persona con el numero de documento " . $doc . " registrada en la base de datos", 'error');
                }
            }
        } else {
            if ($event_id != null) {
                $doc = $doc1;
                $sql = "SELECT id, pers_primNombre, Pers_primApellido, pers_institucion, ciudad FROM people WHERE pers_documento = '$doc'";
                $eve = $event_id;
                $res = $this->Person->query($sql);
                if ($res != array()) {
                    $id = $res[0]['people']['id'];
                    $nom = $res[0]['people']['pers_primNombre'];
                    $ape = $res[0]['people']['Pers_primApellido'];
                    $emp = $res[0]['people']['pers_institucion'];
                    $ciu = $res[0]['people']['ciudad'];
                    $sql2 = "SELECT entr_codigo, categoria_id FROM inputs WHERE person_id = $id and event_id = $eve AND tipo_entrada = $tipo";
                    $res2 = $this->Input->query($sql2);
                    if ($res2 != array()) {
                        $cadena = $res2[0]['inputs']['entr_codigo'];
                        $cate = $res2[0]['inputs']['categoria_id'];
                        $s = $this->Input->query("SELECT descripcion FROM categorias WHERE id = $cate");
                        $cat = $s[0]['categorias']['descripcion']; //                       
                        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                        $this->layout = 'pdf'; //this will use the pdf.ctp layout
                        $this->set('fpdf', new FPDF('L', 'mm', array('60', '40')));
                        $informacion = array('documento' => $doc, 'nombre' => $nom, 'apellido' => $ape, 'empresa' => $emp, 'ciudad' => $ciu, 'codigo' => $cadena, "categoria" => $cat, 'tipo' => $tipo);
                        $this->set('data', $informacion);
                        $this->render('pdf');
                    } else {
                        $this->Session->setFlash("Lo sentimos no existe una persona con el numero de documento " . $doc . " registrada para este evento", 'error');
                    }
                } else {
                    $this->Session->setFlash("Lo sentimos no existe una persona con el numero de documento " . $doc . " registrada en la base de datos", 'error');
                }
            }
        }
        $this->loadModel("Event");
        $events = $this->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "conditions" => array(
                "Event.even_fechFinal >= NOW()"
            )
        ));
        $this->set(compact('events'));
    }

    public function certificate() {
        $this->loadModel('Categoria');
        $this->loadModel('Event');
        $this->loadModel('Input');
        $eve = $this->Session->read('event_id');
        if ($eve != '') {
            if ($this->request->is("POST")) {
                $datos = $this->request->data;
                $id = '';
                if ($datos['people']['pers_id'] != '') {
                    $id = $datos['people']['pers_id'];
                }
                $documentoant = $datos['people']['documento'];
                $cedula = $datos['Person']['cedula'];
                $nombre = $datos['Person']['pers_primNombre'];
                $apellido = $datos['Person']['pers_primApellido'];
                $empresa = ' ';
                if ($datos['Person']['pers_empresa'] != '') {
                    $empresa = $datos['Person']['pers_empresa'];
                }
//consultar si el documento es diferente al q ya tenia 
                if ($id != '') {
                    if ($cedula != $documentoant) {
                        $sql = $this->Person->query("SELECT p.id FROM people p WHERE p.pers_documento = '$cedula'");
                        if ($sql == array()) {
                            $this->Person->query("UPDATE people SET pers_primNombre = '$nombre',pers_primApellido = '$apellido',pers_empresa = '$empresa', pers_documento = '$cedula' WHERE id = $id");

                            $sqlcod = $this->Person->query("SELECT i.entr_codigo FROM inputs i WHERE i.person_id = $id AND i.event_id = $eve");
                            $codigo = '';
                            if ($sqlcod != array()) {
                                $codigo = $sqlcod[0]['i']['entr_codigo'];
                            }
                            $sql = "SELECT p.pers_documento,p.pers_primNombre,p.pers_primApellido,p.document_type_id,p.pers_empresa, p.categoria_id FROM `people` p INNER JOIN `inputs` i ON i.person_id=p.id WHERE i.entr_codigo ='$codigo'";
                            $datos = $this->Person->query($sql);
                            $identificacion = $datos[0]['p']['pers_documento'];
                            $nombre = $datos[0]['p']['pers_primNombre'];
                            $apellido = $datos[0]['p']['pers_primApellido'];
                            $doctypeid = $datos[0]['p']['document_type_id'];
                            $empresa = $datos[0]['p']['pers_empresa'];
                            $abr = '';
                            $cat = '';
                            if ($datos != array()) {
                                $c = $this->Person->find('list', array('conditions' => array("Person.pers_documento='$identificacion'"), 'fields' => array('Person.categoria_id')));
                                foreach ($c as $key => $value) {
                                    $cat = $value;
                                }
                                $this->loadModel("Categorias");
                                $ca = $this->Categorias->find('list', array('conditions' => array("Categorias.id = $cat"), 'fields' => array('Categorias.descripcion')));
                                foreach ($ca as $key => $value) {
                                    $categoria = $value;
                                }
                            }
                            $sql = "SELECT abreviatura FROM document_types WHERE id= $doctypeid ";
                            $res = $this->Person->query($sql);
                            if ($res != array()) {
                                $abr = $res[0]['document_types']['abreviatura'];
                            }
                            $numero = '';
                            if (strlen($identificacion) == 12) {
                                $numero = substr($identificacion, -12, 1) . substr($identificacion, -11, 1) . substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                            } elseif (strlen($identificacion) == 11) {
                                $numero = substr($identificacion, -11, 1) . substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                                substr($identificacion, -10) . '.' . substr($identificacion, -9) . substr($identificacion, -8) . substr($identificacion, -7) . '.' . substr($identificacion, -6) . substr($identificacion, -5) . substr($identificacion, -4) . '.' . substr($identificacion, -3) . substr($identificacion, -2) . substr($identificacion, -1);
                            } elseif (strlen($identificacion) == 10) {
                                $numero = substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                                debug($numero);
                            } elseif (strlen($identificacion) == 9) {
                                $numero = substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                            } elseif (strlen($identificacion) == 8) {
                                $numero = substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                            } elseif (strlen($identificacion) == 7) {
                                $numero = substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                            } elseif (strlen($identificacion) == 6) {
                                $numero = substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                            } elseif (strlen($identificacion) == 5) {
                                $numero = substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                            } elseif (strlen($identificacion) == 4) {
                                $numero = substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                            } else {
                                $numero = $identificacion;
                            }
                            $i = $this->event->query("SELECT certificado_id FROM events WHERE id = $eve");
                            if ($i != array()) {
                                $id = $i[0]['events']['certificado_id'];
                                $cert = $this->Event->query("SELECT nombres, documento, empresa, libre FROM certificados WHERE id = $id");
                                App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                                $this->layout = 'certificado'; //this will use the pdf.ctp layout
                                $informacion = array('documento' => $numero,
                                    'nombre' => $nombre,
                                    'apellido' => $apellido,
                                    'abr' => $abr,
                                    'empresa' => $empresa,
                                    'certificado' => $cert,
                                    'categoria' => $categoria
//                    'categoria' => $categoria,
//                    'evento' => $evento,
//                    'ciudad' => $ciudad,
//                    'diainicio' => $diainicial,
//                    'diafinal' => $diafinal,
//                    'mesinicial' => $mesinicial,
//                    'mesfinal' => $mesfinal,
//                    'ano' => $anoinicial
                                );
                                $this->set('fpdf', new FPDF('L', 'mm', array('279.4', '215.9')));
                                //debug($informacion);
                                $this->set('data', $informacion);
                                $this->render('certificado');
                                $sqlexiste = "UPDATE `inputs` SET `certificate`=1,`fechacertificate`=CURRENT_TIMESTAMP,`usuariocertificate`=" . $this->Session->read('User.id') . " WHERE entr_codigo='$codigo'"; //
                                $existe = $this->Person->query($sqlexiste);
                            } else {
                                $this->Session->setFlash('Este Evento no tiene certificado asignado', 'error');
                            }
                        } else {
                            $this->Session->setFlash('La identificacion ya existe no puede volver a ser asignada.', 'error');
                        }
                    } else {
                        $this->Person->query("UPDATE people SET pers_primNombre = '$nombre',pers_primApellido = '$apellido',pers_empresa = '$empresa', pers_documento = '$cedula' WHERE id = $id");

                        $sqlcod = $this->Person->query("SELECT i.entr_codigo FROM inputs i WHERE i.person_id = $id AND i.event_id = $eve");
                        $codigo = '';
                        if ($sqlcod != array()) {
                            $codigo = $sqlcod[0]['i']['entr_codigo'];
                        }
                        $sql = "SELECT p.pers_documento,p.pers_primNombre,p.pers_primApellido,p.document_type_id,p.pers_empresa FROM `people` p INNER JOIN `inputs` i ON i.person_id=p.id WHERE i.entr_codigo ='$codigo'";
                        $datos = $this->Person->query($sql);
                        $identificacion = $datos[0]['p']['pers_documento'];
                        $nombre = $datos[0]['p']['pers_primNombre'];
                        $apellido = $datos[0]['p']['pers_primApellido'];
                        $doctypeid = $datos[0]['p']['document_type_id'];
                        $empresa = $datos[0]['p']['pers_empresa'];
                        $abr = '';
                        $sql = "SELECT abreviatura FROM document_types WHERE id= $doctypeid ";
                        $res = $this->Person->query($sql);
                        if ($res != array()) {
                            $abr = $res[0]['document_types']['abreviatura'];
                        }
                        $numero = '';
                        $cat = '';
                        if ($datos != array()) {
                            $c = $this->Person->find('list', array('conditions' => array("Person.pers_documento='$identificacion'"), 'fields' => array('Person.categoria_id')));
                            foreach ($c as $key => $value) {
                                $cat = $value;
                            }
                            $this->loadModel("Categorias");
                            $ca = $this->Categorias->find('list', array('conditions' => array("Categorias.id = $cat"), 'fields' => array('Categorias.descripcion')));
                            foreach ($ca as $key => $value) {
                                $categoria = $value;
                            }
                        }
                        if (strlen($identificacion) == 12) {
                            $numero = substr($identificacion, -12, 1) . substr($identificacion, -11, 1) . substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        } elseif (strlen($identificacion) == 11) {
                            $numero = substr($identificacion, -11, 1) . substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                            substr($identificacion, -10) . '.' . substr($identificacion, -9) . substr($identificacion, -8) . substr($identificacion, -7) . '.' . substr($identificacion, -6) . substr($identificacion, -5) . substr($identificacion, -4) . '.' . substr($identificacion, -3) . substr($identificacion, -2) . substr($identificacion, -1);
                        } elseif (strlen($identificacion) == 10) {
                            $numero = substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        } elseif (strlen($identificacion) == 9) {
                            $numero = substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        } elseif (strlen($identificacion) == 8) {
                            $numero = substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        } elseif (strlen($identificacion) == 7) {
                            $numero = substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        } elseif (strlen($identificacion) == 6) {
                            $numero = substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        } elseif (strlen($identificacion) == 5) {
                            $numero = substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        } elseif (strlen($identificacion) == 4) {
                            $numero = substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        } else {
                            $numero = $identificacion;
                        }
                        $i = $this->Event->query("SELECT certificado_id FROM events WHERE id = $eve");
                        if ($i != array()) {
                            $id = $i[0]['events']['certificado_id'];
                            $cert = $this->Event->query("SELECT nombres, documento, empresa, libre FROM certificados WHERE id = $id");
                            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
                            $this->layout = 'certificado'; //this will use the pdf.ctp layout
                            $informacion = array('documento' => $numero,
                                'nombre' => $nombre,
                                'apellido' => $apellido,
                                'abr' => $abr,
                                'empresa' => $empresa,
                                'certificado' => $cert,
                                'categoria' => $categoria,
//                    'evento' => $evento,
//                    'ciudad' => $ciudad,
//                    'diainicio' => $diainicial,
//                    'diafinal' => $diafinal,
//                    'mesinicial' => $mesinicial,
//                    'mesfinal' => $mesfinal,
//                    'ano' => $anoinicial
                            );
                            $this->set('fpdf', new FPDF('L', 'mm', array('279.4', '215.9')));
                            //debug($informacion);
                            $this->set('data', $informacion);
                            $this->render('certificado');
                            $sqlexiste = "UPDATE `inputs` SET `certificate`=1,`fechacertificate`=CURRENT_TIMESTAMP,`usuariocertificate`=" . $this->Session->read('User.id') . " WHERE entr_codigo='$codigo'"; //
                            $existe = $this->Person->query($sqlexiste);
                        } else {
                            $this->Session->setFlash('Este evento no tiene certificado asignado', 'error');
                        }
                    }
                } else {
                    $this->Session->setFlash('Datos no validos.', 'error');
                }

//actualizo los campos del certificado en la tabla people
            }
        } else {
            $this->Session->setFlash('Seleccione el evento al que desea realizar registros y confirme', 'error');
            return $this->redirect(array('action' => '../Pages/display'));
        }
    }

    public function certificate2($id = null) {
        $this->Person->id = $id;
        if (!$this->Person->exists()) {
            throw new NotFoundException(__('Invalid person'));
        }
        //metodo de certificat
        $codigo = "";
        $sqlexiste1 = "SELECT i.entr_codigo FROM `inputs` i INNER JOIN people p ON p.id=i.person_id WHERE p.id=$id AND i.event_id=3";
        $existe1 = $this->Person->query($sqlexiste1);
        if ($existe1 != array()) {
            $codigo = $existe1[0]['i']['entr_codigo'];
            $sqlexiste2 = "SELECT i.certificate FROM `inputs` i WHERE i.entr_codigo=$codigo AND i.event_id=3";
            $existe2 = $this->Person->query($sqlexiste2);
            $cert = $existe2[0]['i']['certificate'];
            if ($cert == '0') {

//            $datos = $this->request->data;
//            $codigo = $datos["Person"]["codigo"];
//            $codigo = substr($codigo, 0, -1);
//            debug($codigo);
//            die;
                $validar = "";
                $sqlexiste = "SELECT i.id FROM `inputs` i WHERE i.entr_codigo=$codigo";
                $existe = $this->Person->query($sqlexiste);


                if ($existe != array()) {
                    $validar = $existe[0]['i']['id'];

//                $sql = "SELECT p.pers_documento,p.pers_primNombre,p.pers_primApellido,c.descripcion, e.even_nombre, e.even_fechInicio, e.even_fechFinal, city.name FROM `people` p INNER JOIN `inputs` i ON i.person_id=p.id INNER JOIN `categorias` c ON i.categoria_id=c.id INNER JOIN `events_categorias` ec ON ec.categoria_id=c.id INNER JOIN `events` e ON ec.event_id = e.id INNER JOIN `stages` s ON s.id=e.stage_id INNER JOIN `cities` city ON s.city_id = city.id WHERE i.entr_codigo=" . $codigo;  
                    $sql = "SELECT p.pers_documento,p.pers_primNombre,p.pers_primApellido,p.document_type_id FROM `people` p INNER JOIN `inputs` i ON i.person_id=p.id WHERE i.entr_codigo =" . $codigo;
                    $datos = $this->Person->query($sql);
                    $identificacion = $datos[0]['p']['pers_documento'];
                    $nombre = $datos[0]['p']['pers_primNombre'];
                    $apellido = $datos[0]['p']['pers_primApellido'];
                    $doctypeid = $datos[0]['p']['document_type_id'];
                    $abr = '';
                    $sql = "SELECT abreviatura FROM document_types WHERE id= $doctypeid ";
                    $res = $this->Input->query($sql);
                    if ($res != array()) {
                        $abr = $res[0]['document_types']['abreviatura'];
                    }
                    $numero = '';
                    if (strlen($identificacion) == 12) {
                        $numero = substr($identificacion, -12, 1) . substr($identificacion, -11, 1) . substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                    } elseif (strlen($identificacion) == 11) {
                        $numero = substr($identificacion, -11, 1) . substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                        substr($identificacion, -10) . '.' . substr($identificacion, -9) . substr($identificacion, -8) . substr($identificacion, -7) . '.' . substr($identificacion, -6) . substr($identificacion, -5) . substr($identificacion, -4) . '.' . substr($identificacion, -3) . substr($identificacion, -2) . substr($identificacion, -1);
                    } elseif (strlen($identificacion) == 10) {
                        $numero = substr($identificacion, -10, 1) . '.' . substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
//                    debug($numero);
                    } elseif (strlen($identificacion) == 9) {
                        $numero = substr($identificacion, -9, 1) . substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                    } elseif (strlen($identificacion) == 8) {
                        $numero = substr($identificacion, -8, 1) . substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                    } elseif (strlen($identificacion) == 7) {
                        $numero = substr($identificacion, -7, 1) . '.' . substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                    } elseif (strlen($identificacion) == 6) {
                        $numero = substr($identificacion, -6, 1) . substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                    } elseif (strlen($identificacion) == 5) {
                        $numero = substr($identificacion, -5, 1) . substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                    } elseif (strlen($identificacion) == 4) {
                        $numero = substr($identificacion, -4, 1) . '.' . substr($identificacion, -3, 1) . substr($identificacion, -2, 1) . substr($identificacion, -1);
                    } else {
                        $numero = $identificacion;
                    }
//                debug($numero);
//                die();
//                $categoria = $datos[0]['c']['descripcion'];
//                $evento = $datos[0]['e']['even_nombre'];
//                $fechainicial = $datos[0]['e']['even_fechInicio'];
//                $fechafinal = $datos[0]['e']['even_fechFinal'];
//                $ciudad = $datos[0]['city']['name'];
//                $sql = "SELECT DAYOFMONTH('$fechainicial') AS dia ,MONTH('$fechainicial') AS mes ,YEAR('$fechainicial') AS ano";
//                $fecha = $this->Person->query($sql);
//                $diainicial = $fecha[0][0]['dia'];
//                $mesinicial = $fecha[0][0]['mes'];
//                $anoinicial = $fecha[0][0]['ano'];
//                $sql = "SELECT DAYOFMONTH('$fechafinal') AS dia ,MONTH('$fechafinal') AS mes ,YEAR('$fechafinal') AS ano";
//                $fecha = $this->Person->query($sql);
//                $diafinal = $fecha[0][0]['dia'];
//                $mesfinal = $fecha[0][0]['mes'];
//                $anofinal = $fecha[0][0]['ano'];
//
//                switch ($mesinicial) {
//                    case '1':
//                        $mesinicial = 'Enero';
//                        break;
//                    case '2':
//                        $mesinicial = 'Febrero';
//                        break;
//                    case '3':
//                        $mesinicial = 'Marzo';
//                        break;
//                    case '4':
//                        $mesinicial = 'Abril';
//                        break;
//                    case '5':
//                        $mesinicial = 'Mayo';
//                        break;
//                    case '6':
//                        $mesinicial = 'Junio';
//                        break;
//                    case '7':
//                        $mesinicial = 'Julio';
//                        break;
//                    case '8':
//                        $mesinicial = 'Agosto';
//                        break;
//                    case '9';
//                        $mesinicial = 'Septiembre';
//                        break;
//                    case '10';
//                        $mesinicial = 'Octubre';
//                        break;
//                    case '11';
//                        $mesinicial = 'Noviembre';
//                        break;
//                    case '12';
//                        $mesinicial = 'Diciembre';
//                        break;
//                    default:
//                        break;
//                }
//                switch ($mesfinal) {
//                    case '1':
//                        $mesfinal = 'Enero';
//                        break;
//                    case '2':
//                        $mesfinal = 'Febrero';
//                        break;
//                    case '3':
//                        $mesfinal = 'Marzo';
//                        break;
//                    case '4':
//                        $mesfinal = 'Abril';
//                        break;
//                    case '5':
//                        $mesfinal = 'Mayo';
//                        break;
//                    case '6':
//                        $mesfinal = 'Junio';
//                        break;
//                    case '7':
//                        $mesfinal = 'Julio';
//                        break;
//                    case '8':
//                        $mesfinal = 'Agosto';
//                        break;
//                    case '9';
//                        $mesfinal = 'Septiembre';
//                        break;
//                    case '10';
//                        $mesfinal = 'Octubre';
//                        break;
//                    case '11';
//                        $mesfinal = 'Noviembre';
//                        break;
//                    case '12';
//                        $mesfinal = 'Diciembre';
//                        break;
//                    default:
//                        break;
//                }
                    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf_1.php'));
                    $this->layout = 'certificado'; //this will use the pdf.ctp layout
                    $informacion = array('documento' => $numero,
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'abr' => $abr
//                    'categoria' => $categoria,
//                    'evento' => $evento,
//                    'ciudad' => $ciudad,
//                    'diainicio' => $diainicial,
//                    'diafinal' => $diafinal,
//                    'mesinicial' => $mesinicial,
//                    'mesfinal' => $mesfinal,
//                    'ano' => $anoinicial
                    );
                    $this->set('fpdf', new FPDF('L', 'mm', array('279.4', '215.9')));
                    //debug($informacion);
                    $this->set('data', $informacion);
                    $this->render('certificado');
                    //actualizar impresion
                    $sqlexiste = "UPDATE `inputs` SET `certificate`=1,`fechacertificate`=CURRENT_TIMESTAMP,`usuariocertificate`=" . $this->Session->read('User.id') . " WHERE id=$validar"; //
                    $existe = $this->Person->query($sqlexiste);
//                     
//                } else {
//                    $this->Session->setFlash("El certificado ya fue impreso", 'error');
//                }
//                $this->Session->setFlash("Su certificado fue exportado con exito", 'good');
                } else {
                    $this->Session->setFlash("La escarapela no es valida", 'error');
                    return $this->redirect(array('action' => 'buscador'));
                }
            } else {
                $this->Session->setFlash("El Certificado ya fue impreso", 'error');
                return $this->redirect(array('action' => 'buscador'));
            }
        } else {
            $this->Session->setFlash("La Persona no tiene entrada para este evento", 'error');
            return $this->redirect(array('action' => 'buscador'));
        }
    }

}
