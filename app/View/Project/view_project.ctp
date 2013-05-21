<?php 	$role = $this->Session->read('role'); ?>
		<div class="row-fluid">
			<div class="span3">
				<ul class="nav nav-tabs nav-stacked span9">
					<li>
		               <?php  echo $this->Html->link('Tickets',array('controller' => 'Project', 'action' => 'listTickets', $project['AddProject']['id'])); ?>
		            </li>	
		            <li>
		               <?php echo $this->Html->link('Milestones',array('controller' => 'Project', 'action' => 'listMilestones', $project['AddProject']['id'])); ?>
		            </li>
		            <?php if ($role==1 || $role == 2):?>
		        	<li>
		            	<?php 	echo $this->Html->link('Delete',array('controller' => 'Project', 'action' => 'deleteProject', $project['AddProject']['id'])); ?>	
					<li>
					<?php endif; ?>
	                <li>
		                <?php echo $this->Html->link('Go Back',array('controller' => 'Project', 'action' => 'listProject')); ?>
		            <li>
	            </ul>
			</div>            
			<div class="span9">
				<!-- MAIN CONTENT -->
				<div class="span12">		
					<?php //echo $this->Html->image($proUser['Profile']['userPhoto'], array('class' => 'img-polaroid')); ?>
					<h1><?php echo $project['AddProject']['project_name']; ?></h1><br/>
					<h3><?php echo $project['AddProject']['project_description']; ?></h3><br/>
				</div>
				<br/>	
				<div class="span4">
				<?php 
				if($project_members == null){
					?>
					<div class="alert alert-info">
						<b>No member is assigned yet..!</b>
					</div>
					<?php 
				}
				else {
					?>
						<table class="table table-bordered table-hover">
										<caption>List of Employees Working on project</caption>
										<thead>
											<tr>
												<th>User Name</th>
											</tr>
										</thead>
						<?php 
							foreach ($users as $user):
								foreach($project_members as $project_member):
										if($project_member['ProjectMember']['profile_id'] == $user['Profile']['id']){	
										?> 
											<tbody>
												<tr>
													<td> <?php echo $this->Html->link($user['Profile']['user_name'],
																				array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); ?> </td>
												</tr>
											</tbody>
										<?php 
										}
										
								endforeach;
							endforeach;
					}
						?>
						</table>	
					</div>
				<?php if($role==1 || $role==2): ?>
				<div class="span9">
					<!-- LIST OF USERS THAT CAN BE ADDED GOES HERE -->
					<table class="table table-bordered table-hover">
						<caption>Project Staff</caption>
						<thead>
							<tr>
								<th>User Name</th>
								<th>Company Name</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$flag = false;
							foreach ($users as $user):
								foreach ($project_members as $project_member):
									if($user['Profile']['id'] != $project_member['ProjectMember']['profile_id']){
										$flag = 0;
									}
									else 
									{
										$flag = 1;
										break;
									}
								endforeach;
									if($flag == 0){
									?>
									<tr>
										<td> <?php echo $this->Html->link($user['Profile']['user_name'],
																	array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); ?> </td>
										<td> <?php echo $user['Profile']['company_name'];?> </td>
										<td> <?php echo $this->Html->link('Add User', array('controller' => 'Project', 'action' =>'addMember', $user['Profile']['id'], $project['AddProject']['id'])); ?>
									    </td>
									</tr>
            					    <?php 
									}
							endforeach;
							?>
							
						</tbody>
					</table>
					<?php endif; ?>
				</div>

			</div>
		</div>
