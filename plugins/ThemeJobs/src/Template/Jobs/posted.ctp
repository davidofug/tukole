<div class="text-center">
	<?php foreach($posted as $posted): ?>
		<div class="text-center job">
			<h3><?= h($posted->title); ?><span class="budget"> @ <?= h($posted->budget) ?>/=</span></h3>
			<p><small><?= $posted->location ?> | Time line : <?= h($posted->start)?> to <?= h($posted->end); ?></small></p>
			<p><?= $posted->details ?> <br><?php if(!empty($posted->phone)): echo '<span class="phone">Contact '.$posted->phone.'</span>'; endif;?></p>
						<p><?= $this->Html->link(__('Edit'), ['action' => 'edit', $posted['id'],$authUser['id']],['escape' => false,'class'=>' btn btn-info btn-md']) ?><?= $this->Html->link(__('Delete'), ['action' => 'delete', $posted['id'],$authUser['id']],['escape' => false,'class'=>' btn btn-info btn-md']) ?></p>
		</div>
	<?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>