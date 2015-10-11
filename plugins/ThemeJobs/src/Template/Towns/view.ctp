<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Town'), ['action' => 'edit', $town->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Town'), ['action' => 'delete', $town->id], ['confirm' => __('Are you sure you want to delete # {0}?', $town->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Towns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Town'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="towns view large-10 medium-9 columns">
    <h2><?= h($town->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('District') ?></h6>
            <p><?= $town->has('district') ? $this->Html->link($town->district->name, ['controller' => 'Districts', 'action' => 'view', $town->district->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($town->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($town->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($town->date) ?></p>
        </div>
    </div>
</div>
