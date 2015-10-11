<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $zone->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $zone->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Zones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="zones form large-10 medium-9 columns">
    <?= $this->Form->create($zone) ?>
    <fieldset>
        <legend><?= __('Edit Zone') ?></legend>
        <?php
            echo $this->Form->input('date');
            echo $this->Form->input('towns_id', ['options' => $towns]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
