<nav class="navbar navbar-default" id="messages-nav" style="border-radius: none; -moz-border-radius: none; -webkit-border-radius:none;">
<div class="container">
<ul class="nav navbar-nav" >
<li><?php echo $this->HTML->link('Messages',['controller'=>'Messages','action'=>'index']); ?></li>
<li><?php echo $this->HTML->link('Jobs posted',['controller'=>'Jobs','action'=>'posted',$authUser['id']]); ?></li>
<li><?php echo $this->HTML->link('Applied for',['controller'=>'Jobs','action'=>'applied',$authUser['id']]); ?></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li ><?php echo $this->HTML->link('Hi, '.$authUser['username'].'!',['controller'=>'Users','action'=>'account',$authUser['id']]);?></li>
<li ><?php echo $this->HTML->link('Logout',['controller'=>'Users','action'=>'logout']) ?></li>
</ul>
</div>
</nav>