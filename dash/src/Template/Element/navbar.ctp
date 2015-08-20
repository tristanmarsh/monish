<!-- File: src/Template/Element/navbar.ctp -->

<?php $user = $this->Session->read('Auth.User'); ?>

					<nav class="navbar navbar-fixed-top">

						<div class="container-fluid">

							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">

								<button type="button" id="navigation-toggle" class="navbar-toggle">
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
								
								<!-- <ul class="nav navbar-nav">
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
								</ul> -->

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

							</div><!-- /.collapse -->

						</div><!-- /.container-fluid -->

						<header>
							<ol class="breadcrumb">
								<?php echo $this->Html->getCrumbs(' > ', 'Home') ?>
								<?php echo $this->Html->getCrumbList(); ?>
							</ol>
						</header>
						
					</nav>