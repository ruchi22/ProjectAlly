<?php
$role = $this->Session->read('role');
?>
<div class="row-fluid">
	<div class="span12">
    <div class="span2">
        <?php
        if ($role==1 || $role==2)
        {
            echo $this->Html->link('New Ticket',
                array('controller' => 'Project', 'action' => 'newTicket'),
                array('class' => 'btn'));
        }
        ?>
    </div>

    <div class="span8">
    <?php
        foreach($milestones as $milestone){
            ?>
            <h3><strong>MILESTONE: <a href="#"><?php echo $milestone['Milestone']['title']; ?></a></strong></h3>
            <table class="table table-bordered">
            <?php
            foreach($tickets as $ticket){
            	if($milestone['Milestone']['id']==$ticket['BugAndFeature']['milestone_id']){
        	?>


                    <tr>
                        <td>
                            <?php echo $ticket['BugAndFeature']['id']; ?>
                        </td>
                        <td>
                            <a href="#"><?php echo $ticket['BugAndFeature']['title']; ?></a>
                        </td>
                        <td>
                            <a href="#"><?php echo $assignedto[$ticket['BugAndFeature']['assigned_to']]; ?></a>
                        </td>
                        <td>
                            <a href="#"><?php echo $status[$ticket['BugAndFeature']['status']]; ?></a>
                        </td>
                    </tr>

<!--                    <div class="row">-->
<!--	                <div class="span7">-->
<!--	                    <h4><strong><a href="#">--><?php //echo $ticket['BugAndFeature']['title']; ?><!--</a></strong></h4>-->
<!--	                </div>-->
<!--	                <div class="span2">-->
<!--						<div class="btn-group">-->
<!--	                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--	                            Action-->
<!--	                            <span class="caret"></span>-->
<!--	                        </a>-->
<!--	                        <ul class="dropdown-menu">-->
<!--	                            <li>-->
<!--		                            --><?php //
//		                            echo $this->Html->link('Attach Files', array('controller' => 'Project', 'action' => 'attachFiles', $ticket['BugAndFeature']['id']));
//				     				?>
<!--								</li>-->
<!--	                            <li><a tabindex="-1" href="#">Mark as Completed</a></li>-->
<!--	                            <li class="divider"></li>-->
<!--	                            <li><a tabindex="-1" href="#">Delete</a></li>-->
<!--	                        </ul>-->
<!--	                    </div>-->
<!--	                </div>-->
<!--            	</div>-->
<!--	            <div class="row">-->
<!--	                <div class="span8">-->
<!--	                    <p>-->
<!--	                        --><?php //echo $ticket['BugAndFeature']['description']; ?>
<!--	                    </p>-->
<!--	                </div>-->
<!--	            </div>-->
<!--	            <div class="row">-->
<!--	                <div class="span8">-->
<!--	                    <p></p>-->
<!--	                    <p>-->
<!--	                        --><?php
//	                        foreach($users as $user){
//	                            if($user['Profile']['id'] == $ticket['BugAndFeature']['reported_by']){?>
<!--	                                <i class="icon-user"></i> <b>Reported By: </b><a href="">--><?php //echo $user['Profile']['user_name']?><!--</a>-->
<!--	                                --><?php
//	                            }
//	                        }
//	                        echo "|";
//	                        foreach($users as $user){
//	                            if($user['Profile']['id'] == $ticket['BugAndFeature']['assigned_to']){?>
<!--	                                <i class="icon-user"></i> <b>Assigned To: </b><a href="">--><?php //echo $user['Profile']['user_name']?><!--</a>-->
<!--	                                --><?php
//	                            }
//	                        }
//	                        ?>
<!--	                    </p>-->
<!--	                    -->
<!--	                    <hr>-->
<!--	                </div>-->
<!--	            </div>-->
<!--        --><?php
           	}
       	}?>
            </table>
        <?php
    	}
//   		?>
<!--        </div>-->
    </div>
</div>
