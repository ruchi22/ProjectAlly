<div class="span9">
					<!-- LIST OF USERS THAT CAN BE ADDED GOES HERE -->
					<table class="table table-bordered table-hover">
						<caption><b>Project Staff</b></caption>
						<thead>
							<tr>
								<th>Projects</th>
								<th>Employee Name</th>
							</tr>
						</thead>
						<tbody>
						
							<?php
								foreach($projects as $project){
									foreach($project_members as $proj_mem){
										if($proj_mem['ProjectMember']['project_id'] == $project['AddProject']['id']){
											echo '<tr>';
											echo '<td>';
											echo $project['AddProject']['project_name'];
											echo '</td>';
											foreach ($users as $user):
														if($proj_mem['ProjectMember']['profile_id'] == $user['Profile']['id']){	
														?> 
															<td> <?php echo $this->Html->link($user['Profile']['user_name'],
																						array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); ?> </td>
														<?php 
														}
														
											endforeach;
											echo '</tr>';
											
										}
										
									}
								}
							
							?>							
						</tbody>
					</table>
				</div>
