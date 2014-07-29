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
	public $components = array('Paginator');

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
			

			foreach ($datos as $dato) {

				//debug($dato);
				$event_id = $dato['event_id'];
				//debug($event_id);
				foreach ($dato['user_id'] as $user_id) {
					//debug($user_id);
					foreach ($dato['authorization_id'] as $authorization_id) {
						//debug($authorization_id);
						$newAuthorizationsUser = $this->AuthorizationsUser->create();
						$newAuthorizationsUser = array(
						                'AuthorizationsUser' => array(
						                    'user_id' => $user_id,
						                    'authorization_id' =>$authorization_id,
						                    'event_id' => $event_id
						                )
						            );
						$this->AuthorizationsUser->save($newAuthorizationsUser);
						//debug($newAuthorizationsUser);
					}
				}
			}
			// if ($this->AuthorizationsUser->save($this->request->data)) {
			// 	$this->Session->setFlash(__('The authorizations user has been saved.'));
			// 	return $this->redirect(array('action' => 'index'));
			// } else {
			// 	$this->Session->setFlash(__('The authorizations user could not be saved. Please, try again.'));
			// }
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
		  $this->set('authorizations', $authorizations );
		  $this->set('users', $users );
		  $this->set('events', $events );
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AuthorizationsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The authorizations user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The authorizations user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuthorizationsUser.' . $this->AuthorizationsUser->primaryKey => $id));
			$this->request->data = $this->AuthorizationsUser->find('first', $options);
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
