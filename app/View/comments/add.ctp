<?php
$divId = 'comment_add_'.$_model.'_'.$_foreignKey;
?>
<div id="<?php echo $divId ?>">
<?php 
$this->Session->flash();
?>
<?php
/*if ( !empty($successful) ) {
	echo $this->Js->writeBuffer($this->Ajax->remoteFunction(array(
		'url' => '/comments/index/'.$_model.'/'.$_foreignKey,
		'update' => 'comments_'.$_model.'_'.$_foreignKey,
	)));
}*/
?>
<br/>
<div class="comments form">
<?php echo $this->Form->create('Comment', array('update' => $divId, 'class' => 'AdvancedForm'));?>
	<fieldset>
 	<?php
		echo $this->Form->input('model', array('type' => 'hidden'));
		echo $this->Form->input('foreign_key', array('type' => 'hidden'));
		echo $this->Form->input('creator_id', array('type' => 'hidden', 'value' => "'".$this->Session->read('id')."'"));
		echo $this->Form->input('comment', array('label' => false, 'rows' => '2', 'class' => 'input-block-level', 'placeholder' => 'Add Comment'));
	?>
	</fieldset>
<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary'));?></div>
</di
v>