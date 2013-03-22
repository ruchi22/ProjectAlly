<?php
    $role = $this->Session->read('role');
?>
<div class="row-fluid">
    <div class="span12">
        <?php
            if ($role==1 || $role==2)
            {
                echo $this->Html->link('New Milestone',
                array('controller' => 'Project', 'action' => 'newMilestone'),
                array('class' => 'btn'));
            }
        ?>
        display to be implemented once milestones are added.
<!--        <table class="table table-hover well span5">-->
<!--            <caption>Milestones</caption>-->
<!--            --><?php
//                foreach ($projects as $project):
//            ?>
<!--            <tr>-->
<!--                <td>--><?php
//                    if ($role==1 || $role==2)
//                        echo $this->Html->link($project['AddProject']['projectName'],
//                            array('controller' => 'Project', 'action' => 'viewProject', $project['AddProject']['id']));
//                    else
//                        echo $project['AddProject']['projectName'];
//                    ?>
<!--                </td>-->
<!--                <td>--><?php //echo $this->Html->link('View Members',array('controller' => 'Project', 'action' => 'viewMembers', $project['AddProject']['id']),array('class' => 'btn btn-info')); ?><!-- </td>-->
<!--                <td>-->
<!--                    --><?php
//                    if ($role==1 || $role==2)
//                        echo $this->Html->link('Delete',array('controller' => 'Project', 'action' => 'deleteProject', $project['AddProject']['id']),array('class' => 'btn btn-info'));
//                    ?>
<!---->
<!--                </td>-->
<!--            </tr>-->
<!--                --><?php
//            endforeach;
//
//            ?>
<!--            </tbody>-->
<!--        </table>-->
    </div>
</div>
