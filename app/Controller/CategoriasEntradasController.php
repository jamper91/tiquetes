<?php

App::uses('AppController', 'Controller', 'RequestHandler');

/**
 * CategoriasEntradas Controller
 *
 * @property CategoriasEntrada $CategoriasEntrada
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CategoriasEntradasController extends AppController {

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
        $this->CategoriasEntrada->recursive = 0;
        $this->set('categoriasEntradas', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->CategoriasEntrada->exists($id)) {
            throw new NotFoundException(__('Invalid categorias entrada'));
        }
        $options = array('conditions' => array('CategoriasEntrada.' . $this->CategoriasEntrada->primaryKey => $id));
        $this->set('categoriasEntrada', $this->CategoriasEntrada->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->CategoriasEntrada->create();
            if ($this->CategoriasEntrada->save($this->request->data)) {
                $this->Session->setFlash(__('The categorias entrada has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorias entrada could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->CategoriasEntrada->Categoria->find('list', array(
            'fields' => array(
                'Categoria.id', 'Categoria.descripcion'
            )
        ));
         $this->loadModel('Country');
        $countriesName = $this->Country->find('list', array(
            "fields" => array(
                "Country.name"
            ),
            "recursive" => -2
        ));
        $this->set(compact('countriesName'));

        $this->set(compact('state'));

        //$cities = $this->Stage->City->find('list');
        $this->set(compact('cities'));

        $this->set(compact('stages'));
        $entradas = $this->CategoriasEntrada->Entrada->find('list');
        $this->set(compact('categorias', 'entradas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->CategoriasEntrada->exists($id)) {
            throw new NotFoundException(__('Invalid categorias entrada'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->CategoriasEntrada->save($this->request->data)) {
                $this->Session->setFlash(__('The categorias entrada has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorias entrada could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('CategoriasEntrada.' . $this->CategoriasEntrada->primaryKey => $id));
            $this->request->data = $this->CategoriasEntrada->find('first', $options);
        }
        $categorias = $this->CategoriasEntrada->Categorium->find('list');
        $entradas = $this->CategoriasEntrada->Entrada->find('list');
        $this->set(compact('categorias', 'entradas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->CategoriasEntrada->id = $id;
        if (!$this->CategoriasEntrada->exists()) {
            throw new NotFoundException(__('Invalid categorias entrada'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->CategoriasEntrada->delete()) {
            $this->Session->setFlash(__('The categorias entrada has been deleted.'));
        } else {
            $this->Session->setFlash(__('The categorias entrada could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function registerCategoriasEntradas(){
        $this->layout = "webservices";
        if ($this->request->is('post')) {
            $this->CategoriasEntrada->create();
            try {
                if ($this->CategoriasEntrada->save($this->request->data)) {
                    
                    $datos = array(
                      "codigo"=>"1",
                      "mensaje"=>"Registro Correcto"
                    );
                } else {                   
                    $datos = array(
                      "codigo"=>"-1",
                      "mensaje"=>"Error al realizar el registro por favor intenta nuevamente"
                    );
                }
            } catch (Exception $ex) {
                 
                  $error2 = $ex->getCode();
                if ($error2 === '23000'){
                    $datos = array(
                      "codigo"=>"-2",
                      "mensaje"=>"Error la conviancion categoria y entrada ya fue registrada en la base de datos"
                    );
                }
            }
        }
        $this->set(
                array(
                    "datos" => $datos,
                    "_serialize" => array("datos")
                )
        );
    }
}