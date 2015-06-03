<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<?php $user = $this->Session->read('Auth.User'); ?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('bootstrap-theme.min.css') ?>
	<?= $this->Html->css('base.css') ?>
	<?= $this->Html->css('custom.css') ?>

	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('bootstrap-theme.min.css') ?>

	<?= $this->Html->script('jquery-2.1.3.min.js') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>


</head>

<body>


	<!-- User not logged in -->
	<?php if (!$this->Session->read('Auth.User')) : ?>

		<?php echo $this->element('login'); ?>

	<?php else : ?>

	<nav class="navbar navbar-inverse navbar-fixed-top">

		<div class="container-fluid">

			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
				  <div class="navbar-image">
					<?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House'], ['class' => 'navbar-logo'] ) ?>
					<span>Monash ISH Dashboard</span>
				  </div>
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				<ul class="nav navbar-nav">
					<li class="active visible-xs"><a href="#">Link<span class="sr-only">(current)</span></a></li>
					
					<li class="visible-xs"><?= $this->Html->link('Requests', ['controller' => 'Requests', 'action' => 'index']) ?></li>
					<li class="visible-xs"><?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'index']) ?></li>
					<li class="visible-xs"><?= $this->Html->link('People', ['controller' => 'people', 'action' => 'index']) ?></li>
					<li class="visible-xs"><?= $this->Html->link('Students', ['controller' => 'students', 'action' => 'index']) ?></li>
					<li class="visible-xs"><?= $this->Html->link('Leases', ['controller' => 'leases', 'action' => 'index']) ?></li>
					<li class="visible-xs"><?= $this->Html->link('Properties', ['controller' => 'properties', 'action' => 'index']) ?></li>
					<li class="visible-xs"><?= $this->Html->link('Rooms', ['controller' => 'rooms', 'action' => 'index']) ?></li>
					<li class="visible-xs"><?= $this->Html->link('Tests', ['controller' => 'tests', 'action' => 'index']) ?></li>

					<li class="visible-xs"><a href="#">Link</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					
					<!-- User logged in -->
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<?php echo $user['username']; ?>
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						
						<li><?= $this->Html->link('My Profile', ['controller' => 'people', 'action' => 'index']) ?></li>
						
						<li class="divider"></li>
						
						<li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>

					</ul>

				</ul>

			</div><!-- /.collapse -->

		</div><!-- /.container-fluid -->
		
	</nav>

	<!-- Retrieve correct sidebar -->
	<div class="col-sm-1 col-md-2 sidebar hidden-xs">
	
		<?php echo $this->element('sidebar'); ?>

	</div>

	<div class="row">

		<div class="col-sm-11 col-sm-offset-1 col-md-offset-2 col-md-10 main-content">

			<div class="row">

				<header>
					<div class="container-fluid">
						
						<div class="page-header">
							<span><?= $this->fetch('title') ?></span> 
						</div>

						<div class="row">

							<ol class="breadcrumb">
								<?= $this->Html->getCrumbs(' > ', 'Home') ?>
								<? echo $this->Html->getCrumbList(); ?>
							</ol>
							
						</div>

					</div>
				</header>

			</div>

			<div class="container-fluid">

				<div class="content">

					<div id="content">

						<?= $this->Flash->render() ?>

						<div class="row">
							<?= $this->fetch('content') ?>
						</div>

					</div>

				</div>
			</div>

			<footer>
				<?php echo $this->element('footer'); ?>
			</footer>

		</div>
	</div>

	<?php endif; ?>

</body>
</html>
