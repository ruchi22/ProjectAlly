<?php
	class ProjectController extends AppController {	
		
		public $uses = array('AddProject','Profile','Milestone','BugAndFeature','Priority','Estimate','Status','ProjectMember','Event');
		
		public function listProject() {
			$this->set(compact('title_for_layout'));
			$this->set('projects', $this->AddProject->find('all'));
		}
		
		public function viewProject($id = null) {
            //$project_id = $this->request->params['pass'][0];
			$this->AddProject->id = $id;
			$this->set('project_members', $this->ProjectMember->find('all', array('conditions' => 
																		array('ProjectMember.project_id' => $id))));
			$this->set('project', $this->AddProject->find('first', array('conditions' => 
																		array('AddProject.id' => $id))));
			$this->set('users', $this->Profile->find('all' ,array('conditions' => 
																	array(
																	'Profile.status' => '1'))));
		}
		
		public function viewMembers($id = null) {
		$this->AddProject->id = $id;
		$this->set('project_members', $this->ProjectMember->find('all', array('conditions' => 
																		array('ProjectMember.project_id' => $id))));
		$this->set('project', $this->AddProject->find('first', array('conditions' => 
																	array('AddProject.id' => $id))));
		$this->set('users', $this->Profile->find('all' ,array('conditions' => 
																array('Profile.id >' => 'Profile.id',
																'Profile.status' => '1'))));
		}
		
		public function view_employees_projects(){
			$this->set('project_members', $this->ProjectMember->find('all'));
			$this->set('projects', $this->AddProject->find('all'));
			$this->set('users', $this->Profile->find('all' ,array('conditions' => 
																	array(
																	'Profile.status' => '1'))));
		}
		
		public function addProject() {
			if(!empty($this->data)){
				if($this->AddProject->save($this->data)){
					 $event_data = array('event_type_id' =>  '3',
                    					'profile_id' => $this->Session->read('id'), 
                    					'title' => $this->data['AddProject']['project_name'], 
                    					'details' => $this->data['AddProject']['project_description'], 
                    					'start' => CakeTime::format('Y-m-d H:i:s', time()), 
                    					'end' => $this->data['AddProject']['due_date'], 
                    					'all_day' => '0', 
                    					'status' => 'Approved',
                    					'active' => '1' 
                    					);
                    $this->Event->save($event_data);			
					$this->redirect(array('controller' => 'Project', 'action' => 'listProject'));
				} else {
					$this->Session->setFlash('Your stuff has been saved.');
				}
			}
		}
		public function deleteProject($id = null) {
			$this->AddProject->id = $id;
			$this->AddProject->delete($id);
			$this->redirect(array('controller' => 'Project', 'action' => 'listProject'));
		}
		
		public function addMember($user_id = null, $proj_id = null) {
			$data = array('project_id' => $proj_id, 
						  'profile_id' => $user_id);
			$this->ProjectMember->save($data);
			$this->redirect(array('controller' => 'Project', 'action' => 'viewProject', $proj_id));
		}

		public function listMilestones($proj_id = null) {
            $this->set('projectid', $proj_id);
            $this->set('milestones', $this->Milestone->find('all', array('conditions' => array('Milestone.project_id' => $proj_id))));
            $this->set('responsibleuser',$this->Profile->find('all'));
        }
        
        public function editMilestone($milestone_id = null, $proj_id = null){
        	$this->set('projectid', $proj_id);
            $this->set('milestones', $this->Milestone->find('all', array('conditions' => array('Milestone.id' => $milestone_id))));
           	//responsible user
            $this->set('responsibleuser',$this->Profile->find('list',array(
                                                                     'fields' => array('Profile.user_name'),
                                                                     'conditions' => array('Profile.status'))));
            if(!empty($this->data))
            {
                if($this->Milestone->save($this->data))
                {
                    $this->Session->setFlash('Milestone successfully updates', 'success');
                    $this->redirect(array('action' => 'listMilestones', $proj_id));
                }else
                {
                    $this->Session->setFlash('Something went wrong...Please try again', 'error');
                }
            }
        }
        
        public function deleteMilestone($milestone_id = null, $proj_id = null){
        	$this->Milestone->delete($milestone_id);
        	$this->redirect(array('controller' => 'Project', 'action' => 'listMilestones', $proj_id));
		}
        
        public function newMilestone($proj_id = null) {
            $this->set('projectid', $proj_id);
            
            //responsible user
            $this->set('responsibleuser',$this->Profile->find('list',array(
                                                                     'fields' => array('Profile.user_name'),
                                                                     'conditions' => array('Profile.status'))));
            //to add new milestone
            if(!empty($this->data))
            {
                if($this->Milestone->save($this->data))
                {
                    $this->Session->setFlash('New milestone created successfully.', 'success');
                    $event_data = array('event_type_id' =>  '1',
                    					'profile_id' => $this->data['Milestone']['responsible_user'], 
                    					'title' => $this->data['Milestone']['title'], 
                    					'details' => $this->data['Milestone']['description'], 
                    					'start' => CakeTime::format('Y-m-d H:i:s', time()), 
                    					'end' => $this->data['Milestone']['due_date'], 
                    					'all_day' => '0', 
                    					'status' => 'Approved',
                    					'active' => '1' 
                    					);
                    $this->Event->save($event_data);					
                    $this->redirect(array('action' => 'listMilestones', $proj_id));
                }else
                {
                    $this->Session->setFlash('Something went wrong...Please try again', 'error');
                }
            }
        }
		
        public function viewMilestone($milestone_id = null){
        	$this->set('milestones', $this->Milestone->find('all', array('conditions' => array('Milestone.id' => $milestone_id))));
       	}
        
        public function listTickets($proj_id = null) {
            $this->set('projectid', $proj_id);
            $this->set('tickets', $this->BugAndFeature->find('all', array('conditions' => array('BugAndFeature.project_id' => $proj_id))));
            $this->set('users',$this->Profile->find('all'));
            $this->set('milestones', $this->Milestone->find('all', array('conditions' => array('Milestone.project_id' => $proj_id))));
            $this->set('assignedto',$this->Profile->find('list',array(
                'fields' => array('Profile.user_name'),
                'conditions' => array('Profile.status')
            )));
            $this->set('status',$this->Status->find('list',array(
                'fields' => array('Status.type')
            )));
            
            if(isset($this->request->params['named']['milestone'])){
				$this->set('tickets', $this->BugAndFeature->find('all'));
	            $this->set('users',$this->Profile->find('all'));
	            $this->set('milestones', $this->Milestone->find('all', array('conditions' => array('Milestone.id' => $this->request->params['named']['milestone']))));
        	}
        }
		
        
		public function deleteTicket($ticket_id = null, $proj_id = null){
        	$this->BugAndFeature->delete($ticket_id);
        	$this->redirect(array('controller' => 'Project', 'action' => 'listTickets', $proj_id));
		}
	
		public function editTicket($ticket_id = null, $proj_id = null) {
            $this->set('projectid', $proj_id);
            $this->set('tickets', $this->BugAndFeature->find('all', array('conditions' => array('BugAndFeature.id' => $ticket_id))));
	            
            //fetching the values of priority
            $this->set('priority',$this->Priority->find('list',array(
                'fields' => array('Priority.type')
            )));

            //fetching the values for list of users
            $this->set('assignedto',$this->Profile->find('list',array(
                'fields' => array('Profile.user_name'),
                'conditions' => array('Profile.status')
            )));

            //fetching the values for list of milestones
            $this->set('milestone',$this->Milestone->find('list',array(
                'fields' => array('Milestone.title'),
                'conditions' => array('Milestone.project_id' => $proj_id)
            )));

            //fetching the values pf estimated size
            $this->set('estimate',$this->Estimate->find('list',array(
                'fields' => array('Estimate.type')
            )));

            //to edit ticket
            if(!empty($this->data))
            {
                if($this->BugAndFeature->save($this->data['Ticket']))
                {
                    $this->Session->setFlash('Ticket updated successfully.', 'success');
                    $this->redirect(array('controller' => 'Project', 'action' => 'listTickets', $proj_id));
                }else
                {
                    $this->Session->setFlash('Something went wrong...Please try again', 'error');
                }
            }
        }
        
		public function viewTicket($ticket_id = null){
        	$this->set('tickets', $this->BugAndFeature->find('all', array('conditions' => array('BugAndFeature.id' => $ticket_id))));
       	}
        
        public function newTicket($proj_id = null) {
            $this->set('projectid', $proj_id);
            
            //fetching the values of priority
            $this->set('priority',$this->Priority->find('list',array(
                'fields' => array('Priority.type')
            )));

            //fetching the values for list of users
            $this->set('assignedto',$this->Profile->find('list',array(
                'fields' => array('Profile.user_name'),
                'conditions' => array('Profile.status')
            )));

            //fetching the values for list of milestones
            $this->set('milestone',$this->Milestone->find('list',array(
                'fields' => array('Milestone.title'),
                'conditions' => array('Milestone.project_id' => $proj_id)
            )));

            //fetching the values pf estimated size
            $this->set('estimate',$this->Estimate->find('list',array(
                'fields' => array('Estimate.type')
            )));

            //to create a new ticket
            if(!empty($this->data))
            {
                if($this->BugAndFeature->save($this->data['Ticket']))
                {
                    $this->Session->setFlash('New ticket created successfully.', 'success');
                    $this->redirect(array('controller' => 'Project', 'action' => 'listTickets', $proj_id));
                }else
                {
                    $this->Session->setFlash('Something went wrong...Please try again', 'error');
                }
            }
        }
        
        public function attachFiles($id = null){
        	$this->Session->write('bug_id', $id);
		}
	}
?>