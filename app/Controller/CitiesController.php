<?php

App::uses('AppController', 'Controller');

/**
 * Cities Controller
 *
 * @property City $City
 * @property PaginatorComponent $Paginator
 */
class CitiesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');

//    var $helpers = array('xls');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
//             $this->layout = false;
        $this->City->recursive = 0;
        $this->set('cities', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
//             $this->layout = false;
        if (!$this->City->exists($id)) {
            throw new NotFoundException(__('Invalid city'));
        }
        $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
        $this->set('city', $this->City->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        $this->loadModel('Country');
        if ($this->request->is('post')) {
            $this->City->create();
            try {
                if ($this->City->save($this->request->data)) {
                    $this->Session->setFlash('Ciudad creada con exito', 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {

                    $this->Session->setFlash('Error al registrar la ciudad', 'error');
                }
            } catch (Exception $ex) {
                $error2 = $ex->getCode();
                if ($error2 == '23000') {
                    $this->Session->setFlash('Error ya hay una ciudad con el mismo nombre en la base de datos', 'error');
                }
            }
        }
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            )
        ));
        //debug($countriesName);
        $countries = $this->Country->find('list');

        $this->set(compact('countries'));
        $this->set("countriesName", $countriesName);

        $states = $this->City->State->find('list');
        $this->set(compact('states'));
        
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
//             $this->layout = false;
        if (!$this->City->exists($id)) {
            throw new NotFoundException(__('Invalid city'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->City->save($this->request->data)) {
                $this->Session->setFlash(__('The city has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The city could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
            $this->request->data = $this->City->find('first', $options);
        }
        $state = $this->City->State->find('list');
        $this->set(compact('state'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
//             $this->layout = false;
        $this->City->id = $id;
        if (!$this->City->exists()) {
            throw new NotFoundException(__('Invalid city'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->City->delete()) {
            $this->Session->setFlash(__('The city has been deleted.'));
        } else {
            $this->Session->setFlash(__('The city could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getCitiesByState() {
        $this->layout = "webservices";
        $state_id = $this->request->data["state_id"]; //State
        //debug($state_id);
        $options = array(
            "conditions" => array(
                "City.state_id" => $state_id
            ),
            "fields" => array(
                "City.id",
                "City.name"
            ),
            "recursive" => 0
        );

        $cities = $this->City->find("all", $options);
        $log = $this->City->getDataSource()->getLog(false, false);
        //debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $cities,
                    "_serialize" => array("datos")
                )
        );
    }

    function export() {
        $data = $this->City->find('all');
        $this->set('cities', $data);
    }

    public function getCitiesByCountry() {
        $this->loadModel('Countries');
        $this->loadModel('Cities');
        $this->layout = "webservices";
        $country_id = $this->request->data["country_id"];
        $sql = "SELECT City.id, City.name FROM cities City INNER JOIN  states d ON City.state_id=d.id WHERE d.country_id =" . $country_id;
        $cities = $this->City->query($sql);


        $this->set(
                array(
                    "datos" => $cities,
                    "_serialize" => array("datos")
                )
        );
    }

}
