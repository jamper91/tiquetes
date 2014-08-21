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
        $this->loadModel('Users');
        $users = $this->Users->find('list', array(
            'fields' => array(
                "Users.username"
            )
        ));
        $options = array('group' => array('AuthorizationsUser.user_id'));
        $this->set('users', $users);
        $this->set('authorizationsUsers', $this->AuthorizationsUser->find('all', $options));
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

    // public function getAuthorizationByUser(){
    //     $this->layout = "webservices";
    //     //debug("entre en autorizacion por usuario");
    //     $datos = $this->request->data['user_id'];
    //     //debug($datos['user_id']);
    //     $this->set($datos);
    // }




    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null, $user_id = null) {
      /*  if (!$this->AuthorizationsUser->exists($id)) {
            throw new NotFoundException(__('Invalid authorizations user'));
        }*/
        if ($this->request->is(array('post', 'put'))) 
        {
            $datas = $this->request->data;

            $new = $datas['AuthorizationsUser']['Authorization'];

            $sqlOld = "DELETE FROM Authorizations_users WHERE user_id=".$user_id;
            $this->AuthorizationsUser->query($sqlOld);

            foreach ($new as $nv) {
                  $newAuthorizationsUser = $this->AuthorizationsUser->create();
                    $newAuthorizationsUser = array(
                        'AuthorizationsUser' => array(
                            'user_id' => $user_id,
                            'authorization_id' => $nv,
                            'event_id' => $datas['AuthorizationsUser']['event_id']
                        )
                    );
                    $this->AuthorizationsUser->save($newAuthorizationsUser);
            }    
            
        }
        else {
                //$options = array('conditions' => array('AuthorizationsUser.' . $this->AuthorizationsUser->primaryKey => $id));
                $options = array( 
                    'conditions' => array('AuthorizationsUser.user_id'  => $user_id));
                $authorizations = $this->AuthorizationsUser->find('all', $options);
                $nuevo = array();
                foreach($authorizations as $authorization)
                {
                    array_push($nuevo, $authorization['Authorization']);
                }
                $authorizations[0]['Authorization'] = $nuevo;
                $this->request->data =  $authorizations[0];
            }
   

        $this->loadModel('Authorizations');
        $authorization = $this->AuthorizationsUser->Authorization->find('list', array(
            'fields' => array(
                "Authorization.id",
                "Authorization.nombre"
            )
        ));

        $this->loadModel('Users');
        $users = $this->AuthorizationsUser->User->find('list', array(
            'fields' => array(
                "User.username"
            )
        ));
        $this->loadModel('Events');
        $events = $this->AuthorizationsUser->Event->find('list', array(
            'fields' => array(
                "Event.even_nombre"
            )
        ));

        $this->set(compact('events', 'users', 'authorization'));

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
