<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hirers'), ['controller' => 'Hirers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hirer'), ['controller' => 'Hirers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Appliers'), ['controller' => 'Appliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applier'), ['controller' => 'Appliers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="jobs view large-10 medium-9 columns">
    <h2><?= h($job->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Hirer') ?></h6>
            <p><?= $job->has('hirer') ? $this->Html->link($job->hirer->id, ['controller' => 'Hirers', 'action' => 'view', $job->hirer->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Applier') ?></h6>
            <p><?= $job->has('applier') ? $this->Html->link($job->applier->id, ['controller' => 'Appliers', 'action' => 'view', $job->applier->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($job->title) ?></p>
            <h6 class="subheader"><?= __('Location') ?></h6>
            <p><?= h($job->location) ?></p>
            <h6 class="subheader"><?= __('Phone') ?></h6>
            <p><?= h($job->phone) ?></p>
            <h6 class="subheader"><?= __('Details') ?></h6>
            <p><?= h($job->details) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($job->id) ?></p>
            <h6 class="subheader"><?= __('Mtimes') ?></h6>
            <p><?= $this->Number->format($job->mtimes) ?></p>
            <h6 class="subheader"><?= __('Budget') ?></h6>
            <p><?= $this->Number->format($job->budget) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($job->date) ?></p>
            <h6 class="subheader"><?= __('Mdate') ?></h6>
            <p><?= h($job->mdate) ?></p>
            <h6 class="subheader"><?= __('Start') ?></h6>
            <p><?= h($job->start) ?></p>
            <h6 class="subheader"><?= __('End') ?></h6>
            <p><?= h($job->end) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $job->status ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
