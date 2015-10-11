<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $applier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $applier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Appliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="appliers form large-10 medium-9 columns">
    <?= $this->Form->create($applier) ?>
    <fieldset>
        <legend><?= __('Edit Applier') ?></legend>
        <?php
            echo $this->Form->input('date');
            echo $this->Form->input('users_id', ['options' => $users]);
            echo $this->Form->input('jobs_id', ['options' => $jobs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
