<?php

App::uses('AppController', 'Controller');

/**
 * Activities Controller
 *
 * @property Activity $Activity
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ActivitiesController extends AppController {

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
        $this->Activity->recursive = 0;
        $this->set('activities', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Activity->exists($id)) {
            throw new NotFoundException(__('Invalid activity'));
        }
        $options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
        $this->set('activity', $this->Activity->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel("Event");
        if ($this->request->is('post')) {
            $datos = $this->request->data;
            try {
                if ($this->Activity->save($this->request->data)) {
                    $this->Session->setFlash('Actividad creada con exito', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {

                    $this->Session->setFlash('Error al registrar la actividad', 'error');
                }
            } catch (Exception $ex) {
                $error2 = $ex->getCode();
                if ($error2 == '23000') {
                    $this->Session->setFlash('Error ya hay una Actividad con el mismo nombre en la base de datos', 'error');
                }
            }
        }
        $hoy = date("Y-m-d");
        $options = array(
            "conditions" => array(
                "Event.even_fechFinal>='$hoy'"
            ),
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "recursive" => 0
        );
        $eventos = $this->Event->find("list", $options);
        $this->set(compact('eventos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->loadModel('Event');
        $this->loadModel('Stage');
        $this->loadModel('Location');
        if (!$this->Activity->exists($id)) {
            throw new NotFoundException(__('Invalid activity'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Activity->save($this->request->data)) {
                $this->Session->setFlash(__('The activity has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The activity could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
            $this->request->data = $this->Activity->find('first', $options);
        }
        $hoy = date("Y-m-d");
        $options = array(
            "conditions" => array(
                "Event.even_fechFinal>='$hoy'"
            ),
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "recursive" => 0
        );
        $eventos = $this->Event->find("list", $options);
        foreach ($eventos as $key => $value) {
            $event_id = $key;
        }
        $sql = "SELECT datediff(`even_fechFinal`, `even_fechInicio`) AS cantidad FROM `events` e WHERE `id` = $event_id";
        $cantidad = $this->Event->query($sql);
        $total = $cantidad[0][0]['cantidad'];
        $sql2 = "SELECT even_fechInicio FROM events WHERE id = $event_id";
        $fecha = $this->Event->query($sql2);
        if ($fecha != array()) {
            $date = $fecha[0]['events']['even_fechInicio'];
            $f = date('Y-m-d', strtotime($date));
        }
        $dias = array();

        if ($total > 0) {
            for ($i = 0; $i <= $total; $i++) {
                $dias[$f] = $f;
                $dias[$f] = $f;
                $f = date('Y-m-d', strtotime('+1 days', strtotime($f)));
            }
        }

        $this->set(compact('eventos', 'datos', 'locaciones', 'dias', 'id'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Activity->id = $id;
        if (!$this->Activity->exists()) {
            throw new NotFoundException(__('Invalid activity'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Activity->delete()) {
            $this->Session->setFlash(__('The activity has been deleted.'));
        } else {
            $this->Session->setFlash(__('The activity could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function preregistro() {
        $eve = $this->Session->read('event_id');
        if ($eve != null) {
            $this->loadModel("Event");
            $this->loadModel('Input');
            if ($this->request->is('post')) {
//                debug($this->request->data);die;
                $activity_id = $this->request->data['Activity']['activity_id'];
                $c = $this->Activity->query("select `id`, count(*) as total FROM `cupos_activities` WHERE `activity_id`= $activity_id AND activo = true group by `activity_id`");
                $a = $this->Activity->find('list', array('conditions' => array("Activity.id=$activity_id"), 'fields' => array("Activity.aforo")));
                $aforo = 0;
                $ocupado = 0;
                $cupo = 0;
                if ($a != array()) {
                    foreach ($a as $key => $value) {
                        $aforo = $value;
                    }
                }if ($c != array()) {
                    $ocupado = $c [0][0]['total'];
                }
                $cupo = $aforo - $ocupado;
                if ($cupo != 0) {
                    $escar = $this->request->data['Activity']['escarapela'];
                    $documento = $this->request->data['Activity']['documento'];
                    if ($escar != '') {
                        $escarapela = substr($escar, 0, -1);
                        $pers = $this->Input->find('list', array('conditions' => array("Input.event_id = $eve")));
                        if ($pers != array()) {
                            foreach ($pers as $key => $value) {
                                $pers_id = $value;
                            }
                            $p = $this->Input->find('list', array('conditions' => array("Input.entr_codigo = $escarapela"), 'fields' => array('Input.id')));
                            if ($p != array()) {
                                foreach ($p as $key => $value) {
                                    $input_id = $value;
                                }
                                $control = $this->Activity->query("SELECT id FROM `cupos_activities` WHERE input_id = $input_id");
                                if ($control == array()) {
                                    $this->Activity->query("INSERT INTO `cupos_activities`(`activity_id`, `input_id`, `activo`) VALUES ($activity_id, $input_id, true)");
                                    $cupo = $cupo - 1;
                                    $this->Session->setFlash("Registro Exitoso quedan $cupo cupos", 'good');
                                    return $this->redirect(array('action' => 'preregistro'));
                                } else {
                                    $this->Session->setFlash("Persona ya registrada para esta actividad", 'error');
                                    return $this->redirect(array('action' => 'preregistro'));
                                }
                            } else {
                                $this->Session->setFlash('Código de barras invalido para este evento', 'error');
                                return $this->redirect(array('action' => 'preregistro'));
                            }
                        }
                    } else if ($documento != '') {
                        $i = $this->Input->query("SELECT i.`id` FROM `inputs` i INNER JOIN people p ON i.person_id = p.id WHERE p.pers_documento = '$documento' AND i.event_id = $eve ");
                        if ($i != array()) {
                            $input_id = $i[0]['i']['id'];
                            $control = $this->Activity->query("SELECT id FROM `cupos_activities` WHERE input_id = $input_id");
                            if ($control == array()) {
                                $this->Activity->query("INSERT INTO `cupos_activities`(`activity_id`, `input_id`, `activo`) VALUES ($activity_id, $input_id, true)");
                                $cupo = $cupo - 1;
                                $this->Session->setFlash("Registro Exitoso quedan $cupo cupos", 'good');
                                return $this->redirect(array('action' => 'preregistro'));
                            } else {
                                $this->Session->setFlash("Persona ya registrada para esta actividad", 'error');
                                return $this->redirect(array('action' => 'preregistro'));
                            }
                        }
                    } else {
                        $this->Session->setFlash('Por favor ingrese un codigo de barras o un numero de documento para realizar el registro', 'error');
                        return $this->redirect(array('action' => 'preregistro'));
                    }
                } else {
                    $this->Session->setFlash('No quedan mas cupos disponibles para la actividad', 'error');
                    return $this->redirect(array('action' => 'preregistro'));
                }
            }
            $hoy = date('y-m-d');
            $options = array(
                "conditions" => array(
                    "Activity.event_id =$eve",
                    "Activity.aforo <> 0",
                    "Activity.fecha >= $hoy"
                ),
                "fields" => array(
                    "Activity.id",
                    "Activity.nombre"
                ),
                "recursive" => 0
            );
            $actividades = $this->Activity->find("list", $options);
            $this->set(compact('actividades'));
        } else {
            $this->Session->setFlash('Seleccione el evento al que desea realizar registros y confirme', 'error');
            return $this->redirect(array('action' => '../Pages/display'));
        }
    }

}
