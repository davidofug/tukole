<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Applier'), ['action' => 'edit', $applier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Applier'), ['action' => 'delete', $applier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Appliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="appliers view large-10 medium-9 columns">
    <h2><?= h($applier->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $applier->has('user') ? $this->Html->link($applier->user->id, ['controller' => 'Users', 'action' => 'view', $applier->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Job') ?></h6>
            <p><?= $applier->has('job') ? $this->Html->link($applier->job->title, ['controller' => 'Jobs', 'action' => 'view', $applier->job->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($applier->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($applier->date) ?></p>
        </div>
    </div>
</div>
