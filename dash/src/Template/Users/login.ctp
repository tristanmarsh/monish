<!-- <!-- File: src/Template/Users/login.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>


<?php if ($user['role'] === "admin") : ?>

	<h1>Dashboard</h1>

	<div class="container-fluid">
		<div class="row">
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="panel clearfix">
						<h2 class="text-center">Tenants</h2>
						<hr>
						<ul class="nav nav-pills pull-left">
							<li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
							<li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
						</ul>

						<form class="navbar-form navbar-left" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Submit</button>
								</span>
							</div><!-- /input-group -->
						</form>

					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="panel clearfix">
						<h2 class="text-center">Requests</h2>
						<hr>
						<ul class="nav nav-pills pull-left">
							<li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
							<li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
						</ul>
						
						<form class="navbar-form navbar-left" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Submit</button>
								</span>
							</div><!-- /input-group -->
						</form>

					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="panel clearfix">
						<h2 class="text-center">Properties</h2>
						<hr>
						<ul class="nav nav-pills pull-left">
							<li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
							<li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
						</ul>
						
						<form class="navbar-form navbar-left" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Submit</button>
								</span>
							</div><!-- /input-group -->
						</form>

					</div>
				</div>
			</div>
		</div>


	</div>


<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>


	<h1>Welcome to the tenants dashboard</h1>


	<p>

		You can manage the detail and add request with the buttons on the left:<br>

	</p>

<?php endif; ?>