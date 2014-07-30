<?php

App::uses('AppController', 'Controller');

/**
 * Entradas Controller
 *
 * @property Entrada $Entrada
 * @property PaginatorComponent $Paginator
 */
class EntradasController extends AppController {

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
        $this->Entrada->recursive = 0;
        $this->set('entradas', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Entrada->exists($id)) {
            throw new NotFoundException(__('Invalid entrada'));
        }
        $options = array('conditions' => array('Entrada.' . $this->Entrada->primaryKey => $id));
        $this->set('entrada', $this->Entrada->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('Stage');
        if ($this->request->is('post')) {
            $this->Entrada->create();
            if ($this->Entrada->save($this->request->data)) {
                $this->Session->setFlash(__('The entrada has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The entrada could not be saved. Please, try again.'));
            }
        }
        $escenario = $this->Stage->find('list', array(
            "fields" => array(
                "Stage.esce_nombre"
            )
        ));
        $papers = $this->Entrada->Stage->find('list');
        $categories = $this->Entrada->Categoria->find('list');
        $this->set(compact('papers', 'categories', 'escenario'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Entrada->exists($id)) {
            throw new NotFoundException(__('Invalid entrada'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Entrada->save($this->request->data)) {
                $this->Session->setFlash(__('The entrada has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The entrada could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Entrada.' . $this->Entrada->primaryKey => $id));
            $this->request->data = $this->Entrada->find('first', $options);
        }
        $papers = $this->Entrada->Paper->find('list');
        $categories = $this->Entrada->Category->find('list');
        $this->set(compact('papers', 'categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Entrada->id = $id;
        if (!$this->Entrada->exists()) {
            throw new NotFoundException(__('Invalid entrada'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Entrada->delete()) {
            $this->Session->setFlash(__('The entrada has been deleted.'));
        } else {
            $this->Session->setFlash(__('The entrada could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getEntradasByStage() {
        $this->layout = "webservices";
        $stage_id = $this->request->data["stage_id"];
        $options = array(
            "conditions" => array(
                "Entrada.stage_id" => $stage_id
            ),
            "fields" => array(
                "Entrada.id",
                "Entrada.name"
            ),
            "recursive" => 0
        );
        $eventos = $this->Entrada->find("all", $options);
        $log = $this->Entrada->getDataSource()->getLog(false, false);
        //debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $eventos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function obtenerReporte() {
        $this->layout = "webservices";
//        $entrada_id = $this->request->data["Entrada"]["entrada_id"];
        $entrada_id = 1;
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['Tipo'] = 0;
        $sql = "select count(l_t.tipo) as Entrada__Cantidad , l_t.tipo as Entrada__Tipo from logs_torniquetes l_t, entradas_torniquetes e_t where l_t.torniquete_id=e_t.torniquete_id and e_t.entrada_id=" . $entrada_id . " group by l_t.tipo";
        $datos = $this->Entrada->query($sql);
//        debug($datos);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function obtenerReporteByFecha() {
        $this->layout = "webservices";
//        $entrada_id = $this->request->data["Entrada"]["entrada_id"];
        $entrada_id = 1;
        $this->Entrada->virtualFields['Cantidad'] = 0;
        $this->Entrada->virtualFields['Tipo'] = 0;
        $sql = "select count(l_t.tipo) as Entrada__Cantidad , CONCAT(EXTRACT(MONTH from l_t.fecha),'-',EXTRACT(DAY from l_t.fecha),'-',l_t.tipo) as Entrada__Tipo from logs_torniquetes l_t, entradas_torniquetes e_t where l_t.torniquete_id=e_t.torniquete_id and e_t.entrada_id=" . $entrada_id . " group by (Entrada__Tipo) order by Entrada__tipo";
        $datos = $this->Entrada->query($sql);
//        debug($datos);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

    public function reportes() {
        if ($this->request->is('post')) {
            
        }
        $entrada_id = 1;
            $this->Entrada->virtualFields['Cantidad'] = 0;
            $this->Entrada->virtualFields['formato'] = 0;
            $this->Entrada->virtualFields['Tipo'] = 0;
            $this->Entrada->virtualFields['Fecha'] = 0;
            $sql = "select count(l_t.tipo) as Entrada__Cantidad , CONCAT(EXTRACT(MONTH from l_t.fecha),'-',EXTRACT(DAY from l_t.fecha),'-',l_t.tipo) as Entrada__formato, CONCAT(EXTRACT(MONTH from l_t.fecha),'-',EXTRACT(DAY from l_t.fecha)) as Entrada__Fecha, l_t.tipo as Entrada__Tipo from logs_torniquetes l_t, entradas_torniquetes e_t where l_t.torniquete_id=e_t.torniquete_id and e_t.entrada_id=".$entrada_id." group by (Entrada__formato) order by Entrada__formato";
            $datos = $this->Entrada->query($sql);
//            debug($datos);
            $this->set("datos",$datos);
//            $this->set(
//                    array(
//                        "datos" => $datos,
//                        "_serialize" => array("datos")
//                    )
//            );
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

        $this->set(compact('stages'));
        $entradas = $this->Entrada->find('list');
        $this->set(compact('categorias', 'entradas'));
    }

}
