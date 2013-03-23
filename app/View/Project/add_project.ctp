<?php 
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	echo $this->Html->css('jquery-ui.css');
	echo $this->Html->script('jquery-ui.js');
?>
		<div class="row-fluid">
			<div class="span12">
				<!-- Main content -->
				<!-- form using cakephp -->
				<div class="span5">
					<legend>Add New Project</legend>
					<table>
						<?php
							echo $this->Form->create('AddProject',array('class' => 'form-horizontal', 'url' => array('controller' => 'Project',
																											'action' => 'addProject')));
						?>
						<tr>
							<td align="right">Name</td>
							<td><?php echo $this->Form->input('project_name', array('label' => false)); ?></td>
						</tr>	
						
						<tr>
							<td align="right">Project Description</td>
							<td><?php echo $this->Form->textarea('project_description', array('label' => false));?></td>
						</tr>	
											
						<tr>
							<td></td>
							<td><?php echo $this->Form->submit('Add Project',array('class' => 'btn'));?></td>
						</tr>	
						<?php echo $this->Form->end();?>	
					</table>		
				</div>									
			</div>
		</div>
