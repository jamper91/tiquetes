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
            ),
            'conditions' => array(
            	"Events.Even_fechInicio>NOW()"
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
        $sql = "SELECT c.id, c.nombre as name FROM committees c WHERE c.id NOT IN (SELECT c.id FROM committees c INNER JOIN committees_events ce ON ce.committee_id =c.id INNER JOIN committees_events_people cp ON cp.committees_event_id = ce.id WHERE  ce.event_id = $event_id)";
        $respuesta = $this->CommitteesEvent->query($sql);
//        debug($respuesta);
        
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

		$this->set('event_id', $event_id);
		$this->set('committees_id', $committees_id);
		$this->set('cantidad', $cantidad);
		
	}
	public function registrarPersona()
	{
		$data=$this->request->data;
			$this->loadModel('Person');
			$people = $this->Person->find("first", array(
	                "conditions" => array(
	                    'Person.pers_documento' => $data['documento']),
	                "fields" => array(
	                    "Person.id"
	                )
	            ));

			if($people == null)
			{
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
		        //debug($newPeopleId);
		      	$a['person']['valor'] = $newPeopleId;
		    }
		    else
		    {
		    	$newPeopleId = $people['Person']['id'];
		    	$a['person']['valor'] = $newPeopleId;
		    }

	    //buscar la información en committeeEvent
	      	$this->loadModel('CommitteesEvents');
	      	$CommitteesEvents = $this->CommitteesEvents->find("first", array(
	                "conditions" => array(
	                    'CommitteesEvents.committee_id' => $data['committee_id'],
	                	'CommitteesEvents.event_id' => $data['event_id']),
	                "fields" => array(
	                    "CommitteesEvents.id",
	                )
	            ));


	    //aqui debo de guardar en la tabla committeeEventPeople
	        $newCommittee = $this->CommitteesEventsPerson->create();
	        $newCommittee = array(
	        	'CommitteesEventsPerson' => array(
	        		'person_id' => $newPeopleId,
	        		'committees_event_id'=> $CommitteesEvents['CommitteesEvents']['id']
	        		));

	        $this->CommitteesEventsPerson->save($newCommittee);
	        $newCEP_id = $this->CommitteesEventsPerson->getLastInsertId();

			$this->set(
	                array(
	                    "datos" => $a,
	                    "_serialize" => array("datos")
	                )
	        );
		//}
		// if($data['cantidad'] == 0)
  //       {
  //       	return $this->redirect(array('action' => 'index'));	
  //       }
	}

}
