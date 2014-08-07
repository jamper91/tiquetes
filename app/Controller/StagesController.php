<?php

App::uses('AppController', 'Controller');

/**
 * Stages Controller
 *
 * @property Stage $Stage
 * @property PaginatorComponent $Paginator
 */
class StagesController extends AppController {

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
        $this->Stage->recursive = 0;
        $this->set('stages', $this->Paginator->paginate());
    }


    public function mapea($id=null){
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException(__('Invalid stage'));
        }

        $options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
        $this->set('stage', $this->Stage->find('first', $options));


        
    }



    public function beforeFilter() {

        $this->Auth->allow('add', 'edit', 'index', 'imagenAjax');

        parent:: beforeFilter();
        if ($this->Auth->user('role') == 'admin') {
            $this->Auth->allow('add', 'asociartarjeta', 'add2');
        } else {
            $this->Auth->allow();
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException(__('Invalid stage'));
        }
        $options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
        $this->set('stage', $this->Stage->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $src="";
        if ($this->request->is('post')) {
            $data = $this->data;
            $this->loadModel('Stage');
            if (isset($this->request->data["doc_file"])) {
                $file = $this->request->data["doc_file"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provicional = $file["tmp_name"];
                $size = $file["size"];
//                $dimensiones = getimagesize($ruta_provicional);
//                $width = $dimensiones[0];
//                $height = $dimensiones[1];
                $carpeta = WWW_ROOT."/img/escenario/";
                $src = $carpeta .$nombre;

                    move_uploaded_file($ruta_provicional, $src);
                    $newStage = $this->Stage->create();
                    $newStage = array(
                        'Stage' => array(
                            'city_id' => $data['city_id'],
                            'esce_nombre' => $data['esce_nombre'],
                            'esce_direccion' => $data['esce_direccion'],
                            'esce_telefono' => $data['esce_telefono'],
                            //'esce_mapa' => $src
                            'esce_mapa' => $nombre
                        )
                    );
                    try {
                        $this->Stage->save($newStage);                        
                        return $this->redirect(array('action' => 'index'));
                    } catch (Exception $ex) {
                        $error2 = $ex->getCode();
                        if ($error2 == '23000') {
                            $this->Session->setFlash('Error ya hay un escenario igual', 'error');
                        }
                    }
                    if ($this->Stage->save($this->request->data)) {
                        $this->Session->setFlash(__('The stage has been saved.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Session->setFlash(__('The stage could not be saved. Please, try again.'));
                    }
//                if ($tipo != 'image/jpg' || $tipo = 'image/jepg') {
//                    echo "Error el archivo no es compatible solo recibe imagenes jpg o jepg";
////                } elseif ($width > 500 && $height > 500) {
////                    echo "Error las dimenciones no son correctas";
//                } else {
//                    
////                    echo '<img src="$src" />';
//                    
//                }
            }
        }


        $this->loadModel('Country');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            ),
            "recursive" => -2
        ));
        $this->set(compact('countriesName'));

        $this->set(compact('state'));

        //$cities = $this->Stage->City->find('list');
        $this->set(compact('cities'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException(__('Invalid stage'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Stage->save($this->request->data)) {
                $this->Session->setFlash(__('The stage has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The stage could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
            $this->request->data = $this->Stage->find('first', $options);
        }
        $cities = $this->Stage->City->find('list');
        $this->set(compact('cities'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Stage->id = $id;
        if (!$this->Stage->exists()) {
            throw new NotFoundException(__('Invalid stage'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Stage->delete()) {
            $this->Session->setFlash(__('The stage has been deleted.'));
        } else {
            $this->Session->setFlash(__('The stage could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function imagenAjax() {
        $this->layout = "webservices";
        $file = $this->request->data["doc_file"]["name"];
        debug($file);
//        $pru = $_FILES["doc_file"];
//        debug($pru);
//        $tipo = $file["type"];
//        $ruta_provicional = $file["tmp_name"];
//        $size = $file["size"];
//        $dimensiones = getimagesize($ruta_provicional);
//        $width = $dimensiones[0];
//        $height = $dimensiones[1];
//        $carpeta = 'imagenes/';
//        move_uploaded_file($_FILES["file"]["tmp_name"], "imagenes/" . $_FILES["file"]["name"]);
//        debug($file);
        $mensaje = "OK";
        $this->set(
                array(
                    "datos" => $mensaje,
                    "_serialize" => array("datos")
                )
        );
    }

//        
    public function getStagesByCity() {
        $this->layout = "webservices";
        $city_id = $this->request->data["city_id"]; //city  

        $options = array(
            "conditions" => array(
                "Stage.city_id" => $city_id
            ),
            "fields" => array(
                "Stage.id",
                "Stage.esce_nombre as name"
            ),
            "recursive" => 0
        );
        $stages = $this->Stage->find("all", $options);
//        var_dump($stages); 
        $log = $this->Stage->getDataSource()->getLog(false, false);
//        debug($log);
        //$stages=array("datos"=>$stages);


        $this->set(
                array(
                    "datos" => $stages,
                    "_serialize" => array("datos")
                )
        );
    }

}
