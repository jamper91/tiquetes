<?php

App::uses('AppController', 'Controller');

/**
 * Torniquetes Controller
 *
 * @property Torniquete $Torniquete
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TorniquetesController extends AppController {

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
        $this->Torniquete->recursive = 0;
        $this->set('torniquetes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Torniquete->exists($id)) {
            throw new NotFoundException(__('Invalid torniquete'));
        }
        $options = array('conditions' => array('Torniquete.' . $this->Torniquete->primaryKey => $id));
        $this->set('torniquete', $this->Torniquete->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $sql = "SELECT id FROM `Torniquetes` WHERE name ='" . strtoupper($this->request->data['Torniquete']['name']) . "'"; //
            $id = $this->Torniquete->query($sql);
            debug($id);
//            die;
            $x = "";
            if ($id != array())
                $x = $id[0]['Torniquetes']['id'];
            if ($x == "") {
                $this->Torniquete->create();
                $this->request->data['Torniquete']['name'] = strtoupper($this->request->data['Torniquete']['name']);
                if ($this->Torniquete->save($this->request->data)) {
                    $this->Session->setFlash('El acceso se creo correctamente.', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('El acceso no se pudo crear. Por favor, intente de nuevo.', 'error');
                }
            } else {
                $this->Session->setFlash('El acceso ya esta creado. Por favor, intente de nuevo.', 'error');
            }
        }
        $entradas = $this->Torniquete->Entrada->find('list');
        $this->set(compact('entradas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Torniquete->exists($id)) {
            throw new NotFoundException(__('Invalid torniquete'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $x = '';
            $sql = "SELECT id FROM `torniquetes` WHERE name ='" . strtoupper($this->request->data['Torniquete']['name']) . "'"; //
            $torn = $this->Torniquete->query($sql);
            if ($torn != array()) {
                if ($torn[0]['torniquetes']['id'] == $id) {
                    $x = '';
                } else {
                    $x = $torn[0]['torniquetes']['id'];
                }
            }
            $this->request->data['Torniquete']['name'] = strtoupper($this->request->data['Torniquete']['name']);
//            debug($torn);die;
            if ($x != '') {
                $this->Session->setFlash('El acceso ' . strtoupper($this->request->data['Torniquete']['name']) . ' ya esta creado no se pudo modificar. Por favor, intente de nuevo.', 'error');
            } elseif ($this->Torniquete->save($this->request->data)) {
                $this->Session->setFlash('El acceso se edito con exito.', 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El acceso no pudo ser actualizado. Por favor, intente nuevamente.', 'error'));
            }
        } else {
            $options = array('conditions' => array('Torniquete.' . $this->Torniquete->primaryKey => $id));
            $this->request->data = $this->Torniquete->find('first', $options);
        }
        $entradas = $this->Torniquete->Entrada->find('list');
        $this->set(compact('entradas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Torniquete->id = $id;
        if (!$this->Torniquete->exists()) {
            throw new NotFoundException(__('Invalid torniquete'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Torniquete->delete()) {
            $this->Session->setFlash(__('The torniquete has been deleted.'));
        } else {
            $this->Session->setFlash(__('The torniquete could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function getTorniquetesByStage() {
        $this->layout = "webservices";
        $entrada_id = $this->request->data["stage_id"];
        $options = "SELECT Torniquete.id, Torniquete.name FROM `torniquetes` Torniquete WHERE Torniquete.id not in (SELECT t.`id` FROM `torniquetes` t INNER JOIN `entradas_torniquetes` et ON et.torniquete_id =t.id INNER JOIN `entradas` e ON e.id=et.entrada_id WHERE e.stage_id = $entrada_id)";
        $eventos = $this->Torniquete->query($options);
//        $log = $this->Torniquete->getDataSource()->getLog(false, false);
        //debug($log);
        $this->set(
                array(
                    "datos" => $eventos,
                    "_serialize" => array("datos")
                )
        );
    }

}
