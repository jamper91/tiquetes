<?php
App::uses('AppController', 'Controller');
/**
 * Locations Controller
 *
 * @property Location $Location
 * @property PaginatorComponent $Paginator
 */
class LocationsController extends AppController {

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
		$this->Location->recursive = 0;
		$this->set('locations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__('Invalid location'));
		}
		$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
		$this->set('location', $this->Location->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Location->create();
			if ($this->Location->save($this->request->data)) {
				$this->Session->setFlash(__('The location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.'));
			}
		}
		$stages = $this->Location->Stage->find('list');
		$parentLocations = $this->Location->ParentLocation->find('list');
		$this->set(compact('stages', 'parentLocations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__('Invalid location'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Location->save($this->request->data)) {
				$this->Session->setFlash(__('The location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
			$this->request->data = $this->Location->find('first', $options);
		}
		$stages = $this->Location->Stage->find('list');
		$parentLocations = $this->Location->ParentLocation->find('list');
		$this->set(compact('stages', 'parentLocations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Location->id = $id;
		if (!$this->Location->exists()) {
			throw new NotFoundException(__('Invalid location'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Location->delete()) {
			$this->Session->setFlash(__('The location has been deleted.'));
		} else {
			$this->Session->setFlash(__('The location could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function getLocationByStage() {        
        $this->layout = "webservices";
        $stage_id = $this->request->data["stage_id"]; //Stage      
        $options = array(
            "conditions" => array(
                "Location.stage_id" => $stage_id
            ),
            "fields" => array(
                "Location.id",
                "Location.loca_nombre"
            ),
            "recursive" => 0
        );
        $loca = $this->Location->find("all", $options);        
        $log = $this->Location->getDataSource()->getLog(false, false);
//        debug($log);
        //$stages=array("datos"=>$locations);
        $this->set(
                array(
                    "datos" => $loca,
                    "_serialize" => array("datos")
                )
        );
    }
}
