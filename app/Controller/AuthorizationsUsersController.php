<?php

App::uses('AppController', 'Controller');

/**
 * AuthorizationsUsers Controller
 *
 * @property AuthorizationsUser $AuthorizationsUser
 * @property PaginatorComponent $Paginator
 */
class AuthorizationsUsersController extends AppController {

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
        $this->AuthorizationsUser->recursive = 0;
        $this->set('authorizationsUsers', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->AuthorizationsUser->exists($id)) {
            throw new NotFoundException(__('Invalid authorizations user'));
        }
        $options = array('conditions' => array('AuthorizationsUser.' . $this->AuthorizationsUser->primaryKey => $id));
        $this->set('authorizationsUser', $this->AuthorizationsUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {
            $data = $this->data;
            $datos = $this->request->data;
            //debug($datos);
            try {
                foreach ($datos as $dato) {
                $event_id = $dato['event_id'];
                $user_id = $dato['user_id'];

                foreach ($dato['authorization_id'] as $authorization_id) {
                    $newAuthorizationsUser = $this->AuthorizationsUser->create();
                    $newAuthorizationsUser = array(
                        'AuthorizationsUser' => array(
                            'user_id' => $user_id,
                            'authorization_id' => $authorization_id,
                            'event_id' => $event_id
                        )
                    );
                    $this->AuthorizationsUser->save($newAuthorizationsUser);
                }
                
            }
            } catch (Exception $ex) {
               
                if($ex->getCode()=='23000'){
                    
                }else{
                    debug($ex->getCode());
                }
                
            }
            
            // if ($this->AuthorizationsUser->save($this->request->data)) {
            // 	$this->Session->setFlash(__('The authorizations user has been saved.'));
            // 	return $this->redirect(array('action' => 'index'));
            // } else {
            // 	$this->Session->setFlash(__('The authorizations user could not be saved. Please, try again.'));
            // }
            return $this->redirect(array('action' => 'index'));
        }

        $this->loadModel('Authorizations');
        $authorizations = $this->Authorizations->find('list', array(
            'fields' => array(
                "Authorizations.nombre"
            )
        ));

        $this->loadModel('Users');
        $users = $this->Users->find('list', array(
            'fields' => array(
                "Users.username"
            )
        ));
        $this->loadModel('Events');
        $events = $this->Events->find('list', array(
            'fields' => array(
                "Events.even_nombre"
            )
        ));

        //debug($events);
        //debug($authorizations);
        $this->set('authorizations', $authorizations);
        $this->set('users', $users);
        $this->set('events', $events);
    }

    public function getAuthorizationByUser(){
        $this->layout = "webservices";
        debug("entre en autorizacion por usuario");
        $datos = $this->request->data;
        debug($datos['user_id']);
        //$this->set($datos);
    }




    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->AuthorizationsUser->exists($id)) {
            throw new NotFoundException(__('Invalid authorizations user'));
        }
        if ($this->request->is(array('post', 'put'))) 
        {
            // debug($id);
            $datas = $this->request->data;
                // $autorizacion = $datas["AuthorizationsUser"]["authorization_id"];
                // debug($autorizacion);
                $updateAuth = array(
                    'AuthorizationsUser' => array(
                        'id' => $id,
                        'user_id' => $datas["AuthorizationsUser"]["user_id"],
                        'authorization_id' => $datas["AuthorizationsUser"]["authorization_id"][0],
                        'event_id' => $datas["AuthorizationsUser"]["event_id"], ));

                $this->AuthorizationsUser->save($updateAuth);  
                if ($this->AuthorizationsUser->save($updateAuth)) {
                    $this->Session->setFlash(__('The authorizations user has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } 
                else 
                {
                    $this->Session->setFlash(__('The authorizations user could not be saved. Please, try again.'));
                }       
            
        }
        else {
                        $options = array('conditions' => array('AuthorizationsUser.' . $this->AuthorizationsUser->primaryKey => $id));
                        $this->request->data = $this->AuthorizationsUser->find('first', $options);
                    }



        

        $this->loadModel('Authorizations');
        $authorizations = $this->Authorizations->find('list', array(
            'fields' => array(
                "Authorizations.nombre"
            )
        ));

        $this->loadModel('Users');
        $users = $this->Users->find('list', array(
            'fields' => array(
                "Users.username"
            )
        ));
        $this->loadModel('Events');
        $events = $this->Events->find('list', array(
            'fields' => array(
                "Events.even_nombre"
            )
        ));

        $this->set(compact('events', 'users', 'authorizations'));

    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->AuthorizationsUser->id = $id;
        if (!$this->AuthorizationsUser->exists()) {
            throw new NotFoundException(__('Invalid authorizations user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->AuthorizationsUser->delete()) {
            $this->Session->setFlash(__('The authorizations user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The authorizations user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
