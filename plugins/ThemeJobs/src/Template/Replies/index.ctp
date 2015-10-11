<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Reply'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="replies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('msg') ?></th>
            <th><?= $this->Paginator->sort('jobs_id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('senders_id') ?></th>
            <th><?= $this->Paginator->sort('receivers_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($replies as $reply): ?>
        <tr>
            <td><?= $this->Number->format($reply->id) ?></td>
            <td><?= h($reply->date) ?></td>
            <td><?= h($reply->msg) ?></td>
            <td>
                <?= $reply->has('job') ? $this->Html->link($reply->job->title, ['controller' => 'Jobs', 'action' => 'view', $reply->job->id]) : '' ?>
            </td>
            <td><?= h($reply->title) ?></td>
            <td><?= $this->Number->format($reply->senders_id) ?></td>
            <td><?= $this->Number->format($reply->receivers_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $reply->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reply->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reply->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reply->id)]) ?>
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
