	<div class="col-sm-4 col-md-4">
		<div class="row"><div class="col-sm-3 col-md-3"><span class="fa fa-arrow">Down</span><span class="fa fa-arrow">Up</div><div class="col-sm-9 col-md-9"><input type="text" class="form-control" /></div></div>
		<?php foreach($messages as $msg): ?>
		<div class="message-excerpt">
			<p><?php echo $this->HTML->link(h($msg->job->title),['action'=>'view',$msg->id]); ?> <span class="timeordate"> <?= h($msg->date) ?></span></p>
			<p><?= h(substr($msg->msg,0,50)); ?>...</p>
			<p><span class="mutted"><?= ($msg->sendername)? $msg->sendername:''; ?></span></p>
			<hr/>
		</div>
	<?php endforeach; ?>
	</div>
	<div class="col-sm-8 col-md-8">
			<h4><?= $message->has('job') ? __($message->job->title) : '' ?></h4>
			<p><?= h($message->sendername); ?> <?= h($message->date); ?></p>
            <p><?= h($message->msg) ?></p>
			<hr/>
			<?php foreach($message->replys as $reply): ?>
			<p><?= $reply->sendname; ?>  <span class="timeordate"><?= h($reply->date) ?></span></p>
			<p><?= $reply->msg; ?></p>
			<hr/>
			<?php	endforeach;
			//debug($message->replys); ?>
	<?= $this->Form->create($message) ?>
	<?= $this->Form->textarea('msg',['label'=>'Reply','class'=>'form-control']) ?>
	<?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    </div>
