<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public $components = array('Paginator', 'Auth', 'Session', 'RequestHandler');

        public function beforeFilter() {
            parent::beforeFilter();
            $this->set('authUser', $this->Auth->user());
            $this->Auth->allow('index','registro','eventos');
           // $this->layout = "reservas_usuario";
        }

        /**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}


	public function index() {
		$this->layout = "reservas_usuario";
        //$this->Person->recursive = 0;
        //$this->set('people', $this->Paginator->paginate());
    }

    public function reservas(){
    	$this->layout = "reservas_usuario";

    }

    public function registro(){
		$this->layout = "reservas_usuario";    	
    	
    }

    public function eventos(){
    	$this->layout = "reservas_usuario";
    	$this->loadModel('Event');
    	$eventos=$this->Event->find('all');
    	$this->set(compact('eventos'));
    }

    public function localidadEvento($id){
    	$this->loadModel('Event');
    	$this->layout = "reservas_usuario";
    	if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid Event'));
        }
        $this->loadModel('Location');
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
        $this->set('locations', $this->Location->find("all", array("conditions" => array('Location.event_id' => $id))));
    }

    public function verLocalidad($id=null){
    	$this->loadModel('Event');
    	$this->loadModel('Location');
    	$this->layout = "reservas_usuario";
    	if (!$this->Location->exists($id)) {
            throw new NotFoundException(__('Invalid Event'));
        }

        $parametros = $this->request->params["pass"];
        $id_loc = $id;
        
        $this->set('location', $this->Location->find("first", array("conditions" => array('Location.id' => $id_loc))));
        $grid = $this->Location->query('SELECT * FROM grid_location WHERE id_location=' . $id); // Traemos datos 
        $this->set('grid', $grid);

    }



}
