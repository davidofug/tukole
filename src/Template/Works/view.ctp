<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Work'), ['action' => 'edit', $work->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Work'), ['action' => 'delete', $work->id], ['confirm' => __('Are you sure you want to delete # {0}?', $work->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Works'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Work'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="works view large-10 medium-9 columns">
    <h2><?= h($work->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($work->title) ?></p>
            <h6 class="subheader"><?= __('Details') ?></h6>
            <p><?= h($work->details) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($work->id) ?></p>
            <h6 class="subheader"><?= __('Userid') ?></h6>
            <p><?= $this->Number->format($work->userid) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($work->date) ?></p>
        </div>
    </div>
</div>
