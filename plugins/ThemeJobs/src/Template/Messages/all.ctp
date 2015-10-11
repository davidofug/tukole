<div class="row">
	<div class="col-sm-4 col-md-4">
		<ul style="list-style-type:none">
			<li><?= $this->HTML->link('Inbox',['action'=>'all',$authUser['id']]) ?></li>
			<li><?= $this->HTML->link('Sent',['action'=>'sent',$authUser['id']]) ?></li>
			<li><?= $this->HTML->link('Drafts',['action'=>'drafts',$authUser['id']]) ?></li>
			<li><?= $this->HTML->link('Trash',['action'=>'trash',$authUser['id']]) ?></li>
		</li>
	</div>
	<div class="col-sm-8 col-md-8">
	<?php foreach($msgs as $msg): ?>
		<div class="text-center job">
			<p><strong><?php echo $this->HTML->link(h($msg->job->title),['action'=>'view',$msg->id]); ?><span class="budget"> @ <?= h($msg->date) ?>/=</span></strong></p>
			<p><?= h($msg->msg); ?></p>
		</div>
	<?php endforeach; ?>
    <div class="text-center paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
	</div>
</div>