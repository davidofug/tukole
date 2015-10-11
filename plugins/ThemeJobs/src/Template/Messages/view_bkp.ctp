	<div class="col-sm-4 col-md-4">
		<ul style="list-style-type:none">
			<li><?= $this->HTML->link('Inbox',['action'=>'inbox',$authUser['id']]) ?></li>
			<li><?= $this->HTML->link('Sent',['action'=>'sent',$authUser['id']]) ?></li>
			<li><?= $this->HTML->link('Drafts',['action'=>'drafts',$authUser['id']]) ?></li>
			<li><?= $this->HTML->link('Trash',['action'=>'trash',$authUser['id']]) ?></li>
		</li>
	</div>
	<div class="col-sm-8 col-md-8">
			 <p><?= $message->has('job') ? $this->Html->link($message->job->title, ['controller' => 'Jobs', 'action' => 'view', $message->job->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Msg') ?></h6>
			<h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($message->date) ?></p>
            <p><?= h($message->msg) ?></p>
            <h6 class="subheader"><?= __('Job') ?></h6>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($message->id) ?></p>
            <h6 class="subheader"><?= __('Senders Id') ?></h6>
            <p><?= $this->Number->format($message->senders_id) ?></p>
            <h6 class="subheader"><?= __('Receivers Id') ?></h6>
            <p><?= $this->Number->format($message->receivers_id) ?></p>
            <h6 class="subheader"><?= __('Responseid') ?></h6>
            <p><?= $this->Number->format($message->responseid) ?></p>
        </div>
        <div class="large-2 columns dates end">

        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $message->status ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
