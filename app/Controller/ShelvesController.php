<?php

App::uses('AppController', 'Controller');

/**
 * Shelves Controller
 *
 * @property Shelf $Shelf
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ShelvesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Shelf->recursive = 0;
        $this->set('shelves', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Shelf->exists($id)) {
            throw new NotFoundException(__('Invalid shelf'));
        }
        $options = array('conditions' => array('Shelf.' . $this->Shelf->primaryKey => $id));
        $this->set('shelf', $this->Shelf->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('Country');
        $this->loadModel('State');
        $this->loadModel('City');
        $this->loadModel('Location');
        $this->loadModel('LocationsShelf');
        if ($this->request->is('post')) {
            $this->Shelf->create();
            if ($this->Shelf->save($this->request->data)) {
                $this->Session->setFlash(__('The shelf has been saved.'));
                return $this->redirect(array('action' => 'buscar'));
            } else {
                $this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
            }
        }
//        $newShelf = $this->Shelf->getLastInsertId();
//        $newlocation = $this->request->data("data[Shelf][location_id]");
//        $newLocationShelf = $this->LocationsShelf->create();
//        $newLocationShelf = array(
//            "LocationsShelf" =>array(
//                'Shelf_id'=>$newShelf,
//                'location_id'=>$newlocation,
//                
//            )
//        );
//        $this->LocationsShelf->save($newLocationShelf);
        $locations = $this->Shelf->Location->find('list');
        $this->set(compact('locations'));

        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            )
        ));


        $this->set("locations", $locations);
        $this->set("countriesName", $countriesName);
        $states = $this->City->State->find('list');
        $this->set(compact('states'));
        $stages = $this->Shelf->Location->Stage->find('list');
        $this->set(compact('stages'));
    }

    /**
     * e7dit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Shelf->exists($id)) {
            throw new NotFoundException(__('Invalid shelf'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->data['Shelf']['codigo'] = strtoupper($this->data['Shelf']['codigo']);
            $this->data['Shelf']['esta_nombre'] = strtoupper($this->data['Shelf']['esta_nombre']);
            $this->data['Shelf']['genero'] = strtoupper($this->data['Shelf']['genero']);
            $this->data['Shelf']['representante'] = strtoupper($this->data['Shelf']['representante']);
            $this->data['Shelf']['ubicacion'] = strtoupper($this->data['Shelf']['ubicacion']);
            $this->data['Shelf']['descripcion'] = strtoupper($this->data['Shelf']['descripcion']);
            $this->data['Shelf']['observacion'] = strtoupper($this->data['Shelf']['observacion']);
            if ($this->Shelf->save($this->request->data)) {
                $this->Session->setFlash(__('The shelf has been saved.'));
                return $this->redirect(array('action' => 'buscar'));
            } else {
                $this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Shelf.' . $this->Shelf->primaryKey => $id));
            $this->request->data = $this->Shelf->find('first', $options);
        }
        $locations = $this->Shelf->Location->find('list');
        $this->set(compact('locations'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Shelf->id = $id;
        if (!$this->Shelf->exists()) {
            throw new NotFoundException(__('Invalid shelf'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Shelf->delete()) {
            $this->Session->setFlash(__('The shelf has been deleted.'));
        } else {
            $this->Session->setFlash(__('The shelf could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'buscar'));
    }

    public function import() {
        $this->loadModel('Event');
        if ($this->request->is('POST')) {
            $llave = $this->request->data['llave'];
            $datos = $this->request->data;
            if ($llave == 's') {
                
            } else {
                $event_id = $datos['Shelf']['event_id'];
                $tam = $datos['size'];
                $inicio = "Se registraron  ";
                $medio = "Y se actualizaron los stands con los siguientes codigos: ";
                $repetidos = "";
                $cont = 0;
                for ($i = 1; $i <= $tam; $i++) {
                    $codigo = $datos["codigo$i"];
                    $nombre = $datos["nombre$i"];
                    $genero = $datos["genero$i"];
                    $representante = $datos["representante$i"];
                    $ubicacion = $datos["ubicacion$i"];
                    $mts = $datos["mts$i"];
                    $descripcion = $datos["descripcion$i"];
                    $observacion = $datos["observacion$i"];
                    $aforo = $datos["aforo$i"];

                    $shelf = $this->Shelf->query("SELECT id FROM shelves WHERE codigo='$codigo' AND event_id = $event_id");
                    if ($shelf != array()) {
                        $shelf_id = $shelf[0]['shelves']['id'];
                        $this->Shelf->query("UPDATE `shelves` SET `codigo`='$codigo',`esta_nombre`='$nombre',`genero`='$genero',`representante`='$representante',`ubicacion`='$ubicacion',`mts`=$mts,`descripcion`='$descripcion',`observacion`='$observacion',`aforo`=$aforo,`event_id`=$event_id WHERE `id`= $shelf_id");
                        $repetidos = $repetidos . ", " . $codigo;
                    } else {
                        $cont = $cont + 1;
                        $sql = "INSERT INTO `shelves`( `codigo`, `esta_nombre`, `genero`, `representante`, `ubicacion`, `mts`, `descripcion`, `observacion`, `aforo`, `event_id`) VALUES ('$codigo','$nombre','$genero','$representante','$ubicacion',$mts,'$descripcion','$observacion',$aforo,$event_id)";
                        $this->Shelf->query($sql);
                    }
                }
                $this->Session->setFlash($inicio . $cont . " nuevos stands. " . $medio . $repetidos . ".", 'good');
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

    public function buscar() {
        $event_id = $this->Session->read('event_id');
        if ($event_id != NULL) {
            $datos = $this->data;
            if ($this->request->is("POST")) {
                $codigo = $datos["Shelf"]["codigo"];
                $esta_nombre = $datos["Shelf"]["esta_nombre"];
                $genero = $datos["genero"]; //
                $representante = $datos["Shelf"]["representante"];
                $ubicacion = $datos["ubicacion"];

                $conditions = "";

                if ($codigo == null && $esta_nombre == null && $genero == null && $representante == null && $ubicacion == null) {
                    $conditions = "";
                }

                // debug($datos);

                if ($codigo != null) {
                    $conditions.=" codigo LIKE '%" . $codigo . "%' AND";
                }

                if ($esta_nombre != null) {
//                    if ($codigo != null) {
//                        $conditions.=" AND";
//                    } // si busco tb por doc entonces agrego el AND
                    $conditions.=" esta_nombre LIKE '%" . $esta_nombre . "%' AND";
                }

                if ($genero != null) {
//                    if ($codigo != null) {
//                        $conditions.=" AND";
//                    } // si busco por doc o primNombre agrego el AND
                    $conditions.=" genero LIKE '%" . $genero . "%' AND";
                }

                if ($representante != null) {
//                    if ($codigo != null) {
//                        $conditions.=" AND";
//                    } // si busco tb por doc entonces agrego el AND
                    $conditions.=" representante LIKE '%" . $representante . "%' AND";
                }
                
                if ($ubicacion != null) {
//                    if ($codigo != null) {
//                        $conditions.=" AND";
//                    } // si busco tb por doc entonces agrego el AND
                    $conditions.=" ubicacion LIKE '%" . $ubicacion . "%' AND";
                }
                    $conditions = "SELECT * FROM shelves WHERE " . $conditions . " event_id=" . $event_id . " ";

//                    debug($conditions);



                $datos = $this->Shelf->query($conditions);
//            debug($datos); die;
                $this->set("datos", $datos);
            }
        } else {
            $this->Session->setFlash('Seleccione el evento al que desea realizar registros y confirme', 'error');
            return $this->redirect(array('action' => '../Pages/display'));
        }
    }

}
