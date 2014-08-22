<?php
App::uses('AppController', 'Controller');
/**
 * CommitteesEventsPeople Controller
 *
 * @property CommitteesEventsPerson $CommitteesEventsPerson
 * @property PaginatorComponent $Paginator
 */
class CommitteesEventsPeopleController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CommitteesEventsPerson->recursive = 0;
		$this->set('committeesEventsPeople', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CommitteesEventsPerson->exists($id)) {
			throw new NotFoundException(__('Invalid committees events person'));
		}
		$options = array('conditions' => array('CommitteesEventsPerson.' . $this->CommitteesEventsPerson->primaryKey => $id));
		$this->set('committeesEventsPerson', $this->CommitteesEventsPerson->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CommitteesEventsPerson->create();
			if ($this->CommitteesEventsPerson->save($this->request->data)) {
				$this->Session->setFlash(__('The committees events person has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The committees events person could not be saved. Please, try again.'));
			}

		}

		$this->loadModel('Events');
        $events = $this->Events->find('list', array(
            'fields' => array(
                "Events.even_nombre"
            )
        ));
        $this->set('events', $events);
	}


	public function getCommitteesByEvent()
	{
		$this->loadModel('CommitteesEvent');
		$this->loadModel('Committees');
		$this->layout = "webservices";
        $event_id = $this->request->data["event_id"];
        $sql = "SELECT Committee.id, Committee.nombre as name FROM committees Committee INNER JOIN  committees_events ce ON Committee.id=ce.committee_id WHERE ce.event_id =".$event_id;
        $respuesta = $this->CommitteesEvent->query($sql);
        
        // debug($respuesta);
       
        // 
        // //debug($comites);
     
        // 	debug("mensaje".$comite);
        
        $this->set(
                array(
                    "datos" => $respuesta,
                    "_serialize" => array("datos")
                )
        );

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CommitteesEventsPerson->exists($id)) {
			throw new NotFoundException(__('Invalid committees events person'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CommitteesEventsPerson->save($this->request->data)) {
				$this->Session->setFlash(__('The committees events person has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The committees events person could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CommitteesEventsPerson.' . $this->CommitteesEventsPerson->primaryKey => $id));
			$this->request->data = $this->CommitteesEventsPerson->find('first', $options);
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
		$this->CommitteesEventsPerson->id = $id;
		if (!$this->CommitteesEventsPerson->exists()) {
			throw new NotFoundException(__('Invalid committees events person'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CommitteesEventsPerson->delete()) {
			$this->Session->setFlash(__('The committees events person has been deleted.'));
		} else {
			$this->Session->setFlash(__('The committees events person could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
