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
            $fecha = date("y-m-d");
            $gift = $data['GiftsEvent']['gift_id'];
            if ($documento != '' /* && $rfid == '' && $barcode == '' */) {
                $this->loadModel("Person");
                $this->loadModel("Input");
                $r = $this->Person->query("SELECT id FROM people WHERE pers_documento= '$documento'");
                if ($r != array()) {
                    $i = $r[0]['people']['id'];
                    $s = $this->Input->query("SELECT categoria_id FROM inputs WHERE person_id = $i AND event_id = $event_id");
                    if ($s != array()) {
                        $c = $s[0]['inputs']['categoria_id'];
                        $cat = $this->GiftsEvent->query("SELECT id FROM gifts_events WHERE event_id = $event_id AND dia= '$fecha' AND categoria_id = $c AND gift_id = $gift");
                        if ($cat != array()) {
                            $consumible = $this->GiftsEvent->query("SELECT gp.gift_id as id FROM ` gift_events_people` gp INNER JOIN events_categorias e ON e.event_id = gp.event_id WHERE e.categoria_id = $c AND gp.gift_id=$gift AND gp.people_id = $i");
                            if ($consumible == array()) {
                                $t = $this->GiftsEvent->query("SELECT descripcion FROM gifts WHERE id =$gift");
                                $name = $t[0]['gifts']['descripcion'];
                                $mensaje = "Se ha redimido el consumible $name para la fecha $fecha";
                                $sql = "INSERT INTO ` gift_events_people`(`gift_event_id`, `event_id`, `people_id`, `gift_id`) VALUES ($gift,$event_id, $i, $gift)";
                                $this->GiftsEvent->query($sql);
                                $this->Session->setFlash($mensaje, 'good');
                            } else {
                                $this->Session->setFlash('Esta persona ya ha redimido el consumible seleccionado', 'error');
                            }
                        } else {
                            $this->Session->setFlash('Para la categoria de esta persona no existen consumibles', 'error');
                        }
                    } else {
                        $this->Session->setFlash('Esta persona no esta registrada para este evento', 'error');
                    }
                } else {
                    $this->Session->setFlash('Esta persona no esta registrada en al base de datos', 'error');
                }
            } else {
                $this->Session->setFlash('Debe introducir por lo menos un parametro de busqueda', 'error');
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
