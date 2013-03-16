<?php $act = $this->request->params['action']; ?>
<style>
	.pull-right{
		float:right;
	}
</style>
<div class="header">
	<h1>Project<span style="color: #52a8ec"><strong>Ally</strong></span></h1>
	<ul class="nav nav-pills">
		<li class="pull-right">	
				<?php 
					//Following code is to notify number of pending users to superadmin.
					$role = $this->Session->read('role');	 
					$name = $this->Session->read('name');
					if(isset($name)) {?>
					<ul class="nav nav-pills">
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
					</ul>
					<?php } ?>
			</li>
		
		<li class="<?php if($act == 'contactUs'){ echo "active"; }?> pull-right">
			<?php echo $this->Html->link('Contact Us', array('controller' => 'Home', 'action' => 'contactUs'))?>
		</li>
		<li class="<?php if($act == 'aboutUs'){ echo "active"; }?> pull-right">
			<?php echo $this->Html->link('About Us', array('controller' => 'Home', 'action' => 'aboutUs'))?>
		</li>
		<li class="<?php if($act == 'HomePage'){ echo "active"; }?> pull-right">
			<?php echo $this->Html->link('Home', array('controller' => 'Home', 'action' => 'index'))?>
		</li>
		</ul>
</div>
<hr>