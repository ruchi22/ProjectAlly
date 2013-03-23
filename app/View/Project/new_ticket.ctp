<?php
//content of ticket to be added
echo $this->Html->script('bootstrap-datetimepicker.js');
echo $this->Html->css('bootstrap-datetimepicker.min.css');
?>
<div class="row-fluid">
    <div class="span12">
        <!-- Main content -->
        <!-- form using cakephp -->
        <div class="span5 well">
            <legend>Add New Ticket</legend>
            <?php
                echo $this->Form->create('Ticket',array(
                    'class' => 'form-horizontal',
                    'url' => array('controller' => 'Project',
                                   'action' => 'newTicket')));
            ?>
            <table>
                <tr>
                    <td><label>Title</label></td>
                    <td><?php echo $this->Form->input('title',array('label'=>false));?></td>
                </tr>
            </table>

<!--                echo $this->Form->input('responsible_user',array(-->
<!--                    'options' => $responsibleuser,-->
<!--                    'empty' => '--- Select an user ---'));-->
<!---->
<!--                echo $this->Form->input('planner',array(-->
<!--                    'options' => array('none')));-->
<!---->
<!--                echo "<span>Description</span><br/>";-->
<!--                echo $this->Form->textarea('description');-->
            <?php
                echo $this->Form->submit('Create Ticket',array('class' => 'btn'));
                echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
