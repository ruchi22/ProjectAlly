<?php
	class EmployeeController extends AppController{
		public $name = 'Employee';
		public $helpers = array('Html','Form');
		public $components = array('Session');
		public $uses = array('UserInfo', 'Profile', 'EventType', 'Event');

		/*public function beforeFilter() {
			//to prevent going back after logout is clicked
			//$this->disableCache();
			
			/*$name = $this->Session->read('name');
			if (isset($name)) {
				
			}
			else {
				$this->redirect(array('controller' => 'Home', 'action' => 'index'));
			}
		}*/
		
		public function index() {
			$title_for_layout = 'Home';
			$this->set(compact('title_for_layout'));

			$this -> set('users', $this->Profile->find('all' ,array('conditions' => 
																	array('Profile.id >' => 'Profile.id',
																	'Profile.status' => '1'))));
		}

		//new methods
		
		public function pendingUsers() {
			$this->set(compact('title_for_layout'));
			$this->set('proUser', $this->Profile->find('all'));
		}
		
		public function viewProfile($id = null){
			$this->Profile->id = $id;
			if($id==$this->Session->read('id'))
				$this->redirect(array('controller' => 'Employee', 'action' => 'userProfile'));
			else
				$this->set('proUser', $this->Profile->find('first', array('conditions' => array('Profile.id' => $id))));
		}
		
		public function removeUser($id = null) {
			$this->Profile->id = $id;
			$this->Profile->delete($id);
			$this->redirect(array('controller' => 'Employee', 'action' => 'pendingUsers'));
		}
		
		public function approveUser($id = null) {
			$this->Profile->id = $id;
			$this->Profile->updateAll(array('Profile.status' => '1'), array('Profile.id' => $id));
			
			$this->redirect(array('controller' => 'Employee', 'action' => 'pendingUsers'));
		}
		
		public function userProfile() {
			$this->set('proUser', $this->Profile->find('first', array('conditions' => 
													array('Profile.id' => $this->Session->read('id')))));
		}
		
		public function editProfile(){
			$this->set('proUser', $this->Profile->find('first', array('conditions' => 
														array('Profile.id' => $this->Session->read('id')))));
		}
		
		public function updateProfile(){
			$this->Profile->updateAll(array('Profile.userName' => "'".$this->data['Profile']['userName']."'",
											'Profile.inputEmail' => "'".$this->data['Profile']['inputEmail']."'",
											'Profile.userDob' => "'".$this->data['Profile']['userDob']."'", 
											'Profile.userGender' => "'".$this->data['Profile']['userGender']."'", 
											'Profile.workEmail' => "'".$this->data['Profile']['workEmail']."'", 
											'Profile.userAddress' => "'".$this->data['Profile']['userAddress']."'", 
											'Profile.userMobile' => "'".$this->data['Profile']['userMobile']."'", 
											'Profile.userPhoto' => "'".$this->data['Profile']['userPhoto']."'", 
											'Profile.userHome' => "'".$this->data['Profile']['userHome']."'"),
									  array('Profile.id' => $this->Session->read('id')));
				
			$this->Profile->updateAll(array('Profile.userName' => "'".$this->data['Profile']['userName']."'",
											'Profile.inputEmail' => "'".$this->data['Profile']['inputEmail']."'"),
									  array('Profile.id' => $this->Session->read('id')));
			
			$this->redirect(array('controller' => 'Employee', 'action' => 'userProfile'));
		}
		
		public function viewCalendar(){
			
		}

	
	
	
	
	
	
	
	
	
	/* CALENDAR SPECIFIC FUNTIONS */
	function eventtype() {
		$this->set('eventTypes', $this->EventType->find('all'));
	}
	
	function eventtype_view($id = null) {
		if(!$id) {
			$this->Session->setFlash(__('Invalid event type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eventType', $this->EventType->read(null, $id));
	}

	function eventtype_add() {
		if (!empty($this->data)) {
			$this->EventType->create();
			if ($this->EventType->save($this->data)) {
				$this->Session->setFlash('The event type has been saved', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event type could not be saved. Please, try again.', true));
			}
		}
	}

	function eventtype_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EventType->save($this->data)) {
				$this->Session->setFlash(__('The event type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EventType->read(null, $id);
		}
	}

	function eventtype_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EventType->delete($id)) {
			$this->Session->setFlash(__('Event type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function event() {
		$this->Event->recursive = 1;
		$this->set('events', $this->Event->find('all'));
	}
		
	function event_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

	function event_add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		$this->set('eventTypes', $this->Event->EventType->find('list'));
	}

	function event_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$this->set('eventTypes', $this->Event->EventType->find('list'));
	}

	function event_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

        // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	function event_feed($id=null) {
		$this->layout = "ajax";
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
		$events = $this->Event->find('all', $conditions);
		foreach($events as $event) {
			if($event['Event']['all_day'] == 1) {
				$allday = true;
				$end = $event['Event']['start'];
			} else {
				$allday = false;
				$end = $event['Event']['end'];
			}
			$data[] = array(
					'id' => $event['Event']['id'],
					'title'=>$event['Event']['title'],
					'start'=>$event['Event']['start'],
					'end' => $end,
					'allDay' => $allday,
					'url' => Router::url('/') . 'Employee/event_view/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $event['EventType']['color']
			);
		}
		$this->set("json", json_encode($data));
			}

        // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	function event_update() {
		$vars = $this->params['url'];
		$this->Event->id = $vars['id'];
		$this->Event->saveField('start', $vars['start']);
		$this->Event->saveField('end', $vars['end']);
		$this->Event->saveField('all_day', $vars['allday']);
	}
	
	
	
}
?>