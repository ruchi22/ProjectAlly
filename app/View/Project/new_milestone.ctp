<?php
    echo $this->Html->script('jquery-1.8.0.min.js');
    echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
    echo $this->Html->css('jquery-ui-1.8.23.custom.css');
    echo $this->Html->css('jquery-ui.css');
    echo $this->Html->script('jquery-ui.js');
?>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            yearRange: '-40:-20',
            changeYear: true
        });
    });
</script>
<div class="row-fluid">
    <div class="span12">
        <!-- Main content -->
        <!-- form using cakephp -->
        <div class="span5">
            <legend>Add New Milestone</legend>
            <table>
                <?php
                echo $this->Form->create('NewMilestone',array('class' => 'form-horizontal', 'url' => array('controller' => 'Project',
                                                                                                           'action' => 'newMilestone')));
                ?>
                <tr>
                    <td align="right">Title</td>
                    <td><?php echo $this->Form->input('title', array('label' => false)); ?></td>
                </tr>

                <tr>
                    <td align="right">Due date</td>
                    <td><?php echo $this->Form->input('dueDate', array('label' => false,'id' => false ,'id' => 'datepicker')); ?></td>
                </tr>

                <tr>
                    <td align="right">Responsible User</td>
                    <td><?php echo $this->Form->input('responsibleUser', array('label' => false)); ?> </td>
                </tr>

                <tr>
                    <td align="right">Description</td>
                    <td><?php echo $this->Form->textarea('description', array('label' => false));?></td>
                </tr>

                <tr>
                    <td></td>
                    <td><?php echo $this->Form->submit('Create Milestone',array('class' => 'btn'));?></td>
                </tr>
                <?php echo $this->Form->end();?>
            </table>
        </div>
    </div>
</div>
