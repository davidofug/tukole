<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hirers'), ['controller' => 'Hirers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hirer'), ['controller' => 'Hirers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Appliers'), ['controller' => 'Appliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applier'), ['controller' => 'Appliers', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="jobs index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('mdate') ?></th>
            <th><?= $this->Paginator->sort('mtimes') ?></th>
            <th><?= $this->Paginator->sort('hirers_id') ?></th>
            <th><?= $this->Paginator->sort('appliers_id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($jobs as $job): ?>
        <tr>
            <td><?= $this->Number->format($job->id) ?></td>
            <td><?= h($job->date) ?></td>
            <td><?= h($job->mdate) ?></td>
            <td><?= $this->Number->format($job->mtimes) ?></td>
            <td>
                <?= $job->has('hirer') ? $this->Html->link($job->hirer->id, ['controller' => 'Hirers', 'action' => 'view', $job->hirer->id]) : '' ?>
            </td>
            <td>
                <?= $job->has('applier') ? $this->Html->link($job->applier->id, ['controller' => 'Appliers', 'action' => 'view', $job->applier->id]) : '' ?>
            </td>
            <td><?= h($job->title) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
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
