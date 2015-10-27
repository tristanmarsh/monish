<!-- File: src/Template/Users/changepassword.ctp -->

<div class="container">

	<div class="row">

		<!-- <div class="col-sm-6 col-sm-offset-3 panel wow fadeInDown"> -->
		<div class="panel log-in-window col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

			<div class="panel-body">

				<div class="logo">
					<?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House','class' => 'img-responsive img-center','width'=>'200px'])  ?>
					<h1 class="text-center">Monash ISH Dashboard</h1>
				</div>
				
				<?= $this->Flash->render() ?>
				
				<div>

					<div role="tabpanel" class="tab-pane fade in" id="password-recovery">

						<?= $this->Form->create($user, ['novalidate' => true]) ?>

						<hr>

						<fieldset>

							<div class="form-group">
                                <label for="password">New Password</label>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" name="password" class="form-control" placeholder="New Password">
								</div>
							</div>

							<div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password">
								</div>
							</div>
								
						</fieldset>

						<br>
						
						<?= $this->Form->button('<i class="fa fa-pencil"></i> Login',
						['type' => 'submit', 'class' => 'form-control button button-large button-3d button-block button-rounded button-action', 'escape' => false]) ?>

		                <?= $this->Html->link(
		                  '<i class="glyphicon glyphicon-log-in"></i> Login',
		                  ['action' => 'login'],
		                  ['class' => 'form-control button button-small button-block button-rounded button-warning', 'escape' => false]
		                ); ?>

						<?= $this->Form->end() ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
