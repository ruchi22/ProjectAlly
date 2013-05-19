<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
			<div class="span12">
				<!-- MAIN CONTENT -->
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
			</div>
		</div>
