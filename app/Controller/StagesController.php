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
        if ($this->request->is('post')) {
            $this->Stage->create();
            if ($this->Stage->save($this->request->data)) {
                $this->Session->setFlash(__('The stage has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The stage could not be saved. Please, try again.'));
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
        $file = $_FILES['file'];
        move_uploaded_file($_FILES["file"]["tmp_name"], "imagenes/" . $_FILES["file"]["name"]);
        var_dump($file);die();
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $nombre=$_FILES["file"]["name"];
        $temp = explode(".", $nombre);
        $extension = end($temp);
        var_dump($nombre);die();
        $tipo = $_FILES["file"]["type"];
        if ((( $tipo == "image/gif") || ($tipo == "image/jpeg") || ($tipo == "image/jpg") || ($tipo == "image/pjpeg") || ($tipo == "image/x-png") || ($tipo == "image/png")) && ($_FILES["file"]["size"] < 2000000) && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
                if (file_exists("upload/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "imagenes/" . $_FILES["file"]["name"]);
                    echo "Stored in: " . "imagenes/" . $_FILES["file"]["name"];
                }
            }
        } else {
            echo "Invalid file";
        }

////        $file = $this->request->data("file");
//        if (isset($_FILES["file"])) {
//            $file = $_FILES["file"];
//            $nombre = $file["name"];
//            $tipo = $file["type"];
//            $ruta_provicional = $file["tmp_name"];
//            $size = $file["size"];
//            $dimensiones = getimagesize($ruta_provicional);
//            $width = $dimensiones[0];
//            $height = $dimensiones[1];
//            $carpeta = 'imagenes/';
//            debug($file);
//            if ($tipo != 'image/jpg' && $tipo = 'image/jepg') {
//                echo "Error el archivo no es compatible solo recibe imagenes jpg";
//            } elseif ($width > 500 && $height > 500) {
//                echo "Error las dimenciones no son correctas";
//            } else {
//                $src = $carpeta . $nombre;
//                
//                move_uploaded_file($ruta_provicional, $src);
//                echo '<img src="$src" />';
//            }
//        }
    }

}
