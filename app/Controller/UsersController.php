<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
    	// Allow users to register and logout.
		$this->Auth->allow('add', 'logout', 'edit', 'delete', 'view');
	}

	public function login() 
	{

		if ($this->Auth->login()) {
			return $this->redirect($this->Auth->redirectUrl());
		}
		else
		{
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}

	public function isAuthorized($user)
	{
		if (in_array($this->action, array('add','edit','delete','listUsers')))
		{
			# code...
			if ($this->Session->read('Auth.User.role') === 'Admin') {
				# code...
				return true/
			}

			return parent::isAuthorized($user);
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function listUsers()
	{
		$this->set('users', $this->User->find('all'));
	}

	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		else
		{
			$this->set('user', $this->User->findById($id));
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved'));
				//return $this->redirect(array('action' => 'index'));
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(
				__('The user could not be saved. Please, try again.')
			);
		}
	}

	public function edit($id = null) {
		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(
				__('The user could not be saved. Please, try again.')
			);
		} else {
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);
		}
	}

	public function delete($id = null) {
		$this->request->onlyAllow('post');

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Flash->success(__('User deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		else
		{
			$this->Flash->error(__('User was not deleted'));
			return $this->redirect(array('action' => 'index'));
		}
	}
}
?>