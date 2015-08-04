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

$cakeDescription = 'Monish Dashboard';
?>
<?php $user = $this->Session->read('Auth.User'); ?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

	<link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="favicons/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#88c6ff">

	<title>
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
	</title>

	<!-- <?= $this->Html->meta('icon') ?> -->

	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('custom.css') ?>
	<?= $this->Html->css('animate.min.css') ?>

	<?= $this->Html->script('wow.min.js') ?>
	<?= $this->Html->script('min/custom-min.js') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>

	<script>
		new WOW().init();
	</script>

	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Open+Sans:400italic,400' rel='stylesheet' type='text/css'>


</head>

<body>


	<!-- User not logged in -->
	<?php if (!$this->Session->read('Auth.User')) : ?>

	<?php echo $this->element('login'); ?>

<?php else : ?>



	<div class="container-fluid">

		<div class="row">

			<!-- Retrieve correct sidebar -->
			<div class="col-sm-1 col-md-2 sidebar hidden-xs">

				<?php echo $this->element('sidebar'); ?>

			</div>


			<div class="col-sm-11 col-sm-offset-1 col-md-offset-2 col-md-10 main-content">
				
				<div class="row">
					
					<nav class="navbar navbar-fixed-top col-sm-11 col-sm-offset-1 col-md-offset-2 col-md-10 pull-right">

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

									</li>

								</ul>

								<ul class="nav navbar-nav navbar-right">
									
									<li><?= $this->Html->link(__('Update Rooms'), ['controller' => 'Tenants', 'action' => 'updaterooms']) ?></li>

								</ul>
							</div><!-- /.collapse -->

						</div><!-- /.container-fluid -->

					</nav>


				</div>

				<div class="row">

					<header>
						<div class="container-fluid">

							<div class="page-header">
								<span><?= $this->fetch('title') ?>--></span> 
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

						<?= $this->Flash->render() ?>


						<?= $this->fetch('h1') ?>

						<?= $this->fetch('content') ?>



					</div>



					<footer>
						<?php echo $this->element('footer'); ?>
					</footer>
					
				</div>

			</div>
		</div>

	</div><!-- /.container -->

<!-- 	<?php endif; ?>

</body>
</html> -->
