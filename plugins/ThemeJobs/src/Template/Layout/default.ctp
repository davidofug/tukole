<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->meta('icon') ?>
	
    <?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('font-awesome.min.css') ?>
	<?= $this->Html->css('custom.css') ?>
	<?= $this->Html->css('animate.css') ?>
	<?= $this->Html->css('morphext.css') ?>
<!-- Start JQuery UI -->
	<?= $this->Html->css('jquery.datetimepicker.css'); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,400' rel='stylesheet' type='text/css'>
	<title>
		<?php $cakeDescription = "Tukole"; ?>
        <?= $cakeDescription ?> | 
        <?= $this->fetch('title') ?>
    </title>
</head>
<body>
<?php echo $this->element('modal'); ?>
<?php echo $this->element('Menu'); ?>
<?php if(!isset($authUser)): ?>
<?php	echo $this->element('header'); ?>
<?php endif; ?>
<?php if(isset($authUser)): ?>
<?php	echo $this->element('logged'); 
endif;
?>
<div class="container" style="padding-top:50px;">
<div class="text-center">
<?= $this->Flash->render() ?>
<?= $this->Flash->render('auth') ?>
</div>
<?= $this->fetch('content') ?>
</div>
<footer style="background-color:#1e8ad2;margin-top:100px;">

<div style="background-color:#f4f4f4;padding-top:50px;padding-bottom:50px;">
<div class="container" >
<h3 class="text-center">Associated with</h3>

<div class="col-lg-3 col-md-3 partner">
	<h3>Gagawala</h3>
</div>
<div class="col-lg-3 col-md-3 partner">
	<h3>Kansaga.com</h3>
</div>
<div class="col-lg-3 col-md-3 partner">
	<h3>Galaxy FM</h3>
</div>

<div class="col-lg-3 col-md-3 partner">
	<h3>UCOTA</h3>
</div>
</div>
</div>

<div class="text-center" style="color:#fff;padding-top:50px;">
<p>Do you like this idea, is it life changing, why not keep it alive?</p>
<button class="btn btn-outline" style="background:none;color:#fff;border-color:#ffffff;">DONATE</button>
</div>

<div class="container">
<hr />
</div>

<div class="container">
<div class="row">
<nav class="navbar">
<ul class="nav navbar-nav">
<li><a href="#" class="">&copy; YiyaJob.com | 2015</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">

<li><a href="privacy.html">Privacy</a></li>
<li><a href="terms.html" class="">Terms &amp; Conditions</a></li>
<li class="nav-divider"></li>
<li><a href="team.html" >Team</a></li>
<li><a href="report.html" class="">Report</a></li>
<li><a href="contact.html" class="">Contact Us</a></li>
<li><a href="help.html" class="">Help</a></li>
</ul>
</nav>
</div>

</footer>
<?php echo $this->element('footer'); ?>
</body>
</html>