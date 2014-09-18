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

            $this->GiftsEvent->create();
            if ($this->GiftsEvent->save($this->request->data)) {
                $this->Session->setFlash(__('The gifts event has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gifts event could not be saved. Please, try again.'));
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
//        $categorias = $this->GiftsEvent->Categoria->find('list', array(
//            "fields" => array(
//                "Categoria.descripcion"
//            )
//        ));
        $people = $this->GiftsEvent->People->find('list');
        $this->set(compact('gifts', 'events', 'categorias', 'people'));
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
            if ($this->GiftsEvent->save($this->request->data)) {
                $this->Session->setFlash(__('The gifts event has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gifts event could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('GiftsEvent.' . $this->GiftsEvent->primaryKey => $id));
            $this->request->data = $this->GiftsEvent->find('first', $options);
        }
        $gifts = $this->GiftsEvent->Gift->find('list');
        $events = $this->GiftsEvent->Event->find('list');
        $categorias = $this->GiftsEvent->Categorium->find('list');
        $people = $this->GiftsEvent->Person->find('list');
        $this->set(compact('gifts', 'events', 'categorias', 'people'));
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

}
