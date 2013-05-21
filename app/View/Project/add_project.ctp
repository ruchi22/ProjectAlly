<?php echo $this->Html->script('bootstrap-datetimepicker.js'); ?>
<?php echo $this->Html->css('bootstrap-datetimepicker.min.css'); ?>

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
							<td>Name</td>
						</tr>
						<tr>	
							<td><?php echo $this->Form->input('project_name', array('label' => false)); ?></td>
						</tr>	
						
						<tr>
							<td>Project Description</td>
						</tr>
						<tr>	
							<td><?php echo $this->Form->textarea('project_description', array('label' => false));?></td>
						</tr>	
						<tr>
						<td colspan="2">
						<div id="datetimepicker1" class="input-append date">
				         <label>Due date</label>		
						 <input data-format="yyyy/MM/dd" type="text" id="data[AddProject][due_date]" name="data[AddProject][due_date]"></input>
						 <span class="add-on">
					      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
					      </i>
					    </span>
					    </div>
					    </td>
					    
					    </tr>
					    <script type="text/javascript">
						  $(function() {
						    $('#datetimepicker1').datetimepicker({
						      language: 'en',
						   	  pick24HourFormat: true
						    });
						  });
						</script>					
						<tr>
							<td></td>
							<td><?php echo $this->Form->submit('Add Project',array('class' => 'btn'));?></td>
						</tr>	
						<?php echo $this->Form->end();?>	
					</table>		
				</div>									
			</div>
		</div>
