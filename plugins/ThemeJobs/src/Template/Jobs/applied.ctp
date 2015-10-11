<div class="text-center">
	<?php foreach($applied as $applied): ?>
		<div class="text-center job">
			<h3><?= h($applied->title); ?><span class="budget"> @ <?= h($applied->budget) ?>/=</span></h3>
			<p><small><?= $applied->location ?> | Time line : <?= h($applied->start)?> to <?= h($applied->end); ?></small></p>
			<p><?= $applied->details ?> <br><?php if(!empty($applied->phone)): echo '<span class="phone">Contact '.$applied->phone.'</span>'; endif;?></p>
			<p><?= $this->Html->link(__('Chat'), ['controller'=>'messages','action' => 'chat', $applied->id,$applied->hirers_id,$authUser['id']],['escape' => false,'class'=>' btn btn-info btn-md']) ?></p>
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