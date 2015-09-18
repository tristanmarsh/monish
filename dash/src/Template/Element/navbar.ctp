<!-- File: src/Template/Element/navbar.ctp -->

<?php $user = $this->Session->read('Auth.User'); ?>

<nav class="navbar navbar-fixed-top">

	<div class="container-fluid">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">

			<div class="navbar-image navbar-brand hidden-xs hidden-sm hidden-md hidden-lg">
				<?= $this->Html->image('logo-monish.png', [
					'alt' => 'Monash International Student House',
					'url' => ['controller' => 'Users', 'action' => 'login']
					],
					['class' => 'navbar-logo']
				); ?>

				<span>Monash ISH</span>
			</div>

			<button type="button" id="navigation-toggle" class="navbar-toggle pull-right">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			<ul class="nav navbar-nav navbar-right">

			</ul>

		</div><!-- /.collapse -->

	</div><!-- /.container-fluid -->

	<header>
		<ol class="breadcrumb">
			<?php echo $this->Html->getCrumbs(' > ', 'Home') ?>
			<?php echo $this->Html->getCrumbList(); ?>
		</ol>
	</header>
	
</nav>