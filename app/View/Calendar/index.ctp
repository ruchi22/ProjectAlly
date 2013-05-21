<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "Calendar";
 </script>
<?php
echo $this->Html->script(array('jquery-1.5.min', 'jquery-ui-1.8.9.custom.min', 'fullcalendar.min', 'jquery.qtip-1.0.0-rc3.min', 'ready'), array('inline' => 'false'));
echo $this->Html->css('fullcalendar', null, array('inline' => false));
?>
<div class="row-fluid">
	<div class="Calendar index well span12">
		<div id="calendar"></div>
	</div>
	<br/>
	<table class="table table-bordered">
		<tr>
		<?php 
			foreach ($eventTypes as $eventType){
					?>
				<td style="background-color:<?php echo $eventType['EventType']['color']; ?>; color: white;">
				<b>
				<?php echo $eventType['EventType']['name']; ?> 
				</b>
				</td>	
			<?php } ?>
		</tr>
	</table>
	<div class="actions">
		<ul class="nav nav-tabs nav-stacked span3">
		    <li><?php echo $this->Html->link('New Event', array('action' => 'event_add')); ?></li>
			<li><?php echo $this->Html->link('Manage Events', array('action' => 'event')); ?></li>
			<?php if($this->Session->read('role') == 1){?>
			<li><?php echo $this->Html->link('Manage Events Types', array('action' => 'eventtype')); ?></li>
			<?php }?>
		</ul>
	</div>
</div>