<?php

App::uses('AppController', 'Controller');

/**
 * Gifts Controller
 *
 * @property Gift $Gift
 * @property PaginatorComponent $Paginator
 */
class GiftsController extends AppController {

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
        $this->Gift->recursive = 0;
        $this->set('gifts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Gift->exists($id)) {
            throw new NotFoundException(__('Invalid gift'));
        }
        $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
        $this->set('gift', $this->Gift->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Gift->create();
            if ($this->Gift->save($this->request->data)) {
                $this->Session->setFlash(__('The gift has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gift could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Gift->exists($id)) {
            throw new NotFoundException(__('Invalid gift'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Gift->save($this->request->data)) {
                $this->Session->setFlash(__('The gift has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gift could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
            $this->request->data = $this->Gift->find('first', $options);
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
        $this->Gift->id = $id;
        if (!$this->Gift->exists()) {
            throw new NotFoundException(__('Invalid gift'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Gift->delete()) {
            $this->Session->setFlash(__('The gift has been deleted.'));
        } else {
            $this->Session->setFlash(__('The gift could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /*
     * Metodo que devuelve los consumibles que no hayan sido asigandos a un evento
     *         
     */

    public function getGiftWhitoutEvent() {
        $this->layout = "webservices";
        $this->loadModel("Gift");
        $event = $this->request->data["event_id"];
        $sql = "SELECT g.`id`, g.`descripcion` AS name FROM `gifts` g WHERE g.`id` NOT IN(SELECT `gift_id` FROM `gifts_events` WHERE `event_id` = $event)";
        $Gift = $this->Gift->query($sql);
        $this->set(
                array(
                    "datos" => $Gift,
                    "_serialize" => array("datos")
                )
        );
    }

}
