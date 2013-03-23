<?php
	class ProjectController extends AppController {	
		
		public $uses = array('AddProject','Profile','Milestone','BugAndFeature','Priority','Estimate');
		
		
		public function listProject() {
			$this->set(compact('title_for_layout'));
			$this->set('projects', $this->AddProject->find('all'));
		}
		
		public function viewProject($id = null) {
			$this->AddProject->id = $id;
			$this->set('project', $this->AddProject->find('first', array('conditions' => 
																		array('AddProject.id' => $id))));
			$this->set('users', $this->Profile->find('all' ,array('conditions' => 
																	array('Profile.id >' => 'Profile.id',
																	'Profile.status' => '1'))));
		}
		
		public function viewMembers($id = null) {
		$this->AddProject->id = $id;
		$this->set('project', $this->AddProject->find('first', array('conditions' => 
																	array('AddProject.id' => $id))));
		$this -> set('users', $this->Profile->find('all' ,array('conditions' => 
																array('Profile.id >' => 'Profile.id',
																'Profile.status' => '1'))));
		}
		
		public function addProject() {
			if(!empty($this->data)){
				if($this->AddProject->save($this->data)){
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
		
		public function addMember($id = null) {

			$user_id = $this->params['named']['user_id'];
			$proj_id = $this->params['named']['proj_id'];
			$project = $this->AddProject->find('first',array('conditions' =>
															array('AddProject.id' => $proj_id)));
			//echo $project['AddProject']['projectMembers'];
			//exit;
			if ($project['AddProject']['projectMembers'] == null)
			{
				$this->AddProject->UpdateAll(array('AddProject.project_members' => "'$user_id'"),
											array('AddProject.id' => $proj_id));	
			}
			else 
			{
				$users_id = $project['AddProject']['projectMembers'] . ',' . $user_id;
				$this->AddProject->UpdateAll(array('AddProject.project_members' => "'$users_id'"),
											array('AddProject.id' => $proj_id));
				
			
			}
			$this->redirect(array('controller' => 'Project', 'action' => 'viewProject', $proj_id));
		}



        public function listMilestones() {
            $this->set('milestones', $this->Milestone->find('all'));
            $this->set('responsibleuser',$this->Profile->find('all',array(
                                                                     'conditions' => array('Profile.status'))));
        }

        public function newMilestone() {
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
                    $this->redirect(array('action' => 'newMilestone'));
                }else
                {
                    $this->Session->setFlash('Something went wrong...Please try again', 'error');
                }
            }
        }

        public function listTickets() {

        }

        public function newTicket() {
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
                'fields' => array('Milestone.title')
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
                    $this->redirect(array('action' => 'newTicket'));
                }else
                {
                    $this->Session->setFlash('Something went wrong...Please try again', 'error');
                }
            }
        }
	}
?>