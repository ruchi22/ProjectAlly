<?php 
$divId = 'comments_'.$_model.'_'.$_foreignKey;
?>
<div id="<?php echo $divId; ?>">
<a name="<?php echo $divId; ?>"></a>
<?php
$this->Paginator->options(array(
	'update' => $divId,
	'url' => $this->params['pass'], 
));
?>
<h3>Comments</h3><br/>
<?php if ( empty($comments) ) : ?>
	<em>No Comments Posted</em>
<?php endif; ?>
<ul style="list-style: none;" class="comment-list">
	<?php foreach ($comments as $comment): ?>
  	<li style="padding-bottom:10px;">
		<div id="comment<?php echo $comment['Comment']['id']; ?>" class="comment">
			<div class="posted-by">
				<strong>
				<?php if ( empty($comment['Comment']['creator_id']) ): ?>
					<em>Anonymous</em>
				<?php else: 
					foreach($possible_creators as $creator){
						if($creator['Profile']['id'] == $comment['Comment']['creator_id']){
							echo '<em>';	
							echo $creator['Profile']['user_name'];
							echo '</em>';	
						}
						if($creator['Profile']['id'] == $this->Session->read('id')){
						?>
						
							<!-- CODE FOR COMMENT DELETION WILL GO HERE -->
						
						<?php 
						}	
					}	
				endif; ?>
				</strong>
				<h5 class="pull-right"><?php echo $this->Time->timeAgoInWords($comment['Comment']['created']); ?></h5>
			</div>
			<?php echo nl2br($comment['Comment']['comment']); ?>
		</div>
	</li>
	<?php endforeach; ?>
</ul>

<div style="clear: both;"></div>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
	</div>
	<?php
	echo $this->requestAction('/comments/add/'.$_model.'/'.$_foreignKey, array('return'));
	?>
</div>