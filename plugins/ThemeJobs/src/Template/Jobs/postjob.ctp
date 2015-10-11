<div class="row">
<div class="col-sm-6 col-md-6">
<video width="400" height="200" controls>
 
  Your browser does not support the video tag.
</video> 
<h3>Frequently asked questions.</h3>
<ol>
<li><h4>What is Yiya Job?</h4></li>
Yiya Job is a web and mobile based platform where anyone can instantly post or apply for jobs.

<li><h4>How do i get started?</h4></li>
It's easy all you need to do is register to create your account, then you'll be able to post or apply for jobs.

<li><h4>How do i post a job?</h4></li>
Click 'Post from the menu and then you'll be equired to enter the neccesary details.

<li><h4>How do i apply for a job?</h4></li>
Click 'Post from the menu and then you'll be equired to enter the neccesary details.

<li><h4>Do i have to pay to apply for a job?</h4></li>
No, you don't.Yiya Job is a free service.
</ol>

</div>

<div class="col-md-offset-1 col-sm-5 col-md-5" >
<?php $minYear = date('Y');
 $maxYear = $minYear+2;
$date = date('Y-m-d H:i:s');
 ?>
<?= $this->Form->create(); ?>
<?= $this->Form->hidden('date',['value'=>$date]); ?>
<?= $this->Form->hidden('mdate',['value'=>'0000-00-00 00:00:00']); ?>
<?= $this->Form->hidden('hirers_id',['value'=>$authUser['id']]); ?>
<?= $this->Form->hidden('appliers_id',['value'=>0]); ?>
<?= $this->Form->hidden('mtimes',['value'=>0]); ?>
<?= $this->Form->hidden('status',['value'=>0]); ?>
<?= $this->Form->input('title',['label'=>'Job title','class'=>'form-control']); ?>
<?= $this->Form->input('budget',['label'=>'Budget(UGX)','class'=>'form-control']); ?>
<?= $this->Form->input('location',['label'=>'Location','class'=>'form-control']); ?>
<?= $this->Form->input('phone',['label'=>'Phone','class'=>'form-control']); ?>
<h3>Project time line</h3>
<hr/>
<?= $this->Form->input('start',['label'=>'When to start','class'=>'form-control']); ?>
<?= $this->Form->input('end',['label'=>'When to end','class'=>'form-control']); ?>
<?= $this->Form->input('details',['type'=>'textarea','rows'=>5,'label'=>'Description','class'=>'form-control']); ?>
<div style="height:10px"></div>
<?= $this->Form->button('submit',['class'=>'btn btn-info']); ?>
<?= $this->Form->button('Reset',['class'=>'btn btn-info text-center']); ?>
<?= $this->Form->end() ?>
</div>
</div>