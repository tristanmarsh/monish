<!-- File: src/Template/Element/login.ctp -->

<div class="container">

	<div class="row">

		<div class="logo">
			<?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House','class' => 'img-responsive img-center','width'=>'200px'])  ?>
		   		<h1 class="text-center">Monash ISH Dashboard</h1>
		</div>

			<!-- <div class="col-sm-6 col-sm-offset-3 panel wow fadeInDown"> -->
			<div class="panel log-in-window col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

				<div class="panel-body">


					<?= $this->Flash->render() ?>

					<div>

						<!-- Nav tabs -->
						<ul class="nav nav-pills" role="tablist">
							<li role="presentation" class="active"><a href="#log-in" aria-controls="log-in" role="tab" data-toggle="tab">Login</a></li>
							<li role="presentation"><a href="#account-recovery" aria-controls="account-recovery" role="tab" data-toggle="tab" style="padding-top:0;padding-bottom:0;"><?= $this->Html->link('Account Recovery', ['action' => 'forgot_password']) ?></a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="log-in">

								<?php if (!$this->Session->read('Auth.User')) : ?>

								<?= $this->Flash->render('auth') ?>
								<?= $this->Form->create() ?>
								<fieldset>
									<!-- <legend>Please enter your username and password</legend> -->
									<?= $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'username')) ?>
									<?= $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'password')) ?>

									 <!-- Set cookies later -->
									<div class="checkbox">
										<label><input type="checkbox"> Remember me</label>
									</div>

								</fieldset>

								<?= $this->Form->button(__('Login'), ['class' => 'form-control btn btn-primary']); ?>
								<?= $this->Form->end() ?>

								<?php endif; ?>

							</div>
							<div role="tabpanel" class="tab-pane fade in" id="account-recovery">

								<?php if (!$this->Session->read('Auth.User')) : ?>
								<div class="users form">
									<?= $this->Flash->render('auth') ?>
									<?= $this->Form->create() ?>
									<fieldset>
										<!-- <legend>Do that other thing here, Michael</legend> -->
										<?= $this->Form->input('email', array('class' => 'form-control')) ?>
									</fieldset>
									<br>

									<?= $this->Form->button(__('Send Recovery Email'), ['class' => 'form-control btn btn-primary']); ?>
									<?= $this->Form->end() ?>

								</div>
							<?php endif; ?>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>