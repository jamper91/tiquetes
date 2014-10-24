<?php

App::uses('AppController', 'Controller');

/**
 * Validations Controller
 *
 * @property Validation $Validation
 * @property PaginatorComponent $Paginator
 */
class ValidationsController extends AppController {

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
        $this->Validation->recursive = 0;
        $this->set('validations', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Validation->exists($id)) {
            throw new NotFoundException(__('Invalid validation'));
        }
        $options = array('conditions' => array('Validation.' . $this->Validation->primaryKey => $id));
        $this->set('validation', $this->Validation->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('Event');
        $this->loadModel('CategoriasEntrada');
        if ($this->request->is('post')) {
//            $this->request->data["Validation"]["categoria_id"] = 2;
            $event_id = $this->request->data['Validation']['event_id'];


//insert of categorias_entradas
            //consultar los dias del evento
            $sql = "SELECT datediff(`even_fechFinal`, `even_fechInicio`) AS cantidad FROM `events` e WHERE `id` = $event_id";
            $cantidad = $this->Validation->query($sql);
            $total = $cantidad[0][0]['cantidad']+1;
            $sql2 = "SELECT even_fechInicio FROM events WHERE id = $event_id";
            $fecha = $this->Validation->query($sql2);
            $date = $fecha[0]['events']['even_fechInicio'];
            $f = date('Y-m-d', strtotime($date));
//       debug($date ." asdasdasd   ".$f);die;
            $dias = array();
            for ($i = 0; $i < $total; $i++) {
                $dias[$i]['g']['id'] = $f;
                $dias[$i]['g']['name'] = $f;
                $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));
            }
//            debug($dias);
//            die;
            $sw = 0;
            
            foreach ($dias as $dia) {
//                debug($dia);
//            die;
                $sw = $sw + 1;
                $newValidation = $this->Validation->create();
                $newValidation = array(
                    'Validation' => array(
                        'descripcion' => 'GENERAL',
                        'fechainicio' => $dia['g']['id'],
                        'fechafin' => $dia['g']['id'],
                        'cantidad_reingresos' => $this->request->data['Validation']['cantidad_reingresos'],
                        'entrada_id' => $this->request->data['Validation']['entrada_id'],
                        'categoria_id' => $this->request->data['Validation']['categoria_id']
                    )
                );
                $this->Validation->save($newValidation);
            }
            //insert de validaciones

            if ($sw == $total) {
                $sql = "SELECT id FROM categorias_entradas WHERE categoria_id=" . $this->request->data['Validation']['categoria_id'] . " AND entrada_id=" . $this->request->data['Validation']['entrada_id'] . " AND event_id=".$event_id.";";
                $ceid = $this->Validation->query($sql);
                $x = '';
                
                if ($ceid != array()) {
                    $x = $ceid[0]['categorias_entradas']['id'];
                }
                if ($x == '') {
                    if ($this->request->data['Validation']['categoria_id'] != "") {
                        $newCategoriasEntrada = $this->CategoriasEntrada->create();
                        $newCategoriasEntrada = array(
                            'CategoriasEntrada' => array(
                                'entrada_id' => $this->request->data['Validation']['entrada_id'],
                                'categoria_id' => $this->request->data['Validation']['categoria_id'],
                                'event_id'=> $event_id
                            )
                        );
                        $this->CategoriasEntrada->save($newCategoriasEntrada);
                    }
                }
                $this->Session->setFlash('La validacion se creo correctamente.', 'good');
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash('La validacion no se pudo crear. Por favor, intente nuevamente.', 'error');
            }
        }
        $events = $this->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "conditions" => array(
                "Event.even_fechFinal >= NOW()"
            )
        ));

        $this->set(compact('events', 'entradas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Validation->exists($id)) {
            throw new NotFoundException(__('Invalid validation'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Validation->save($this->request->data)) {
                $this->Session->setFlash(__('The validation has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The validation could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Validation.' . $this->Validation->primaryKey => $id));
            $this->request->data = $this->Validation->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Validation->id = $id;
        if (!$this->Validation->exists()) {
            throw new NotFoundException(__('Invalid validation'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Validation->delete()) {
            $this->Session->setFlash(__('The validation has been deleted.'));
        } else {
            $this->Session->setFlash(__('The validation could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
