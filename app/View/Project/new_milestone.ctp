<?php
    echo $this->Html->script('bootstrap-datetimepicker.js');
    echo $this->Html->css('bootstrap-datetimepicker.min.css');
?>
<div class="row-fluid">
    <div class="span12">
        <!-- Main content -->
        <!-- form using cakephp -->
        <div class="span5 well">
            <legend>Add New Milestone</legend>
                <?php
                echo $this->Form->create('NewMilestone',array('class' => 'form-horizontal', 'url' => array('controller' => 'Project',
                                                                                                           'action' => 'newMilestone')));
                echo $this->Form->input('title');
                ?>

<!--                <tr>-->
<!--                    <td align="right">Due date</td>-->
<!--                    <td>--><?php //echo $this->Form->input('dueDate', array('label' => false,'id' => false ,'id' => 'datepicker')); ?><!--</td>-->
<!--                </tr>-->
                    <div id="datetimepicker1" class="input-append date">
                        <label>Due Date</label>
                        <input data-format="yyyy/MM/dd HH:mm:ss" type="text" id="data[Event][start]" name="data[Event][start]"></input>
                         <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                            <script type="text/javascript">
                                $(function() {
                                    $('#datetimepicker1').datetimepicker({
                                        language: 'en',
                                        pick24HourFormat: true
                                    });
                                });
                            </script>
                    </div>
                    <?php
                        //to generate options for responsible users
                        $opt = implode('","',$responsibleuser);
                        echo $this->Form->input('responsibleUser',array(
                             'options' => array('"'.$opt.'"'),
                             'empty' => '(Select a user)'));
                        echo "<span>Description</span><br/>";
                        echo $this->Form->textarea('description');
                        echo $this->Form->submit('Create Milestone',array('class' => 'btn'));
                        echo $this->Form->end();
                    ?>
        </div>
    </div>
</div>
