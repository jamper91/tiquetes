<?php

App::uses('AppController', 'Controller');

/**
 * EntradasTorniquetes Controller
 *
 * @property EntradasTorniquete $EntradasTorniquete
 * @property PaginatorComponent $Paginator
 */
class EntradasTorniquetesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->EntradasTorniquete->recursive = 0;
//        $sql = "SELECT EntradasTorniquete.id, Stage.esce_nombre, Entrada.name, Torniquete.name FROM entradas_torniquetes EntradasTorniquete INNER JOIN entradas Entrada ON Entrada.id=EntradasTorniquete.entrada_id INNER JOIN torniquetes Torniquete ON Torniquete.id=EntradasTorniquete.torniquete_id INNER JOIN stages Stage ON Stage.id = Entrada.stage_id";
//        $entradasTorniquetes = $this->EntradasTorniquete->query($sql);
        $this->set('entradasTorniquetes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->EntradasTorniquete->exists($id)) {
            throw new NotFoundException(__('Invalid entradas torniquete'));
        }
        $options = array('conditions' => array('EntradasTorniquete.' . $this->EntradasTorniquete->primaryKey => $id));
        $this->set('entradasTorniquete', $this->EntradasTorniquete->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $newEntrada = $data['EntradasTorniquete']['entrada_id'];
            $newTorniquete = $data['EntradasTorniquete']['torniquete_id'];
            //inicio multiselect
//            $sqlOld = "DELETE FROM entradas_torniquetes WHERE entrada_id=" . $newEntrada;
//                $this->EntradasTorniquete->query($sqlOld);
//            if ($data['EntradasTorniquete']['torniquete_id'] != "") {
//                foreach ($data['EntradasTorniquete']['torniquete_id'] as $Torniquete_id) {
//                    $newEntradasTorniquete = $this->EntradasTorniquete->create();
//                    $newEntradasTorniquete = array(
//                        'EventsCategoria' => array(
//                            'torniquete_id' => $Torniquete_id,
//                            'entrada_id' => $newEntrada
//                        )
//                    );
//                    $this->EntradasTorniquete->save($newEntradasTorniquete);                    
//                }
//            }
//            $this->Session->setFlash('The entradas torniquete has been saved.', 'good');
//            return $this->redirect(array('action' => 'index'));
//            fin de multiselect
//            
//            $sql="SELECT id FROM entradas_torniquetes WHERE entrada_id = $newEntrada AND torniquete_id = $newTorniquete";
            $this->EntradasTorniquete->create();
            if ($this->EntradasTorniquete->save($this->request->data)) {
                $this->Session->setFlash(__('The entradas torniquete has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The entradas torniquete could not be saved. Please, try again.'));
            }
        }
        $stages = $this->EntradasTorniquete->Entrada->Stage->find('list', array(
            "fields" => array(
                "Stage.esce_nombre"
            ),
            "recursive" => -2
        ));
//        $entradas = $this->EntradasTorniquete->Entrada->find('list');
//        $torniquetes = $this->EntradasTorniquete->Torniquete->find('list');
        $this->set(compact('entradas', 'torniquetes', 'stages'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null,$stage_id=null) {
        if (!$this->EntradasTorniquete->exists($id)) {
            throw new NotFoundException(__('Invalid entradas torniquete'));
        }

        if ($this->request->is(array('post', 'put'))) {

            $data = $this->request->data;
            $newEntrada = $data['EntradasTorniquete']['entrada_id'];
            $newTorniquete = $data['EntradasTorniquete']['torniquete_id'];
            $y = '';
            $sqlOld = "SELECT id FROM entradas_torniquetes WHERE entrada_id= $newEntrada AND torniquete_id = $newTorniquete";
            $upd = $this->EntradasTorniquete->query($sqlOld);
            if ($upd != array()) {
                if ($upd[0]['entradas_torniquetes']['id'] != $id) {
                    $y = $upd[0]['entradas_torniquetes']['id'];
                }
            }
            if ($y == '') {
                if ($this->EntradasTorniquete->save($this->request->data)) {
                    $this->Session->setFlash('El acceso se asigno correctamente a la entrada.', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('El acceso asignado a la entrada no se pudo actualizar. Por favor, intente nuevamente.', 'error');
                }
            } else {
                $this->Session->setFlash('El Acceso ya se asigno a una entrada. Por favor, intenta.', 'error');
            }
        } else {
            $options = array('conditions' => array('EntradasTorniquete.' . $this->EntradasTorniquete->primaryKey => $id));
            $this->request->data = $this->EntradasTorniquete->find('first', $options);
        }
//        
//            
//             

        $e = $this->EntradasTorniquete->Entrada->query("SELECT id,name FROM entradas WHERE stage_id=$stage_id");
        $entradas=array();
        foreach ($e as $key => $entrada) {
            $entradas[$entrada['entradas']['id']]=$entrada['entradas']['name'];
        }
//        $entradas = $this->EntradasTorniquete->Entrada->find('list');
//        debug($entradas);die;
//        $this->loadModel('Stage');
//        $datos=$this->Stage->find('all',array(
//            'recursive'=>4,
//            'conditions'=>array(
//                'Stage.id'=>$stage_id
//            )
//        ));
//        debug($datos);die;
        $t = $this->EntradasTorniquete->Torniquete->query("SELECT t.id,t.name FROM torniquetes t INNER JOIN entradas_torniquetes et ON et.torniquete_id=t.id INNER JOIN entradas e ON e.id= et.entrada_id WHERE e.stage_id=$stage_id AND et.id=$id");
        $torniquetes=array();
        foreach ($t as $key => $entrada) {
            $torniquetes[$entrada['t']['id']]=$entrada['t']['name'];
        }
        $this->set(compact('entradas', 'torniquetes'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->EntradasTorniquete->id = $id;
        if (!$this->EntradasTorniquete->exists()) {
            throw new NotFoundException(__('Invalid entradas torniquete'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->EntradasTorniquete->delete()) {
            $this->Session->setFlash(__('The entradas torniquete has been deleted.'));
        } else {
            $this->Session->setFlash(__('The entradas torniquete could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function seleccion() {
        $this->loadModel('Country');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            ),
            "recursive" => -2
        ));
        $this->set(compact('countriesName'));
        $this->set(compact('state'));
        $this->set(compact('cities'));
        $this->set(compact('stages'));
        if ($this->request->is('post')) {
            $data = $this->data;
            $this->redirect(array('action' => 'add', '?' => array(
                    'stage_id' => $data['entradastorniquete']['stage_id'])));
        }
    }

}
