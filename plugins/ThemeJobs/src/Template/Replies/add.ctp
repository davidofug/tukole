<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Replies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="replies form large-10 medium-9 columns">
    <?= $this->Form->create($reply) ?>
    <fieldset>
        <legend><?= __('Add Reply') ?></legend>
        <?php
            echo $this->Form->input('date');
            echo $this->Form->input('msg');
            echo $this->Form->input('jobs_id', ['options' => $jobs]);
            echo $this->Form->input('title');
            echo $this->Form->input('senders_id');
            echo $this->Form->input('receivers_id');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
