<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Towns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="towns form large-10 medium-9 columns">
    <?= $this->Form->create($town) ?>
    <fieldset>
        <legend><?= __('Add Town') ?></legend>
        <?php
            echo $this->Form->input('date');
            echo $this->Form->input('districts_id', ['options' => $districts]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
