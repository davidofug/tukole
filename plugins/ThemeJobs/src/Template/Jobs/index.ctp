	<div class="text-center">
	<?php foreach($jobs as $job): ?>
		<div class="text-center job">
			<p class="heading"><strong><?= h($job->title); ?></strong><span class="budget"> @ <?= h($job->budget) ?>/=</span></p>
			<p><small><?= $job->location ?> Time line : <?= h($job->start)?> to <?= h($job->end); ?></small></p>
			<p><?= $job->details ?> <br><?php if(!empty($job->phone)): echo '<span class="phone">Contact '.$job->phone.'</span>'; endif;?></p>
			<p><?= $this->Html->link(__('Apply now'), ['action' => 'apply', $job['id'],$authUser['id']],['escape' => false,'class'=>' btn btn-info btn-md']) ?><button class="btn btn-info btn-md chat" data-target="#popup" data-url="<?php echo $this->Url->build(['controller'=>'Jobs','action' => 'getjob',$job->id,$authUser['id']]); ?>">Chat</button></p>
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