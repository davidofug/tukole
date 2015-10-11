<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Hirer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="hirers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('users_id') ?></th>
            <th><?= $this->Paginator->sort('jobs_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($hirers as $hirer): ?>
        <tr>
            <td><?= $this->Number->format($hirer->id) ?></td>
            <td><?= h($hirer->date) ?></td>
            <td>
                <?= $hirer->has('user') ? $this->Html->link($hirer->user->id, ['controller' => 'Users', 'action' => 'view', $hirer->user->id]) : '' ?>
            </td>
            <td>
                <?= $hirer->has('job') ? $this->Html->link($hirer->job->title, ['controller' => 'Jobs', 'action' => 'view', $hirer->job->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $hirer->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hirer->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hirer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hirer->id)]) ?>
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
