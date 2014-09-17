<?php

App::uses('AppController', 'Controller');

/**
 * EventsCategorias Controller
 *
 * @property EventsCategoria $EventsCategoria
 * @property PaginatorComponent $Paginator
 */
class EventsCategoriasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator','RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->EventsCategoria->recursive = 0;
        $this->set('eventsCategorias', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->EventsCategoria->exists($id)) {
            throw new NotFoundException(__('Invalid events categoria'));
        }
        $options = array('conditions' => array('EventsCategoria.' . $this->EventsCategoria->primaryKey => $id));
        $this->set('eventsCategoria', $this->EventsCategoria->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->EventsCategoria->create();
            if ($this->EventsCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('The events categoria has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The events categoria could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->EventsCategoria->Categorium->find('list');
        $events = $this->EventsCategoria->Event->find('list');
        $this->set(compact('categorias', 'events'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->EventsCategoria->exists($id)) {
            throw new NotFoundException(__('Invalid events categoria'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->EventsCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('The events categoria has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The events categoria could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('EventsCategoria.' . $this->EventsCategoria->primaryKey => $id));
            $this->request->data = $this->EventsCategoria->find('first', $options);
        }
        $categorias = $this->EventsCategoria->Categorium->find('list');
        $events = $this->EventsCategoria->Event->find('list');
        $this->set(compact('categorias', 'events'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->EventsCategoria->id = $id;
        if (!$this->EventsCategoria->exists()) {
            throw new NotFoundException(__('Invalid events categoria'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->EventsCategoria->delete()) {
            $this->Session->setFlash(__('The events categoria has been deleted.'));
        } else {
            $this->Session->setFlash(__('The events categoria could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getCategoriasByEvent() {
        $eventId=$this->request->data["event_id"];
        $this->layout = "webservice";
        $datos = $this->EventsCategoria->findAllByEventId($eventId);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }

}
