<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();
    public $components = array('Paginator', 'Auth', 'Session', 'RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
//        $this->set('authUser', $this->Auth->user());
        $this->Auth->allow('index', 'registro', 'eventos', 'register', 'chose', 'remember', 'login', 'login2');
        // $this->layout = "reservas_usuario";
    }

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function index() {
        $this->layout = "reservas_usuario";
        //$this->Person->recursive = 0;
        //$this->set('people', $this->Paginator->paginate());
    }

    public function reservas() {
        $this->layout = "reservas_usuario";
    }

    public function registro() {
        $this->layout = "reservas_usuario";
        $this->loadModel('Person');
        $this->loadModel('Categoria');
        $this->loadModel('Shelf');
        $this->loadModel('Input');
        if ($this->request->is('POST')) {
            $data = $this->request->data;
            $person_id = $data['people']['pers_id'];
            if ($person_id == '' || $person_id == null) {
                // como no existe la persona creamos persona y entrada nuevas.
                $doc = $data['Person']['pers_documento'];
                $docType = $data['Person']['document_type_id'];
                $nom = $data['Person']['pers_primNombre'];
                $ape = $data['Person']['pers_primApellido'];
                $tel = $data['Person']['pers_telefono'];
                $mai = $data['Person']['pers_mail'];
                $obs = $data['Person']['observaciones'];
                $pass = $data['Person']['pers_institucion'];
                $this->Person->query("INSERT INTO `people`(`document_type_id`, `pers_documento`, `pers_primNombre`, `pers_primApellido`, `pers_telefono`,   `pers_mail`, `observaciones`, `pers_institucion`) VALUES ($docType, '$doc', '$nom', '$ape', '$tel',  '$mai', '$obs', '$pass')");

                $this->Session->setFlash('Tus datos han sido registrados correctamente', 'good');
                return $this->redirect(array('action' => 'login2'));
            } else {
//                    $input = $this->Input->query("SELECT id FROM inputs WHERE event_id = $evento AND person_id = $person_id");
                //capturando datos del formulario
                $id = $data['people']['pers_id'];
                $doc = $data['Person']['pers_documento'];
                $docType = $data['Person']['document_type_id'];
                $nom = $data['Person']['pers_primNombre'];
                $ape = $data['Person']['pers_primApellido'];
                $tel = $data['Person']['pers_telefono'];
                $mai = $data['Person']['pers_mail'];
                $obs = $data['Person']['observaciones'];
                $pass = $data['Person']['pers_institucion'];
                //actualizando la persona
                $this->Person->query("UPDATE `people` SET `document_type_id`=$docType, `pers_documento`='$doc',`pers_primNombre`='$nom',`pers_primApellido`= '$ape',`pers_telefono`='$tel',`pers_mail`='$mai',`observaciones`='$obs', `pers_institucion` = '$pass' WHERE id = $id");
                $this->Session->setFlash('Tus datos han sido registrados correctamente', 'good');
                return $this->redirect(array('action' => 'login2'));
            }
        }

        $this->loadModel('DocumentType');
        $documentTypes = $this->DocumentType->find('list', array('fields' => array('id', 'tido_descripcion')/* , 'order'=> array('tido_descripcion') */));
        $this->set(compact('documentTypes'));
    }

    public function login2(){
        $this->layout = "reservas_usuario";
        $this->loadModel("Person");
        if ($this->request->is('POST')) {
            $data = $this->request->data;
            $usu = $data['Page']['username'];
            $pass = $data ['Page']['password'];
            $datos = $this->Person->find('list', array('conditions'=>array("observaciones = '$usu'", "pers_institucion = '$pass'"), 'fields'=>array('id')));
            if($datos == array()){
             $this->Session->setFlash('La convinación usuario contraseña no concuerdan por favor intenta nuevamente', 'error'); 
             return $this->redirect(array('action' => 'login2'));
            }else{
                $this->Session->setFlash('Bienvenido '. $usu, 'good');
                return $this->redirect(array('action' => 'eventos'));
            }
            
        }
    }
    public function eventos() {
        $this->layout = "reservas_usuario";
        $this->loadModel('Event');
        $eventos = $this->Event->find('all');
        $this->set(compact('eventos'));
    }

    public function localidadEvento($id) {
        $this->loadModel('Event');
        $this->layout = "reservas_usuario";
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid Event'));
        }
        $this->loadModel('Location');
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
        $this->set('locations', $this->Location->find("all", array("conditions" => array('Location.event_id' => $id))));
    }

    public function verLocalidad($id = null) {
        $this->loadModel('Event');
        $this->loadModel('Location');
        $this->layout = "reservas_usuario";
        if (!$this->Location->exists($id)) {
            throw new NotFoundException(__('Invalid Event'));
        }

        $parametros = $this->request->params["pass"];
        $id_loc = $id;

        $this->set('location', $this->Location->find("first", array("conditions" => array('Location.id' => $id_loc))));
        $grid = $this->Location->query('SELECT * FROM grid_location WHERE id_location=' . $id); // Traemos datos 
        $this->set('grid', $grid);
    }

    public function register() {
        $this->layout = "reservas_usuario";
        $this->loadModel('Person');
        $this->loadModel('Categoria');
        $this->loadModel('Shelf');
        $this->loadModel('Input');
        $usuario = $this->Session->read('empresa');
        $evento = $this->Session->read('evento');
        if ($usuario != null) {
            if ($this->request->is('POST')) {
                $data = $this->request->data;
                $person_id = $data['people']['pers_id'];
                if ($person_id == '' || $person_id == null) {
                    // como no existe la persona creamos persona y entrada nuevas.
                    $doc = $data['Person']['pers_documento'];
                    $docType = $data['Person']['document_type_id'];
                    $nom = $data['Person']['pers_primNombre'];
                    $ape = $data['Person']['pers_primApellido'];
                    $cat = $data['Person']['categoria_id'];
                    $emp = $data['Person']['pers_empresa'];
                    $car = $data['Person']['cargo'];
                    $she = $data['Person']['shelf_id'];
                    if ($she == '' || $she == null) {
                        $she = 0;
                    }
                    $cel = $data['Person']['pers_celular'];
                    $tel = $data['Person']['pers_telefono'];
                    $mai = $data['Person']['pers_mail'];
                    $sec = $data['Person']['sector'];
                    $ciu = $data['Person']['ciudad'];
                    $pai = $data['Person']['pais'];
                    $obs = $data['Person']['observaciones'];
                    $this->Person->query("INSERT INTO `people`(`document_type_id`, `pers_documento`, `pers_primNombre`, `pers_primApellido`, `pers_telefono`, `pers_celular`,  `pers_mail`, `pers_empresa`, `ciudad`, `diligenciamiento`, `pais`, `sector`, `stan`, `cargo`, `categoria_id`, `observaciones`) VALUES ($docType, '$doc', '$nom', '$ape', '$tel', '$cel', '$mai', '$emp', '$ciu', NOW(), '$pai', '$sec', '$she', '$car', '$cat', '$obs')");
                    //extraigo el id de la persona que acabo de insertar
                    $persona = $this->Person->query("SELECT MAX(id) AS id FROM people");
                    $pid = $persona[0][0]['id'];
                    //consulto el id de la ultima entrada generada para generar la nueva
                    $input_id = $this->Input->query("SELECT MAX(id) AS id FROM inputs");
                    $inid = $input_id[0][0]['id'];
                    //generar nuevo codigo para la entrada
                    $cadena = "";
                    if (strlen($inid) < 12) {
                        $conteo = 12 - strlen($inid);
                        for ($i = 0; $i < $conteo; $i++) {
                            $x = $i + 1;
                            if ($x == $conteo) {
                                $cadena = $cadena . "0" . $inid + 1;
                            } else {
                                if ($x == 1) {
                                    $cadena = $cadena . "9";
                                } else {
                                    $cadena = $cadena . "0";
                                }
                            }
                        }
                    } else {
                        $cadena = $input_id;
                    }
                    $this->Input->query("INSERT INTO inputs (person_id, entr_codigo, categoria_id, shelf_id, event_id) VALUES($pid, '$cadena', $cat, $she, $evento);");
                    $this->Session->setFlash('Persona registrada para ele evento correctamente', 'good');
                    return $this->redirect(array('action' => 'register'));
                } else {
//                    $input = $this->Input->query("SELECT id FROM inputs WHERE event_id = $evento AND person_id = $person_id");
                    //capturando datos del formulario
                    $doc = $data['Person']['pers_documento'];
                    $docType = $data['Person']['document_type_id'];
                    $nom = $data['Person']['pers_primNombre'];
                    $ape = $data['Person']['pers_primApellido'];
                    $cat = $data['Person']['categoria_id'];
                    $emp = $data['Person']['pers_empresa'];
                    $car = $data['Person']['cargo'];
                    $she = $data['Person']['shelf_id'];
                    if ($she == '' || $she == null) {
                        $she = 0;
                    }
                    $cel = $data['Person']['pers_celular'];
                    $tel = $data['Person']['pers_telefono'];
                    $mai = $data['Person']['pers_mail'];
                    $sec = $data['Person']['sector'];
                    $ciu = $data['Person']['ciudad'];
                    $pai = $data['Person']['pais'];
                    $obs = $data['Person']['observaciones'];
                    $id = $data['people']['pers_id'];
                    //actualizando la persona
                    $this->Person->query("UPDATE `people` SET `document_type_id`=$docType, `pers_documento`='$doc',`pers_primNombre`='$nom',`pers_primApellido`= '$ape',`pers_telefono`='$tel',`pers_celular`='$cel',`pers_mail`='$mai',`pers_empresa`='$emp',`ciudad`='$ciu',`diligenciamiento`='NOW()',`pais`='$pai',`sector`='$sec',`stan`='$she',`cargo`='$car',`categoria_id`=$cat,`observaciones`='$obs' WHERE id = $id");

                    //revisando si la persona posee entrada para el evento
                    $input = $this->Input->find('list', array('conditions' => array("person_id = $person_id", "event_id = $evento"), 'fields' => array('id')));
                    foreach ($input as $value) {
                        $inputid = $value;
                    }
                    // si no esta registrada entra al if
                    if ($input == array()) {
                        //capturo el ultimo id de entrada creado para capturar el codigo
                        $input_id = $this->Input->query("SELECT MAX(id) AS id FROM inputs");
                        $inid = $input_id[0][0]['id'];
                        //generar nuevo codigo para la entrada
                        $cadena = "";
                        if (strlen($inid) < 12) {
                            $conteo = 12 - strlen($inid);
                            for ($i = 0; $i < $conteo; $i++) {
                                $x = $i + 1;
                                if ($x == $conteo) {
                                    $cadena = $cadena . "0" . $inid + 1;
                                } else {
                                    if ($x == 1) {
                                        $cadena = $cadena . "9";
                                    } else {
                                        $cadena = $cadena . "0";
                                    }
                                }
                            }
                        } else {
                            $cadena = $input_id;
                        }
                        if ($this->Input->query("INSERT INTO inputs (person_id, entr_codigo, categoria_id, shelf_id, event_id) VALUES($person_id, '$cadena', $cat, $she, $evento);")) {
                            $this->Session->setFlash('Persona registrada para ele evento correctamente', 'good');
                            return $this->redirect(array('action' => 'register'));
                        }
                    } else {
                        $this->Input->query("UPDATE inputs SET categoria_id = $cat, shelf_id = $she WHERE id = $inputid");
                        $this->Session->setFlash('Persona registrada para ele evento correctamente', 'good');
                        return $this->redirect(array('action' => 'register'));
                    }
                }
            }
        } else {
            return $this->redirect(array('controller' => 'Pages', 'action' => 'login'));
        }
        $options = "SELECT c.`id`, c.`descripcion` AS name FROM `categorias` c INNER JOIN `events_categorias` e ON e.`categoria_id` = c.`id` WHERE e.`event_id` = $evento order by c.`descripcion` asc ";
        $catego = $this->Categoria->query($options);
        $categorias = array();
        $p = count($catego);
        if ($p != 0) {
            for ($i = 0; $i < $p; $i++) {
                $categorias[$catego[$i]['c']['id']] = $catego[$i]['c']['name'];
            }
        }

        $shelves = $this->Shelf->find('list', array(
            "fields" => array(
                "Shelf.id",
                "Shelf.codigo"
            ),
            "conditions" => array(
                "event_id" => $evento,
        )));
        $this->loadModel('DocumentType');
        $documentTypes = $this->DocumentType->find('list', array('fields' => array('id', 'tido_descripcion')/* , 'order'=> array('tido_descripcion') */));
        $this->set(compact('documentTypes', 'categorias', 'shelves'));
    }

    public function login() {
        $this->layout = "reservas_usuario";
        $this->loadModel('Company');
        if ($this->request->is('POST')) {
            $nit = $this->request->data['Page']['nit'];
            $pass = $this->request->data['Page']['password'];
            $empresa = $this->Company->find('first', array('conditions' => array('empr_nit' => "$nit", 'password' => "$pass"), 'fields' => array('empr_nombre', 'id')));
            if ($empresa != array()) {
                $this->Session->write('empresa', $empresa['Company']['id']);
                $nombre = $empresa['Company']['empr_nombre'];
                $this->Session->setFlash("Bienvenido $nombre ahora podrás registrar tu personal para el evento", 'good');
                return $this->redirect(array('action' => 'chose'));
            } else {
                $this->Session->setFlash('Usuario o contraseña incorrectos por favor intente nuevamente', 'error');
            }
        }
    }

    public function chose() {
        $this->layout = "reservas_usuario";
        $this->loadModel('Event');
        if ($this->request->is('POST')) {
            $this->Session->write('evento', $this->request->data['Page']['event_id']);
            return $this->redirect(array('action' => 'register'));
        }
        $date = date('Y-m-d');
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

    public function remember() {
        $this->layout = "reservas_usuario";
        $this->loadModel('Company');
        if ($this->request->is('POST')) {
            $nit = $this->request->data['Page']['nit'];
            $mail = $this->request->data['Page']['email'];
            $doc = $this->request->data['Page']['documento'];
            $person_id = $this->Company->query("SELECT p.id, pers_primNombre FROM people p INNER JOIN companies c ON p.id = c.person_id WHERE p.pers_documento='$doc' AND c.empr_nit = '$nit' ");
            if ($person_id != array()) {
                $existe = $this->Company->find('first', array('conditions' => array('empr_nit' => "$nit"), 'fields' => array('empr_nombre', 'password')));
                if ($existe != array()) {
                    $Email = new CakeEmail('gmail');
                    $Email->to($mail);
                    $Email->emailFormat('html');
                    $Email->subject('Recordatorio de Contraseña Ticket Express');
                    $cuerpo = 'Querido ' . $existe['Company']['empr_nombre'] . '<br> Tu contraseña para acceder al registro es: ' . $existe['Company']['password'];
                    if ($Email->send($cuerpo)) {
                        $this->Session->setFlash($person_id[0]['p']['pers_primNombre'] . " En los proximos 5 minutos llegara la contraseña al correo ingresado", 'good');
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Session->setFlash('Error al enviar los datos de acceso, por favor intente nuevamente', 'error');
                    }
                } else {
                    $this->Session->setFlash('El nit ingresado no se encuentra registrado en nuestro sistema', 'error');
                }
            } else {
                $this->Session->setFlash('La convinación NIT-Documento no se encuentran en la base de datos. Recuerde que solo el representante legal puede ingresar.', 'error');
                return $this->redirect(array('action' => 'remember'));
            }
        }
    }

}
