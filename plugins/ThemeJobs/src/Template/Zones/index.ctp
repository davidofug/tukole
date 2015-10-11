<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Zone'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="zones index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('towns_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($zones as $zone): ?>
        <tr>
            <td><?= $this->Number->format($zone->id) ?></td>
            <td><?= h($zone->date) ?></td>
            <td>
                <?= $zone->has('town') ? $this->Html->link($zone->town->name, ['controller' => 'Towns', 'action' => 'view', $zone->town->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($zone->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $zone->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zone->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zone->id)]) ?>
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
