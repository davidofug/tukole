<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $work->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $work->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Works'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="works form large-10 medium-9 columns">
    <?= $this->Form->create($work) ?>
    <fieldset>
        <legend><?= __('Edit Work') ?></legend>
        <?php
            echo $this->Form->input('date');
            echo $this->Form->input('userid');
            echo $this->Form->input('title');
            echo $this->Form->input('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
