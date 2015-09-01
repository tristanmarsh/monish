<!-- <!-- src/Template/Users/changepassword.ctp -->

<div class="container">

	<div class="row">

		<!-- <div class="col-sm-6 col-sm-offset-3 panel wow fadeInDown"> -->
		<div class="panel log-in-window col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

			<div class="panel-body">

				<div class="logo">
					<?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House','class' => 'img-responsive img-center','width'=>'200px'])  ?>
				</div>

				<h1 class="text-center">Reset Password</h1>
				
				<?= $this->Flash->render() ?>
				
				<div>

					<div class="users form">
						<?= $this->Form->create($user, ['novalidate' => true]) ?>
						<fieldset>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" name="password" class="form-control" placeholder="Enter password">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" name="confirm_password" class="form-control" placeholder="Enter password">
								</div>
							</div>
							<div class="form-group">
								<?= $this->Form->button('Submit', ['type' => 'submit', 'class' => 'btn btn-primary btn-primary btn-block']) ?>
								<?= $this->Form->end() ?>
							</div>
						</fieldset>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
