<?php 
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	$role = $this->Session->read('role');
	
?>
			<div class="row-fluid">
				<div class="span12">
					<!-- MAIN CONTENT -->
				    <div class="span2">
					<ul class="nav nav-tabs nav-stacked">
						<?php 
				 		if ($role==1 || $role==2)
		        			{
		        				echo '<li>';
						    	echo $this->Html->link('Add Project',
													array('controller' => 'Project', 'action' => 'addProject'));
						        echo '</li>';
					        }
					     ?>   
		                <li>
				        	<?php echo $this->Html->link('View Employees Working on Projects',array('controller' => 'Project', 'action' => 'view_employees_projects')); ?>
			            </li>
		            </ul>
		   
				    </div>
		    		<div class="span10">
						<table class="table table-hover well span12">
							<caption><b>Projects</b></caption>
							<thead>
								<tr>
									<th>Project Title</th>
									<th>Description</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($projects as $project):
								?> 
									<tr>
										<td><?php 
												echo $this->Html->link($project['AddProject']['project_name'],
															array('controller' => 'Project', 'action' => 'viewProject', $project['AddProject']['id']));
											?>
										</td>
										<td> <?php echo $project['AddProject']['project_description']?></td>	
										<td><?php echo $this->Html->link('View Members',array('controller' => 'Project', 'action' => 'viewMembers', $project['AddProject']['id']),array('class' => 'btn btn-primary')); ?> </td>
										<td>
											<?php 
												if ($role==1 || $role==2)
													echo $this->Html->link('Delete',array('controller' => 'Project', 'action' => 'deleteProject', $project['AddProject']['id']),array('class' => 'btn btn-inverse'));	
											?>
												
										</td>
									</tr>
								<?php
									endforeach; 	
													
								?>
							</tbody>
						</table>
						</div>
				</div>
		</div>
