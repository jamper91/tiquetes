<?php

App::uses('AppController', 'Controller');

/**
 * Preguntas Controller
 *
 * @property Pregunta $Pregunta
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class PreguntasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Pregunta->recursive = 0;
        $this->set('preguntas', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Pregunta->exists($id)) {
            throw new NotFoundException(__('Invalid pregunta'));
        }
        $options = array('conditions' => array('Pregunta.' . $this->Pregunta->primaryKey => $id));
        $this->set('pregunta', $this->Pregunta->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $Pregunta = $this->request->data['Pregunta']['pregunta'];
            $this->Session->write('Pregunta', $Pregunta);
            return $this->redirect(array('action' => 'addPregunta'));
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
        if (!$this->Pregunta->exists($id)) {
            throw new NotFoundException(__('Invalid pregunta'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Pregunta->save($this->request->data)) {
                $this->Session->setFlash(__('The pregunta has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pregunta could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Pregunta.' . $this->Pregunta->primaryKey => $id));
            $this->request->data = $this->Pregunta->find('first', $options);
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
        $this->Pregunta->id = $id;
        if (!$this->Pregunta->exists()) {
            throw new NotFoundException(__('Invalid pregunta'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Pregunta->delete()) {
            $this->Session->setFlash(__('The pregunta has been deleted.'));
        } else {
            $this->Session->setFlash(__('The pregunta could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function addPregunta() {
        if ($this->request->is('post')) {
            $cuenta = $this->request->data['cuenta'];
            if ($cuenta >= 2) {
                $this->Pregunta->create();
                $newPregunta = array(
                  'pregunta'=>$this->Session->read('Pregunta')
                );
                if ($this->Pregunta->save($newPregunta)) {
                    $pregunta_id = $this->Pregunta->getLastInsertID();
                    $this->loadModel('Respuesta');
                    for ($i = 1; $i <= $cuenta; $i++){
                        $respuestas = array(
                            'respuestas'=>$this->request->data['respuesta'.$i],
                            'pregunta_id' => $pregunta_id
                            );
                        $this->Respuesta->create();
                        $this->Respuesta->save($respuestas);
                    }
                    $this->Session->setFlash(__('La pregunta con sus respuestas fueron registradas'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('La pregunta con sus respuestas no fueron registradas. Por favor, intente nuevamente.'));
                }
            } else {
                $this->Session->setFlash(__('Cada pregunta debe tener al menos 2 respuestas'));
            }
        } else {
            $pregunta = $this->Session->read('Pregunta');
            $this->set(compact('pregunta'));
        }
    }

}
