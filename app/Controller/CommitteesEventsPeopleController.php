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

	public function contar()
	{
		$event_id = $this->request->data['event_id'];
		$committees_id = $this->request->data['committees_id'];
		$cantidad = $this->request->data['cantidad'];

		if($this->request->is(array('post', 'put')))
		{
			debug($this->request->data);
			for($i=0; $i<=$cantidad; $i++)
			{

			}
		}
		$this->set('event_id', $event_id);
		$this->set('committees_id', $committees_id);
		$this->set('cantidad', $cantidad);
		
	}
	public function registrarPersona()
	{
		$data=$this->request->data;

		$this->loadModel('People');
		$newPeole = $this->People->create();
            $newPeole = array(
                'People' => array(
                    'pers_primNombre' => $data['nombre'],
                    'pers_primApellido' => $data['apellido'],
                    //'city_id' => $data['User']['city_id'],
                    'pers_documento' => $data['documento'],
                    'pers_direccion' => $data['direccion'],
                    // 'pers_telefono' => $data['People']['pers_telefono'],
                    // 'pers_celular' => $data['People']['pers_celular'],
                    // 'pers_fechNacimiento' => $data['People']['pers_fechNacimiento'],
                    // 'pers_tipoSangre' => $data['People']['pers_tipoSangre'],
                    'pers_mail' => $data['correo']
                )
            );

            $this->People->save($newPeole);
            $newPeopleId = $this->People->getLastInsertId();
          	$a['person']['valor'] = $newPeopleId;
            //aqui debo de guardar en la tabla committeeEventPeople

		  $this->set(
                array(
                    "datos" => $a,
                    "_serialize" => array("datos")
                )
        );
	}

}
