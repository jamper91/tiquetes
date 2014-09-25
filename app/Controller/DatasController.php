<?php
App::uses('AppController', 'Controller');
/**
 * Datas Controller
 *
 * @property Data $Data
 * @property PaginatorComponent $Paginator
 */
class DatasController extends AppController {

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
		$this->Data->recursive = 0;
		$this->set('datas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Data->exists($id)) {
			throw new NotFoundException(__('Invalid data'));
		}
		$options = array('conditions' => array('Data.' . $this->Data->primaryKey => $id));
		$this->set('data', $this->Data->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Data->create();
			if ($this->Data->save($this->request->data)) {
				$this->Session->setFlash(__('The data has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The data could not be saved. Please, try again.'));
			}
		}
		$people = $this->Data->Person->find('list');
		$formsPersonalDatas = $this->Data->FormsPersonalDatum->find('list');
		$this->set(compact('people', 'formsPersonalDatas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Data->exists($id)) {
			throw new NotFoundException(__('Invalid data'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Data->save($this->request->data)) {
				$this->Session->setFlash(__('The data has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The data could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Data.' . $this->Data->primaryKey => $id));
			$this->request->data = $this->Data->find('first', $options);
		}
		$people = $this->Data->Person->find('list');
		$formsPersonalDatas = $this->Data->FormsPersonalDatum->find('list');
		$this->set(compact('people', 'formsPersonalDatas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Data->id = $id;
		if (!$this->Data->exists()) {
			throw new NotFoundException(__('Invalid data'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Data->delete()) {
			$this->Session->setFlash(__('The data has been deleted.'));
		} else {
			$this->Session->setFlash(__('The data could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        public function getDataByUser() {
        $this->layout = "webservices";
        $person_id = $this->request->data["person_id"]; //State
        $options = array(
            "conditions" => array(
                "Data.person_id" => $person_id
            ),
            "fields" => array(
                "Data.id",
                "Data.descripcion",
                "Data.forms_personal_datum_id",
                "Data.person_id",
//                "Data.personal_datum_id",
            ),
        );
        $datos = $this->Data->find("all", $options);
//        debug($datos);
        $log = $this->Data->getDataSource()->getLog(false, false);
        //debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }
}
