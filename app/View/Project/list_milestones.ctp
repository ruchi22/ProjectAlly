<?php
    $role = $this->Session->read('role');
?>
<div class="row-fluid">
    <div class="span3">
        <?php
            if ($role==1 || $role==2)
            {
                echo $this->Html->link('New Milestone',
                array('controller' => 'Project', 'action' => 'newMilestone'),
                array('class' => 'btn'));
            }
        ?>
	</div>
	<?php foreach($milestones as $milestone){ ?>
	<div class="span8">
 		<div class="row">
			<div class="span7">
				<h4><strong><a href="#"><?php echo $milestone['Milestone']['title']; ?></a></strong></h4>
			</div>
			<div class="span2">      
		     	<div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				    Action
				    <span class="caret"></span>
				  	</a>
				  	<ul class="dropdown-menu">
					    <li><a tabindex="-1" href="#">Mark as Completed</a></li>
					    <li class="divider"></li>
					    <li><a tabindex="-1" href="#">Delete</a></li>				  
				  	</ul>
				</div>			
			</div>
		</div>
		<div class="row">
			<div class="span8">      
		        <p>
			    	<?php echo $milestone['Milestone']['title']; ?>
			    </p>
		    </div>
		</div>
	    <div class="row">
	    	<div class="span8">
		        <p></p>
		        <p>
		       	<?php 
		       	foreach($responsibleuser as $user){
		       		if($user['Profile']['id'] == $milestone['Milestone']['responsible_user']){?>
		        	<i class="icon-user"></i> <b>Responsible User: </b><a href="#"><?php echo $user['Profile']['user_name']?></a> 
		        <?php
					 } 
		       	}
				?>  	
		          	| <i class="icon-calendar"></i> <b>Due date: </b> <?php
					echo $this->Time->format('F jS, Y', $milestone['Milestone']['due_date']); ?>	
		        </p>
		        <hr>
    	  	</div>
   		 </div>
	</div>
	<?php } ?>
</div>
