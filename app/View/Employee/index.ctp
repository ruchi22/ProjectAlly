<?php 
$role = $this->Session->read('role') ;
?>
		<div class="row-fluid">
			<div class="span12">
				<!-- Main content -->
				<!-- form using cakephp -->
				<div class="span5 well">
					<h4>List of Employees</h4>
					<table class="table table-bordered table-hover">
					<thead>
					    <tr>
					      <th>Employee name</th>
					      <th>Designation</th>
					    </tr>
					</thead>
					<tbody>
				<?php 
				if($role == 1 || $role == 2){
					foreach ($users as $user):
						if($role == 1){
							if($user['Profile']['user_role'] > 1){
								echo '<tr class =';
								if($user['Profile']['user_role'] == 3){
										echo 'success';
									}
									elseif($user['Profile']['user_role'] == 4){
										echo 'error';
									}	
									elseif($user['Profile']['user_role'] == 2){
										echo 'info';
									}	
								echo '>';
									echo '<td>';
										echo $this->Html->link($user['Profile']['user_name'],
															array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); 
									echo '</td>';
									echo '<td>';
										switch($user['Profile']['user_role']){
											case '2':
												echo 'Administrator';
												break;
											case '3': 
												echo 'Employee';
												break;
											case '4':
												echo 'User';
												break;
										}
									echo '</td>';
								echo '</tr>';
							}
						}
						elseif($role == 2){
							if($user['Profile']['user_role'] > 2){
							echo '<tr class =';
							if($user['Profile']['user_role'] == 3){
									echo 'success';
								}
								elseif($user['Profile']['user_role'] == 4){
									echo 'error';
								}	
							echo '>';
								echo '<td>';
									echo $this->Html->link($user['Profile']['user_name'],
														array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); 
								echo '</td>';
								echo '<td>';
									switch($user['Profile']['user_role']){
										case '3': 
											echo 'Employee';
											break;
										case '4':
											echo 'User';
											break;
									}
								echo '</td>';
							echo '</tr>';
							}
						}
					endforeach;
				}
				?>
					</tbody>
					</table>
				</div>
				<br/>
				<br/>
				<br/>
				<?php 
				if($role != 1){
					$leave_in_percentage = (100 * $currentUser['Profile']['leave_taken'])/21;
				
					?>						
					<div class="span7">
						<strong>Time off's used in %</strong><span class="pull-right"><?php echo ceil($leave_in_percentage) ?>%</span>
					  	<div class="progress progress-warning active">
					    	<div class="bar" style="width: <?php echo $leave_in_percentage ?>%"></div>
						</div>
					  	<p>
							<?php
							if($leave_in_percentage != 100)
								echo $this->Html->link('Request Time off',array('controller' => 'Calendar', 'action' => 'leave_add'), array('class' => 'btn btn-large pull-right'));
							else{?>
								<div class="alert">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Warning!</strong> You have taken maximum number of leaves allowed..!
								</div>	
								<?php }?>
					  	</p>
					</div>
				<div class="span8">
				<?php 
				if($leaveStatus != null){ 
				?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Status</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
				<?php foreach($leaveStatus as $leave){ ?>
							<?php 
							echo '<tr>';
								echo '<td>';
								echo $leave['Event']['title'];	
								echo '</td>';
								echo '<td>';
								if($leave['Event']['status']  == 'In Progress')
									 echo $this->Html->tag('span', 'In Progress', array('class' => 'label label-important'));
								elseif ($leave['Event']['status']  == 'Approved')
									 echo $this->Html->tag('span', 'Approved', array('class' => 'label label-success'));
								elseif ($leave['Event']['status']  == 'Declined')
									 echo $this->Html->tag('span', 'Declined', array('class' => 'label label-inverse'));
								echo '</td>';
								if($leave['Event']['status']  == 'In Progress'){
									?>
									<td class="actions">
										<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'leave_view', $leave['Event']['id']));?>" class="btn btn-small"><i class="icon-eye-open"></i> <strong>View</strong></a>
							        </td>
									<td class="actions">
										<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'leave_edit', $leave['Event']['id'])); ?>" class="btn btn-small"><i class="icon-edit"></i> <strong>Edit</strong></a>
									</td>
									<td class="actions">
										<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'leave_delete', $leave['Event']['id'])); ?>" class="btn btn-small"><i class="icon-remove"></i><strong>Delete</strong></a>
									</td>
							<?php 
								}
								else{
									?>
									<td></td>
									<td></td>
									<td class="actions">
										<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'leave_remove', $leave['Event']['id'])); ?>" class="btn btn-small"><i class="icon-remove"></i><strong>Remove</strong></a>
									</td>
							<?php
								}
							echo '</tr>';
							}?>
						</tbody>
					</table>
				<?php }
				}	
				?>
				</div>
			</div>
		</div>
