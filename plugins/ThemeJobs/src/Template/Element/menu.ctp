<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo $this->Html->link($this->Html->image("logo.png", ['alt' => 'Tukole']),['controller' => 'Jobs', 'action' => 'index'], ['escape' => false,'class'=>'navbar-brand']); ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Find Jobs">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><?= $this->Html->link(__('Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('How it works'),['controller' => 'Works', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('Post a job'), ['controller' => 'Jobs', 'action' => 'postjob']) ?></li>
		<?php if($authUser['id'] <= 0): ?>
		<li class="active"><?= $this->Html->link(__('Get started'), ['controller' => 'Users', 'action' => 'login']) ?></li>
		<?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>