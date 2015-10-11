<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Work'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="works index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('userid') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('details') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($works as $work): ?>
        <tr>
            <td><?= $this->Number->format($work->id) ?></td>
            <td><?= h($work->date) ?></td>
            <td><?= $this->Number->format($work->userid) ?></td>
            <td><?= h($work->title) ?></td>
            <td><?= h($work->details) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $work->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $work->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $work->id], ['confirm' => __('Are you sure you want to delete # {0}?', $work->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
