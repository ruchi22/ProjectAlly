<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
			<div class="span12">
				<?php 	//echo $this->element('crumbs'); ?>
				<!-- Main content -->
				<!-- form using cakephp -->
				<table class="table table-hover">
					<caption>Project Staff</caption>
					<thead>
						<tr>
							<th>User Name</th>
							<th>Company Name</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($proUser as $user):
						if($user['Profile']['status'] == '1'){
						?> 
							<tr>
								<td> <?php echo $this->Html->link($user['Profile']['userName'], 
															array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); ?> </td>
								<td> <?php echo $user['Profile']['companyName'];?> </td>
								<td> <?php echo $this->Html->tag('span', 'Approved', array('class' => 'label label-success')); ?> </td>
								<td></td>
								<td>
									<i class="icon-remove"></i>
									<?php 
										echo $this->Html->link('Remove User', array('controller' => 'Employee', 'action' =>'removeUser', $user['Profile']['id']),
															 						array(), "Are you sure you wish to remove this user?");
									?>
								</td>
							</tr>
						<?php 
						}
						else{
							?> 
							<tr>
								<td> <?php echo $this->Html->link($user['Profile']['userName'], 
															array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); ?> </td>
								<td> <?php echo $user['Profile']['companyName'];?> </td>
								<td> <?php echo $this->Html->tag('span', 'Pending', array('class' => 'label label-important')); ?> </td>
								<td>
									<i class="icon-ok"></i>
									<?php 
										echo $this->Html->link('Approve User', array('controller' => 'Employee', 'action' =>'approveUser', $user['Profile']['id']),
															 array(), "Approve User?"); 
									?> 
								</td>
								<td>
									<i class="icon-remove"></i>
									<?php 
										echo $this->Html->link('Remove User', array('controller' => 'Employee', 'action' =>'removeUser', $user['Profile']['id']),
															 array(), "Are you sure you want to remove this user?");
									?>
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
