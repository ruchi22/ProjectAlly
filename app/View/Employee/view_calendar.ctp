<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "Employee";
 </script>
<?php
echo $this->Html->script(array('jquery-1.5.min', 'jquery-ui-1.8.9.custom.min', 'fullcalendar.min', 'jquery.qtip-1.0.0-rc3.min', 'ready'), array('inline' => 'false'));
echo $this->Html->css('fullcalendar', null, array('inline' => false));
?>

<div class="Calendar index">
	<div id="calendar"></div>
</div>
<div class="actions">
	<ul>
	    <li><?php echo $this->Html->link('New Event', array('controller' => 'Employee', 'action' => 'event_add')); ?></li>
		<li><?php echo $this->Html->link('Manage Events', array('controller' => 'Employee', 'action' => 'event')); ?></li>
		<li><?php echo $this->Html->link('Manage Events Types', array('controller' => 'Employee', 'action' => 'eventtype')); ?></li>
	</ul>
</div>
