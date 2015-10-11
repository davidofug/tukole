<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New District'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="districts index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($districts as $district): ?>
        <tr>
            <td><?= $this->Number->format($district->id) ?></td>
            <td><?= $this->Number->format($district->date) ?></td>
            <td><?= $this->Number->format($district->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $district->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $district->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $district->id], ['confirm' => __('Are you sure you want to delete # {0}?', $district->id)]) ?>
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
