<?php 
	$role = $this->Session->read('role');
?>
		<div class="row-fluid">
			<div class="span2">
				<!-- Sidebar content -->
				<?php echo $this->element('sidebar/fix_side'); ?>
			</div>
			<div class="span10">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php
					echo $this->Html->link('Project',array('controller' => 'Project', 'action' => 'listProject'),
															array('class' => 'btn'));
				?>
			<?php if($role == 1){?>	
				<?php if($leaveRequests != null){ ?>
					<table class="table table-hover">
						<caption>Leave Requests</caption>
						<thead>
							<tr>
								<th>Name</th>
								<th>Status</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($leaveRequests as $request){ 
							echo '<tr>';
								echo '<td>';
								echo $request['Profile']['userName'];	
								echo '</td>';
								echo '<td>';
								echo $this->Html->tag('span', 'Pending', array('class' => 'label label-important'));
								echo '</td>';
								?>
								<td class="actions">
									<a href="<?php echo $this->Html->url(array('action' => 'approve_request', $request['Profile']['id']));?>" class="btn"><i class="icon-ok"></i> <strong>Approve</strong></a>
						        </td>
								<td class="actions">
									<a href="<?php echo $this->Html->url(array('action' => 'decline_request', $request['Profile']['id'])); ?>" class="btn"><i class="icon-remove"></i> <strong>Decline</strong></a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				<?php }
			} 
			?>
			</div>
		</div>