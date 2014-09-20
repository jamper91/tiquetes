<?php

App::uses('AppController', 'Controller');

/**
 * Forms Controller
 *
 * @property Form $Form
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FormsController extends AppController {

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
        $this->Form->recursive = 0;
        $this->set('forms', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Form->exists($id)) {
            throw new NotFoundException(__('Invalid form'));
        }
        $options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
        $this->set('form', $this->Form->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            //debug($this->request->data);
            $this->Form->create();
            if ($this->Form->save($this->request->data)) {
                
                $this->Session->setFlash(__('The form has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The form could not be saved. Please, try again.'));
            }
        }
        $ev = $this->Form->Event->query("SELECT `id`, `even_nombre` FROM `events` WHERE `even_fechFinal` >= NOW() AND `id` NOT  IN(SELECT `event_id` FROM `forms`)");
//        $events = $this->Form->Event->find('list', array(
//            "fields" => array(
//                "Event.id",
//                "Event.even_nombre"
//            ),
//            "conditions" => array(
//                "Event.even_fechFinal >= NOW()"
//            )
//        ));
        $events= array();
        foreach ($ev as $key => $e) {
            $events[$e['events']['id']]=$e['events']['even_nombre'];
        }
//        debug($events); die;
        $personalData = $this->Form->PersonalDatum->find('list', array(
            "fields" => array(
                "PersonalDatum.id",
                "PersonalDatum.descripcion"
            )
        ));
        $this->set(compact('events', 'personalData'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Form->exists($id)) {
            throw new NotFoundException(__('Invalid form'));
        }
        if ($this->request->is(array('post', 'put'))) {
            debug($this->request->data);
            if ($this->Form->save($this->request->data)) {
//                $this->Session->setFlash(__('The form has been saved.'));
                $this->Session->setFlash('Formulario Actualizado con exito', 'good');
                //return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('El formulario no pudo ser actualizado con exito', 'error');
            }
        } else {
            $options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
            $this->request->data = $this->Form->find('first', $options);
        }

        $events = $this->Form->Event->find('list', array(
            "fields" => array(
                "Event.id",
                "Event.even_nombre"
            )
        ));
        $personalData = $this->Form->PersonalDatum->find('list', array(
            "fields" => array(
                "PersonalDatum.id",
                "PersonalDatum.descripcion"
            )
        ));
        $this->set(compact('events', 'personalData'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Form->id = $id;
        if (!$this->Form->exists()) {
            throw new NotFoundException(__('Invalid form'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Form->delete()) {
            $this->Session->setFlash(__('The form has been deleted.'));
        } else {
            $this->Session->setFlash(__('The form could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
