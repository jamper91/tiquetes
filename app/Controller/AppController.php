<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
   public $components = array(
            'Session',
            'Auth' ,
            'RequestHandler'
    );
    
    public function beforeFilter() {
       $this->set('authUser', $this->Auth->user()); 
    }


    public static function prueba(){
    	App::import('Model', 'TypeUser');
    	$as = new TypeUser();
    	
    	$sql = "select * from type_users";
    	$query=$as->query($sql);
    	//$db = ConnectionManager::getDataSource('default');
		//$db->rawQuery($sql);
		//$query=$db;
                     //var_dump($this->element('Event')); 
          //          $query=$as->query($sql);
    	return $query;
    }



}
