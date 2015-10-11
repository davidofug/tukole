<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="messages view large-10 medium-9 columns">
    <h2><?= h($message->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Msg') ?></h6>
            <p><?= h($message->msg) ?></p>
            <h6 class="subheader"><?= __('Job') ?></h6>
            <p><?= $message->has('job') ? $this->Html->link($message->job->title, ['controller' => 'Jobs', 'action' => 'view', $message->job->id]) : '' ?></p>
        </div>
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
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($message->date) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $message->status ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
