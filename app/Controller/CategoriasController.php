<?php
App::uses('AppController', 'Controller');
/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CategoriasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria could not be saved. Please, try again.'));
			}
		}
		$events = $this->Categoria->Event->find('list');
		$entradas = $this->Categoria->Entrada->find('list');
		$this->set(compact('events', 'entradas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
		$events = $this->Categoria->Event->find('list');
		$entradas = $this->Categoria->Entrada->find('list');
		$this->set(compact('events', 'entradas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash(__('The categoria has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categoria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function getCategoriesByEvent() {
            $this->layout = "webservices";
        $even_id = $this->request->data["even_id"];    
        $options = array(
            "conditions" => array(
                "Categoria.event_id" => $even_id
            ),
            "fields" => array(
                "Categoria.id",
                "Categoria.descripcion as name"
            ),
            "recursive" => 0
        );
        $eventos = $this->Categoria->find("all", $options);
        $log = $this->Categoria->getDataSource()->getLog(false, false);
        //debug($log);
//        var_dump($cities);
        $this->set(
                array(
                    "datos" => $eventos,
                    "_serialize" => array("datos")
                )
        );
        }
}
