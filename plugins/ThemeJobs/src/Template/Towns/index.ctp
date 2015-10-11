<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Town'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="towns index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('districts_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($towns as $town): ?>
        <tr>
            <td><?= $this->Number->format($town->id) ?></td>
            <td><?= h($town->date) ?></td>
            <td>
                <?= $town->has('district') ? $this->Html->link($town->district->name, ['controller' => 'Districts', 'action' => 'view', $town->district->id]) : '' ?>
            </td>
            <td><?= h($town->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $town->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $town->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $town->id], ['confirm' => __('Are you sure you want to delete # {0}?', $town->id)]) ?>
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
