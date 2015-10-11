    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Add Job') ?></legend>
        <?php
           echo $this->Form->input('date');
           echo $this->Form->input('mdate');
           echo $this->Form->input('mtimes');
            echo $this->Form->input('hirers');
            echo $this->Form->input('appliers');
            echo $this->Form->input('title');
            echo $this->Form->input('location');
            echo $this->Form->input('phone');
            echo $this->Form->input('budget');
            echo $this->Form->input('start');
            echo $this->Form->input('end');
            echo $this->Form->hidden('status');
            echo $this->Form->textarea('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>