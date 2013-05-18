		<div class="row-fluid">
			<div class="span12">
				<!-- MAIN CONTENT -->
				<div class="span12">		
					<?php //echo $this->Html->image($proUser['Profile']['userPhoto'], array('class' => 'img-polaroid')); ?>
					<h1><?php echo $project['AddProject']['project_name']; ?></h1><br/>
					<h3><?php echo $project['AddProject']['project_description']; ?></h3><br/>
				</div>
				<br/>	
				<div class="span3">
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
				<table class="table table-bordered">
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
				
				<div class="span5">
					<!-- LIST OF USERS THAT CAN BE ADDED GOES HERE -->
					<table class="table table-bordered">
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
				</div>

			</div>
			<?php
                //small sub menu kind a thing...need to keep it at better place later on
                echo $this->Html->link('Tickets',array('controller' => 'Project', 'action' => 'listTickets', $project['AddProject']['id']),
                                                 array('class' => 'btn'));
                echo $this->Html->link('Milestones',array('controller' => 'Project', 'action' => 'listMilestones', $project['AddProject']['id']),
                                                 array('class' => 'btn'));
                echo $this->Html->link('Go Back',array('controller' => 'Project', 'action' => 'listProject'),
                                                 array('class' => 'btn'));
            ?>            
		</div>
