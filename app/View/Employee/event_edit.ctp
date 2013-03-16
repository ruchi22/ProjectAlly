<?php echo $this->Html->script('bootstrap-datetimepicker.js'); ?>
<?php echo $this->Html->css('bootstrap-datetimepicker.min.css'); ?>
<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
 		<legend><?php __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_type_id');
		echo $this->Form->input('title');
		echo $this->Form->input('details');
		?>
		<div id="datetimepicker1" class="input-append date">
         <label>Start</label>		
		 <input data-format="yyyy/MM/dd HH:mm:ss PP" type="text" id="EventStart" name="EventStart"></input>
		 		<span class="add-on">
	      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
	      </i>
	    </span>
	    </div>
	    <script type="text/javascript">
		  $(function() {
		    $('#datetimepicker1').datetimepicker({
		      language: 'en',
		   	  pick12HourFormat: true
		    });
		  });
		</script>
		<div id="datetimepicker2" class="input-append date">
         <label>End</label>		
		 <input data-format="yyyy/MM/dd HH:mm:ss PP" type="text" id="EventEnd" name="EventEnd"></input>
		 		<span class="add-on">
	      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
	      </i>
	    </span>
	    </div>
	    <script type="text/javascript">
		  $(function() {
		    $('#datetimepicker2').datetimepicker({
		      language: 'en',
		   	  pick12HourFormat: true
		    });
		  });
		</script>
		<?php 
		echo $this->Form->input('all_day');
		echo $this->Form->input('status', array('options' => array(
					'Scheduled' => 'Scheduled','Confirmed' => 'Confirmed','In Progress' => 'In Progress',
					'Rescheduled' => 'Rescheduled','Completed' => 'Completed'
					)
				)
			);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('View Event', array('action' => 'event_view', $this->Form->value('Event.id'))); ?></li>
		<li><?php echo $this->Html->link('Manage Events', array('controller' => 'Employee', 'action' => 'event')); ?></li>
		<li><?php echo $this->Html->link('Manage Events Types', array('controller' => 'Employee', 'action' => 'eventtype')); ?></li>
	</ul>
</div>
