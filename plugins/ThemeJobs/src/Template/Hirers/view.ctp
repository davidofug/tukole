<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Hirer'), ['action' => 'edit', $hirer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hirer'), ['action' => 'delete', $hirer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hirer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hirers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hirer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="hirers view large-10 medium-9 columns">
    <h2><?= h($hirer->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $hirer->has('user') ? $this->Html->link($hirer->user->id, ['controller' => 'Users', 'action' => 'view', $hirer->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Job') ?></h6>
            <p><?= $hirer->has('job') ? $this->Html->link($hirer->job->title, ['controller' => 'Jobs', 'action' => 'view', $hirer->job->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($hirer->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($hirer->date) ?></p>
        </div>
    </div>
</div>
