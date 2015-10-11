<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Hirers'), ['controller' => 'Hirers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hirer'), ['controller' => 'Hirers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Appliers'), ['controller' => 'Appliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applier'), ['controller' => 'Appliers', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="jobs form large-10 medium-9 columns">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Add Job') ?></legend>
        <?php
            echo $this->Form->hidden('date',['type'=>'hidden', 'value'=>date('Y-M-D h:r:s')]);
            echo $this->Form->hidden('mdate',['type'=>'hidden','value'=>'0000-00-00 00:00:00']);
            echo $this->Form->hidden('mtimes',['type'=>'hidden','value'=>0]);
            echo $this->Form->input('hirers_id', ['options' => $hirers]);
            echo $this->Form->input('appliers_id', ['options' => $appliers]);
            echo $this->Form->input('title');
            echo $this->Form->input('location');
            echo $this->Form->input('phone');
            echo $this->Form->input('budget');
            echo $this->Form->input('start');
            echo $this->Form->input('end');
            echo $this->Form->input('status');
            echo $this->Form->input('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
