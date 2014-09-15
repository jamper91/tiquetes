<?php

App::uses('AppController', 'Controller');

/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CategoriasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Categoria->recursive = 0;
        $sql = "SELECT id, descripcion FROM `categorias`";
        $categories = $this->Categoria->query($sql);
//        $this->set(compact('eventos'));
        $this->set('categories', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Categoria->exists($id)) {
            throw new NotFoundException(__('Invalid categoria'));
        }
        $options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
        $this->set('categoria', $this->Categoria->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
//            debug(strtoupper($this->request->data['Categoria']['descripcion']));
//            die();
            $x = "";
            $sql = "SELECT id FROM `categorias` WHERE descripcion ='" . strtoupper($this->request->data['Categoria']['descripcion']) . "'"; //
            $id = $this->Categoria->query($sql);
            if ($id != array())
                $x = $id[0]['categorias']['id'];
            if ($x == "") {
                $this->Categoria->create();
                $this->request->data['Categoria']['descripcion'] = strtoupper($this->request->data['Categoria']['descripcion']);
                if ($this->Categoria->save($this->request->data)) {
                    $this->Session->setFlash('La categoria se guardo con exito.', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('La categoria no se pudo crear. Por favor, vuelve a intentar.', 'error');
                }
            } else {
                $this->Session->setFlash('The categoria ya ha sido creada. Por favor, ingrese otra.', 'error');
            }
        }
        $events = $this->Categoria->Event->find('list');
        $this->set(compact('events'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Categoria->exists($id)) {
            throw new NotFoundException(__('Invalid categoria'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $x = "";
            $y = $this->request->data['descripcionant'];
            $sql = "SELECT id, descripcion FROM `categorias` WHERE descripcion ='" . strtoupper($this->request->data['Categoria']['descripcion']) . "'"; //
            $id = $this->Categoria->query($sql);
//            debug($id);
//            die();
            if ($id != array()) {
                $x = $id[0]['categorias']['id'];
            }
            if ($x != "") {
                if ($this->request->data['Categoria']['id'] == $x) {
                    $this->Session->setFlash('La categoria se edito correctamente.', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('La categoria ya existe no la puede duplicar', 'error');
                }
            } elseif ($y != "EXPOSITOR" && $y != "ACOMPAÑANTE" && $y != "CONFERENCISTA") {
                $this->request->data['Categoria']['descripcion'] = strtoupper($this->request->data['Categoria']['descripcion']);
                if ($this->Categoria->save($this->request->data)) {
                    $this->Session->setFlash('La categoria se edito correctamente.', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('The categoria no se pudo editar. por favor, intente de nuevo.', 'error');
                }
            } else {
                $this->Session->setFlash('Las categorias EXPOSITOR, ACOMPAÑANTE, CONFERENCISTA no se puede editar.', 'error');
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
            $this->request->data = $this->Categoria->find('first', $options);
        }
        $events = $this->Categoria->Event->find('list');
        $entradas = $this->Categoria->Entrada->find('list');
        $this->set(compact('events', 'entradas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Categoria->id = $id;
        
        if ($id != "1" && $id != "2" && $id != "3") {
        if (!$this->Categoria->exists()) {
            throw new NotFoundException('Categoria invalida'.'error');
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Categoria->delete()) {
            $this->Session->setFlash('La categoria se elimino correctamente.','good');
        } else {
            $this->Session->setFlash('La categoria no se pudo eliminar. Por favor, intente de nuevo.','error');
        }
        return $this->redirect(array('action' => 'index'));
        }else{
            $this->Session->setFlash('Las categorias EXPOSITOR, ACOMPAÑANTE, CONFERENCISTA no se puede eliminar.', 'error');
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function getCategoriesByEvent() {
        $this->layout = "webservices";
        $even_id = $this->request->data["even_id"];
        $options = array(
            "conditions" => array(
                "Categoria.event_id" => $even_id
            ),
            "fields" => array(
                "Categoria.id",
                "Categoria.descripcion as name"
            ),
            "recursive" => 0
        );
        $eventos = $this->Categoria->find("all", $options);
        $log = $this->Categoria->getDataSource()->getLog(false, false);
        //debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $eventos,
                    "_serialize" => array("datos")
                )
        );
    }

}
