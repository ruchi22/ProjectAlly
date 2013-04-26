<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
			<div class="span12">
					<!-- MAIN CONTENT -->
					<div class="span6 well">	
						<div class="span9 well">
							<div class="span5">
								<?php echo $this->Html->image('../uploads/profile_pic_'.$proUser['Profile']['id'].'.jpg', array('class' => 'img-polaroid', 'height' => '100px', 'width' => '100px')); ?>
							</div>
							<div class="span7">
								<p><strong><?php echo $proUser['Profile']['user_name']; ?></strong></p>
								<p>
								<?php 
								switch ($proUser['Profile']['user_role']){
									case 1:
										echo 'Super Administrator';
										break;
									case 2:
										echo 'Administrator';
										break;
									case 3:
										echo 'Employee';
										break;
									case 4:
										echo 'User';
										break;
								}
								?>
								</p>
							</div>
						</div>
					
					<table cellpadding="15px">
					<tr>
					<td><b>Company</b></td> 
					<td><?php 
						echo $proUser['Profile']['company_name']; 
					?></td>
					</tr>
					<tr>
					<td><b>Email Id</b></td>
					<td><?php 
						echo $proUser['Profile']['input_email']; 
					?></td>
					</tr>
					<tr>
					<td><b>Date Of Birth</b></td> 
					<td><?php 
						if(isset($proUser['Profile']['user_dob'])) 
								echo $proUser['Profile']['user_dob']; 
					?></td>
					</tr>
					<tr>
					<td><b>Work Email Id</b></td>
					<td><?php 
						if(isset($proUser['Profile']['work_email'])) 
								echo $proUser['Profile']['work_email']; 
					?></td>
					</tr>
					<tr>
					<td><b>Address</b></td> 
					<td><?php 
						if(isset($proUser['Profile']['user_address'])) 
								echo $proUser['Profile']['user_address']; 
					?></td>
					</tr>
					<tr>
					<td><b>Contacts</b></td>
					<td><?php 
						if(isset($proUser['Profile']['user_mobile'])) 
								echo $proUser['Profile']['user_mobile']; 
					?></td>
					<td>
					<?php	
						if(isset($proUser['Profile']['user_home'])){ 
							echo $proUser['Profile']['user_home'];
					?></td>
					</tr>
					</table>
				<br/>
				<?php 
				if($this->Session->read('role') == 1){
					if($proUser['Profile']['user_role'] != 2){
						echo $this->Html->link('Designate as Admin', array('action' => 'designateAdmin', $proUser['Profile']['id']), array('class' => 'btn btn-danger'));
					}
					elseif($proUser['Profile']['user_role'] == 2){
						echo $this->Html->link('Revoke Admin rights', array('action' => 'revokeAdmin', $proUser['Profile']['id']), array('class' => 'btn btn-danger'));
					}
				}
			}
			?>
			</div>
			</div>
		</div>
