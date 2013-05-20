<?php 
	$role = $this->Session->read('role');
?>
	<div class="row-fluid">
		<div class="span12">
			<div class="span4 well">
			<?php 
			echo $this->Html->link('Project',array('controller' => 'Project', 'action' => 'listProject'),
															array('class' => 'btn'));
				
			?>
			</div>
			<!-- CODE FOR GENERATED FEEDS -->
			<div class="span8 well">
			<h4>Feeds</h4>
			<div class="tabbable tabs-left">
				<ul class="nav nav-pills nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">Project Feeds</a></li>
  					<li><a href="#tab2" data-toggle="tab">Milestone Feeds</a></li>
  					<li><a href="#tab3" data-toggle="tab">Ticket Feeds</a></li>
				</ul>
 				<div class="tab-content">
					<div class="tab-pane" id="tab3">
						<?php 
						foreach($bugDetails as $bugDetail):
						
						$date1 = $bugDetail['BugAndFeature']['modified'];
						$date2 = CakeTime::format('Y-m-d H:i:s', time());
						$ts1 = strtotime($date1);
						$ts2 = strtotime($date2);
						
						$seconds_diff = $ts2 - $ts1;
						
						$time_diff = floor($seconds_diff/3600/24);
							if($time_diff <= 5){
								if($bugDetail['BugAndFeature']['created'] == $bugDetail['BugAndFeature']['modified']){
									echo '<i class="icon-plus-sign"></i>&nbsp;&nbsp;&nbsp;';
									echo "New ticket  ";
									echo '<b>'.$this->Html->link($bugDetail['BugAndFeature']['title'], array('controller' => 'Project', 'action' => 'viewTicket', $bugDetail['BugAndFeature']['id'])).'</b>';
									echo " added";
									echo '<br/>';
									foreach ($users as $user):
										if($user['Profile']['id'] == $bugDetail['BugAndFeature']['assigned_to']):
											echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
											echo 'Assigned To ';
											echo $this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
										endif;
									endforeach;	
									echo '<br/>';
									foreach ($users as $user):
										if($user['Profile']['id'] == $bugDetail['BugAndFeature']['reported_by']):
											echo '&nbsp;&nbsp;&nbsp;<i class="icon-book"></i>&nbsp;&nbsp;&nbsp;';
											echo 'Reported By ';
											echo $this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
										endif;
									endforeach;	
										echo '<br/>';
										echo '<br/>';
								}else {
									echo '<i class="icon-refresh"></i>&nbsp;&nbsp;&nbsp;';
									echo "Ticket Modified  ";
									echo '<b>'.$this->Html->link($bugDetail['BugAndFeature']['title'], array('controller' => 'Project', 'action' => 'viewTicket', $bugDetail['BugAndFeature']['id'])).'</b>';
									echo " added";
									echo '<br/>';
									foreach ($users as $user):
										if($user['Profile']['id'] == $bugDetail['BugAndFeature']['assigned_to']):
											echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
											echo 'Assigned To ';
											echo '<b>'.$this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])).'</b>';
										endif;
									endforeach;	
									echo '<br/>';
									foreach ($users as $user):
										if($user['Profile']['id'] == $bugDetail['BugAndFeature']['reported_by']):
											echo '&nbsp;&nbsp;&nbsp;<i class="icon-book"></i>&nbsp;&nbsp;&nbsp;';
											echo 'Reported By ';
											echo $this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
										endif;
									endforeach;	
										echo '<br/>';
										echo '<br/>';
								}
							}
						endforeach;
						?>
					</div>
					<div class="tab-pane active" id="tab1">
						<?php 
						foreach($projectDetails as $projectDetail):
						
							$date1 = $projectDetail['AddProject']['modified'];
							$date2 = CakeTime::format('Y-m-d H:i:s', time());
							$ts1 = strtotime($date1);
							$ts2 = strtotime($date2);
							$seconds_diff = $ts2 - $ts1;
							$time_diff = floor($seconds_diff/3600/24);
						
							if($time_diff <= 5){
								if($projectDetail['AddProject']['created'] == $projectDetail['AddProject']['modified']){
									echo '<i class="icon-plus-sign"></i>&nbsp;&nbsp;&nbsp;';
									echo "New project ";
									echo '<b>'.$this->Html->link($projectDetail['AddProject']['project_name'],
															array('controller' => 'Project', 'action' => 'viewProject', $projectDetail['AddProject']['id']))
										.'</b>';
									echo " created";
									echo '<br/>';
									echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
									echo "Project Members:";
									echo '<br/>';
									
									foreach ($users as $user):
										foreach($project_members as $project_member):
											if($project_member['ProjectMember']['project_id'] == $projectDetail['AddProject']['id'])
												if($project_member['ProjectMember']['profile_id'] == $user['Profile']['id']){	
												?> 
													<tbody>
														<tr>
															<td>
															<i class="icon-th-list"></i>
															 <?php echo $this->Html->link($user['Profile']['user_name'],
																						array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); ?> </td>
															
														</tr>
													</tbody>
												<?php 
												}
										endforeach;
									endforeach;
								}else{
									echo '<i class="icon-refresh"></i>&nbsp;&nbsp;&nbsp;';
									echo "Project Modified ";
									echo '<b>'.$this->Html->link($projectDetail['AddProject']['project_name'],
															array('controller' => 'Project', 'action' => 'viewProject', $projectDetail['AddProject']['id']))
										.'</b>';
									echo '<br/>';
									echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
									echo "Project Members:";
									echo '<br/>';
									foreach ($users as $user):
										foreach($project_members as $project_member):
											if($project_member['ProjectMember']['project_id'] == $projectDetail['AddProject']['id'])
												if($project_member['ProjectMember']['profile_id'] == $user['Profile']['id']){	
												?> 
													<tbody>
														<tr>
															<i class="icon-th-list"></i>
															<td> <?php echo $this->Html->link($user['Profile']['user_name'],
																						array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); ?> </td>
														</tr>
													</tbody>
												<?php 
												}
										endforeach;
									endforeach;
								}
							}
							echo '<br/>';
							echo '<br/>';
						endforeach;
						
						?>
					</div>
					<div class="tab-pane" id="tab2">
						<?php 
						foreach($milestoneDetails as $milestoneDetail):
							$date1 = $milestoneDetail['Milestone']['modified'];
							$date2 = CakeTime::format('Y-m-d H:i:s', time());
							$ts1 = strtotime($date1);
							$ts2 = strtotime($date2);
							$seconds_diff = $ts2 - $ts1;
							$time_diff = floor($seconds_diff/3600/24);
							
							if($time_diff <= 5){
								if($milestoneDetail['Milestone']['created'] == $milestoneDetail['Milestone']['modified']){
									echo '<i class="icon-plus-sign"></i>&nbsp;&nbsp;&nbsp;';
									echo "New Milestone  ";
									echo '<b>'.$this->Html->link($milestoneDetail['Milestone']['title'], array('controller' => 'Project', 
            																	  'action' => 'viewMilestone', $milestoneDetail['Milestone']['id'])).'</b>';
									echo " added";
									echo '<br/>';
									foreach ($users as $user):
										if($user['Profile']['id'] == $milestoneDetail['Milestone']['responsible_user']):
											echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
											echo 'Responsible user ';
											echo $this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])).'</b>';
												echo '<br/>';
										endif;
									endforeach;	
								}else {
									echo '<i class="icon-refresh"></i>&nbsp;&nbsp;&nbsp;';
									echo "Milestone Modified  ";
									echo '<b>'.$this->Html->link($milestoneDetail['Milestone']['title'], array('controller' => 'Project', 
            																	  'action' => 'viewMilestone', $milestoneDetail['Milestone']['id'])).'</b>';
									echo '<br/>';
									foreach ($users as $user):
										if($user['Profile']['id'] == $milestoneDetail['Milestone']['responsible_user']):
											echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
											echo 'Responsible user';
											echo $this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
											echo '<br/>';
						
										endif;
									endforeach;	
									echo '<br/>';
								}
							}
							echo '<br/>';
						endforeach;
						?>
					
					</div>
				</div>			  
				
			</div>
			<!-- /CODE FOR GENERATED FEEDS -->
		</div>
		<div class="span12">
				<?php
				if($role == 1){
					if($leaveRequests != null){ ?>
					<div class="span8 well">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Status</th>
									<th>Title</th>
									<th>Details	</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php 
							foreach($leaveRequests as $request){ 
								foreach($leaveDetails as $detail){			
									if($request['Profile']['id']==$detail['Event']['profile_id']){
										if($detail['Event']['status'] == 'In Progress'){
										echo '<tr>';
											echo '<td>';
											echo $this->Html->link($request['Profile']['user_name'], array('controller' => 'Employee', 'action' => 'viewProfile', $request['Profile']['id']));
											echo '</td>';
											echo '<td>';
											echo $this->Html->tag('span', 'Pending', array('class' => 'label label-important'));
											echo '</td>';
											echo '<td>';
											echo $this->Html->link($detail['Event']['title'], array('controller' => 'Calendar', 'action' => 'leave_view', $detail['Event']['id']));
											echo '</td>';
											echo '<td>';
											echo $detail['Event']['details'];
											echo '</td>';
											$difference = abs(strtotime($detail['Event']['start']) - strtotime($detail['Event']['end']));
											$days = round((($difference/60)/60)/24,0);
											?>
											<td class="actions">
												<a href="<?php echo $this->Html->url(array('action' => 'approve_request', $detail['Event']['id'], $request['Profile']['id'], $days));?>" class="btn btn-small"><i class="icon-ok"></i> <strong>Approve</strong></a>
									        </td>
											<td class="actions">
												<a href="<?php echo $this->Html->url(array('action' => 'decline_request', $detail['Event']['id'], $request['Profile']['id'])); ?>" class="btn btn-small"><i class="icon-remove"></i> <strong>Decline</strong></a>
											</td>
											
										<?php 
										echo '</tr>';
										}
									}
								}
							}?>
							
							</tbody>
						</table>
				</div>
					<?php }
				}
				?>
		</div>
	</div>