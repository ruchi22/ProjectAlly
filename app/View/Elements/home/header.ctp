<?php
    $act = $this->request->params['action'];
$role = $this->Session->read('role');
$name = $this->Session->read('name');
?>
<style>
    .pull-right{
        float:right;
    }
</style>
<div class="header">
	<h1>Project<span style="color: #52a8ec"><strong>Ally</strong></span></h1>

    <ul class="nav nav-pills pull-right">
        <li class="<?php if($act == 'HomePage'){ echo "active"; }?> ">
            <?php echo $this->Html->link('Home', array('controller' => 'Home', 'action' => 'index'))?>
        </li>

        <li class="<?php if($act == 'aboutUs'){ echo "active"; }?> ">
            <?php echo $this->Html->link('About Us', array('controller' => 'Home', 'action' => 'aboutUs'))?>
        </li>

        <?php
        //php code to check whether the user is logged in or not
        if(isset($name)) {
            //below links will be showed only if the user is logged in
            ?>

            <li class="<?php if($act == 'index'){ echo "active"; }?> ">
                <?php echo $this->Html->link('Employee Management', array('controller' => 'Employee', 'action' => 'index'))?>
            </li>

            <li class="<?php if($act == 'listProject'){ echo "active"; }?> ">
                <?php echo $this->Html->link('Project Management', array('controller' => 'Project', 'action' => 'listProject'))?>
            </li>

            <li class="<?php if($act == 'viewCalendar'){ echo "active"; }?> ">
                <?php echo $this->Html->link('Calendar', array('controller' => 'Employee', 'action' => 'viewCalendar'))?>
            </li>

            <li class="<?php if($act == 'projectDoc'){ echo "active"; }?> ">
                <?php echo $this->Html->link('Project Documentation', array('controller' => 'Project', 'action' => 'projectDoc'))?>
            </li>

            <?php
        }
        //below links will be always visible
        ?>
        <?php if ($role == 1)
    {?>
        <li class="pull-right">
            <?php
            echo $this->Html->link($notify, array('controller' => 'Employee', 'action' => 'pendingUsers'),array('class' => 'badge badge-important'));
            ?>
        </li>
        <?php }
        //code ends here
        ?>
        <!-- Code for logout and myprofile -->
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <?php echo $name; ?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><?php echo $this->Html->link('My Profile', array('controller' => 'Employee', 'action' => 'userProfile')); ?></li>
                <li class="divider"></li>
                <li><?php echo $this->Html->link('Logout', array('controller' => 'App', 'action' => 'logout')); ?></li>
            </ul>
        </li>
		<li class="<?php if($act == 'contactUs'){ echo "active"; }?> ">
			<?php echo $this->Html->link('Contact Us', array('controller' => 'Home', 'action' => 'contactUs'))?>
		</li>





		</ul>

</div>
