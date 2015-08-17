<!-- File: src/Template/Element/login.ctp -->

<div class="container">

	<div class="row">

		<div class="vertical-align">

			<div class="col-sm-6 col-sm-offset-3 panel wow fadeInDown">
				
				<div class="logo text-center">
					<?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House','class' => 'navbar-logo img-responsive text-center','width'=>'200px'])  ?>
					<h1>Monash ISH Dashboard</h1>

				</div>

				<div class="form">

					<?php if (!$this->Session->read('Auth.User')) : ?>             			
					    <div class="users form">
					        <?= $this->Flash->render('auth') ?>
					        <?= $this->Form->create() ?>
					        <fieldset>
					            <legend>Please enter your username and password</legend>
					            <?= $this->Form->input('username', array('class' => 'form-control')) ?>
					            <?= $this->Form->input('password', array('class' => 'form-control')) ?>
					        </fieldset>
					        <?= $this->Form->button(__('Login'), ['class' => 'form-control btn btn-info']); ?>
					        <?= $this->Form->end() ?>
					      
					    </div>
					<?php endif; ?>		

				</div>

			</div>
		</div>
	</div>
</div>