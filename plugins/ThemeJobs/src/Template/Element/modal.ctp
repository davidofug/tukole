<div id="popup" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<p><b>Communicate about,</b><b id="job"></b></p>
</div>
<div class="modal-body">
<?= $this->Form->create(null,['context' => ['validator' => 'message'],'url' => ['controller' => 'Messages', 'action' => 'chat']]); ?>
<input type="hidden" name="date" id="date" value="<?= date('Y-m-d H:i:s'); ?>" />
<input type="hidden" name="jobs_id" id="jobs_id" />
<input type="hidden" name="jobtitle" id="jobtitle" />
<input type="hidden" name="senders_id" id="senders_id" value="<?= $authUser['id'] ?>" />
<input type="hidden" name="receivers_id" id="receivers_id"  />
<input type="hidden" name="status" id="status" value="0"  />
<input type="hidden" name="responseid" id="responseid" value="0"  />
<label>Message<br /><small>(Only 200 characters allowed)</small></label>
<textarea style="height:80px;" class="form-control" id="messagebox" name="msg" maxlength="200"></textarea>
</div>
<div class="modal-footer">
<span id="chars">200</span>
<input type="submit" class="btn btn-info" value="Send"/>
<?= $this->Form->end(); ?>
</div>
</div>
</div>
</div>

<div id="popuperr1" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<p><b>Error occured!</b></p>
</div>
<div class="modal-body">
<p>You need to be logged in!</p>
</div>
<div class="modal-footer">
<?php echo $this->HTML->link(__('Login now'),['controller'=>'Users','action'=>'login']); ?>
</div>
</div>
</div>
</div>

<div id="popuperr2" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<p><b>Error occured!</b></p>
</div>
<div class="modal-body">
<p>You con not chat with yourself!</p>
<p>Please choose a job which was posted by another member.</p>
</div>
</div>
</div>
</div>