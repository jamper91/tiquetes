<?php

App::uses('AppController', 'Controller');

/**
 * GiftsEvents Controller
 *
 * @property GiftsEvent $GiftsEvent
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class GiftsEventsController extends AppController {

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
        $this->GiftsEvent->recursive = 0;
        $this->set('giftsEvents', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->GiftsEvent->exists($id)) {
            throw new NotFoundException(__('Invalid gifts event'));
        }
        $options = array('conditions' => array('GiftsEvent.' . $this->GiftsEvent->primaryKey => $id));
        $this->set('giftsEvent', $this->GiftsEvent->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel("Categoria");
        $this->loadModel("People");
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $event_id = $data['GiftsEvent']['event_id'];
            $categoria_id = $data['GiftsEvent']['categoria_id'];
            $gift_id = $data['GiftsEvent']['gift_id'];
            $dia = $data['GiftsEvent']['dia'];
            $res = $this->GiftsEvent->query("SELECT `id` FROM `gifts_events` WHERE `gift_id` = $gift_id AND `event_id` = $event_id AND `categoria_id` = $categoria_id AND`dia` ='$dia'");
            if ($res == array()) {
                $this->GiftsEvent->create();
                if ($this->GiftsEvent->save($this->request->data)) {
                    $this->Session->setFlash('Se registro el consumible para el evento.', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The gifts event could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash('Para el evento seleccionado, ya se asigno el cosnumible seleccionado para la categoria seleccionada en el día seleccionado.', 'error');
            }
        }

        $events = $this->GiftsEvent->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "conditions" => array(
                "Event.even_fechFinal >= NOW()"
            )
        ));
        $gifts = $this->GiftsEvent->Gift->find('list', array(
            "fields" => array(
                "Gift.descripcion"
            )
        ));
//        $people = $this->GiftsEvent->People->find('list');
        $this->set(compact('gifts', 'events'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {

        if (!$this->GiftsEvent->exists($id)) {
            throw new NotFoundException(__('Invalid gifts event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;
//            debug($data);die;
            $event_id = $data['event'];
            CakeSession::write('idEvent', $event_id);
            $categoria_id = $data['GiftsEvent']['categoria_id'];
            $gift_id = $data['GiftsEvent']['gift_id'];
            $dia = $data['GiftsEvent']['dia'];
            $res = $this->GiftsEvent->query("SELECT `id` FROM `gifts_events` WHERE `gift_id` = $gift_id AND `event_id` = $event_id AND `categoria_id` = $categoria_id AND`dia` ='$dia'");
            if ($res == array()) {
                if (!$this->GiftsEvent->query("UPDATE `gifts_events` SET `gift_id`=$gift_id,`event_id`=$event_id,`categoria_id`=$categoria_id,`dia`='$dia' WHERE `id` = $id")) {
                    CakeSession::delete('idEvent');
                    $this->Session->setFlash('Se actualizo el consumible para el evento', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The gifts event could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash('Para este evento ya se asigno el cosnumible seleccionado para la categoria seleccionada en  este dia', 'error');
            }
        } else {
            $options = array('conditions' => array('GiftsEvent.' . $this->GiftsEvent->primaryKey => $id));
            $this->request->data = $this->GiftsEvent->find('first', $options);
        }
        $this->loadModel("Person");
        $gifts = $this->GiftsEvent->Gift->find('list', array(
            "fields" => array(
                "Gift.id",
                "Gift.descripcion"
            ),
        ));
        $events = $this->GiftsEvent->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "conditions" => array(
                "Event.even_fechFinal >= NOW()"
            )
        ));
        $event = $this->GiftsEvent->Event->query("SELECT DISTINCT  e.`id` FROM `events` e INNER JOIN gifts_events g ON e.id = g.event_id WHERE  g.id = $id");
        $ev = $event[0]['e']['id'];
        $cate = $this->GiftsEvent->Categoria->query("SELECT c. id, c.`descripcion` AS name FROM `categorias` c INNER JOIN `events_categorias` e ON e.`categoria_id` = c.`id` WHERE e.`event_id` = $ev order by c.`descripcion` asc ");
        $cat = array();
        $long = count($cate);
        for ($i = 0; $i < $long; $i++) {
            $cat[$cate[$i]['c']['id']] = $cate[$i]['c']['name'];
        }

//        debug($cat); debug($dia);
        $this->set(compact('gifts', 'events', 'cat', 'dia'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->GiftsEvent->id = $id;
        if (!$this->GiftsEvent->exists()) {
            throw new NotFoundException(__('Invalid gifts event'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->GiftsEvent->delete()) {
            $this->Session->setFlash(__('The gifts event has been deleted.'));
        } else {
            $this->Session->setFlash(__('The gifts event could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function redimirGift() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $event_id = $data['GiftsEvent']['event_id'];
            $documento = $data['GiftsEvent']['documento'];
//            $rfid = $data['GiftsEvent']['rfid'];
//            $barcode = $data['GiftsEvent']['barcode'];
            $fecha = date("2014-09-19");
            $gift = $data['GiftsEvent']['gift_id'];
//            debug($data);die;
            if ($documento == '' && $rfid == '' && $barcode == '') {
                $this->Session->setFlash('Debe por lo menos ingresar un parametro de busqueda', 'error');
            } else {
                if ($documento != '') {
                    $this->loadModel("Person");
                    $this->loadModel("Input");
                    $people_id = $this->Person->query("SELECT id FROM people WHERE pers_documento = $documento");
                    $id = $people_id[0]['people']['id'];
//                    debug($id); die;
                    $g = $this->Person->query("SELECT id FROM `gifts_events` WHERE gift_id = $gift AND event_id = $event_id");
                    $ge = $g[0]['gifts_events']['id'];
                    $p = $this->Person->query("SELECT id FROM ` gift_events_people` WHERE gift_event_id = $ge AND event_id = $event_id AND people_id = $id");
                    $c = $this->Input->query("SELECT categoria_id FROM inputs WHERE person_id = $id AND event_id = $event_id");
                    if ($p == array()) {
                        if ($people_id != array()) {
                            $in = $this->Input->query("SELECT id FROM inputs WHERE person_id = $id AND event_id =$event_id");
                            if ($in != array()) {
                                 $cat = $c[0]['inputs']['categoria_id'];
                                $consumible = $this->GiftsEvent->Event->query("SELECT DISTINCT id, descripcion FROM gifts WHERE id NOT IN (SELECT DISTINCT g.`id` FROM gifts g     INNER JOIN gifts_events ge ON ge.gift_id = g.id     INNER JOIN ` gift_events_people` gp ON gp.gift_event_id = ge.id     WHERE gp.event_id = $event_id AND gp.people_id = $id AND ge.dia ='$fecha' AND ge.categoria_id = $cat AND g.id = $gift )");
//                            $consumible = $this->GiftsEvent->Event->query("SELECT `id`, `descripcion` FROM `gifts` WHERE `id` NOT IN (SELECT gi.`id` FROM `gifts` gi  INNER JOIN `gifts_events` g ON gi.id = g.gift_id INNER JOIN `inputs` i ON i.event_id =g.`event_id`  INNER JOIN ` gift_events_people` ge ON ge.`gift_id` = g.`id`  INNER JOIN `people` p ON p.id = ge.`people_id`  INNER JOIN `events_categorias` e ON e.categoria_id = i.categoria_id  WHERE p.`pers_documento` ='$documento' AND i.event_id = $event_id AND g.`dia`='$fecha' AND g.id = $gift)");
//                        debug($consumible); die;
                                if ($consumible != array()) {
//                            $gift = $consumible[0]['gifts']['id'];
                                    $name = $consumible[0]['gifts']['descripcion'];
                                    $mensaje = "Se ha redimido el consumible $name para la fecha $fecha";
                                    $sql = "INSERT INTO ` gift_events_people`(`gift_id`, `event_id`, `people_id`) VALUES ($gift,$event_id, $id)";
                                    $this->GiftsEvent->query($sql);
                                    $this->Session->setFlash($mensaje, 'good');
                                } else {
                                    $this->Session->setFlash('No existe consumible disponible para esta persona', 'error');
                                }
                            }else{
                                 $this->Session->setFlash('La persona no se encuentra registrada para este evento', 'error');
                            }
                        } else {
                            $this->Session->setFlash('Esta persona no esta registrada en al base de datos', 'error');
                        }
                    } else {
                        $this->Session->setFlash('El consumible seleccionado ya fue redimido por esta persona', 'error');
                    }
                }
            }
        }
        $events = $this->GiftsEvent->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            ),
            "conditions" => array(
                "Event.even_fechFinal >= NOW()"
            )
        ));
        $this->set(compact('events'));
    }

    public function getGiftsByEvent() {
        $this->layout = "webservices";
        $event_id = $this->request->data["event_id"];
//        debug($event_id);
        $gifts = $this->GiftsEvent->query("SELECT DISTINCT g.`id`, g.`descripcion` AS name FROM `gifts` g INNER JOIN gifts_events ge ON ge.gift_id = g.id WHERE ge.event_id = $event_id");
//        debug($gifts);
        $this->set(
                array(
                    "datos" => $gifts,
                    "_serialize" => array("datos")
                )
        );
    }

}
