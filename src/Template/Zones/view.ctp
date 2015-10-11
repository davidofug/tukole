<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Zone'), ['action' => 'edit', $zone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zone'), ['action' => 'delete', $zone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="zones view large-10 medium-9 columns">
    <h2><?= h($zone->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Town') ?></h6>
            <p><?= $zone->has('town') ? $this->Html->link($zone->town->name, ['controller' => 'Towns', 'action' => 'view', $zone->town->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($zone->id) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= $this->Number->format($zone->name) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($zone->date) ?></p>
        </div>
    </div>
</div>
