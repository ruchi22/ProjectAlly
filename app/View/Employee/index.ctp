<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
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
					echo $this->Html->link('Profile',array('controller' => 'Employee', 'action' => 'userProfile'),array('class' => 'btn'));
					
					echo $this->Html->link('Project',array('controller' => 'Project', 'action' => 'listProject'),array('class' => 'btn'));
					
					echo $this->Html->link('View Calendar',array('controller' => 'Employee', 'action' => 'viewCalendar'), array('class' => 'btn'));
						
				?>
				<br/>
				<br/>
				<br/>
				<?php 
				if($this->Session->read('role') != 1){
					$leave_in_percentage = (100 * $currentUser['Profile']['leave_taken'])/21;
				?>						
				<div class="span6">
				  <strong>Time off's used in %</strong><span class="pull-right"><?php echo ceil($leave_in_percentage) ?>%</span>
				  <div class="progress progress-warning active">
				      <div class="bar" style="width: <?php echo $leave_in_percentage ?>%"></div>
				  </div>
				  <p>
					<?php
						echo $this->Html->link('Request Time off',array('controller' => 'Employee', 'action' => 'leave_add'), array('class' => 'btn btn-large pull-right'));
					?>
				  </p>
				</div>	
				<?php } ?>
						
			</div>
		</div>
