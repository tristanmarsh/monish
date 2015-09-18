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

					<!-- Nav tabs -->
                    <ul class="nav nav-pills" role="tablist">
                       
                        <li role="presentation">
                            <a href="#log-in" style="height:0;margin:0;padding:0;" aria-controls="log-in" role="tab" data-toggle="tab">
                                <?= $this->Html->link('Login', ['action' => 'login']) ?>
                            </a>
                        </li>
                        
                        <li role="presentation"class="active">
                            <a href="#account-recovery" style=""aria-controls="account-recovery" role="tab" data-toggle="tab">Account Recovery</a>
                        </li>

                    </ul>

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
						
						<?= $this->Form->button('Update Password', ['type' => 'submit', 'class' => 'btn btn-primary btn-primary btn-block']) ?>

						<?= $this->Form->end() ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
