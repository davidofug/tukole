<div class="row">
<div class="col-lg-5 col-lg-5">
<h3>Already registered?<br />Login right away!</h3>
<?= $this->Form->create() ?>
<?= $this->Form->input('username',['placeholder'=>'Username','label'=>'Username','class'=>'form-control']) ?>
<?= $this->Form->input('password',['placeholder'=>'password','label'=>'Password','class'=>'form-control']) ?>
<?= $this->Form->button('Login',['class'=>'btn btn-info']) ?>
<?= $this->Form->end() ?>
<p><?= $this->HTML->link('Forgot password',['controller'=>'Users','action'=>'recover']) ?></p>


</div>

<div class="col-lg-2 col-md-2"style="text-align:center;">
<?php echo $this->HTML->image('line.png',['style'=>['width'=>'59px']]) ?>
</div>

<div class="col-lg-5 col-md-5">

<h3>Create a free account</h3>

<?php echo $this->Form->create(null, ['context' => ['validator' => 'register'],'url' => ['controller' => 'Users', 'action' => 'register']]); ?>
        <?php
            echo $this->Form->hidden('role',['value'=>1]);
            echo $this->Form->input('username',['class'=>'form-control','placeholder'=>'username']);
            echo $this->Form->input('password',['class'=>'form-control']);
			echo $this->Form->input('cpassword',['type'=>'password','class'=>'form-control','label'=>'Confirm password']);
			echo $this->Form->input('terms',['type'=>'checkbox','label'=>'I have read, understand and agree to Terms and conditions.']);
			echo $this->Form->button('Register',['class'=>'btn btn-info']);
        ?>
<?php echo $this->Form->end(); ?>
</div>
</div>