<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Reply'), ['action' => 'edit', $reply->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reply'), ['action' => 'delete', $reply->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reply->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Replies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reply'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="replies view large-10 medium-9 columns">
    <h2><?= h($reply->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Msg') ?></h6>
            <p><?= h($reply->msg) ?></p>
            <h6 class="subheader"><?= __('Job') ?></h6>
            <p><?= $reply->has('job') ? $this->Html->link($reply->job->title, ['controller' => 'Jobs', 'action' => 'view', $reply->job->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($reply->title) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($reply->id) ?></p>
            <h6 class="subheader"><?= __('Senders Id') ?></h6>
            <p><?= $this->Number->format($reply->senders_id) ?></p>
            <h6 class="subheader"><?= __('Receivers Id') ?></h6>
            <p><?= $this->Number->format($reply->receivers_id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($reply->date) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $reply->status ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
