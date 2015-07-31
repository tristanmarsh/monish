<!-- File: src/Template/Element/login.ctp -->




<div class="container">

	<div class="row">

		<div class="col-sm-6 col-sm-offset-3 text-center">
			<?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House','class' => 'navbar-logo img-responsive text-center','width'=>'200px'])  ?>
			<div>Monash ISH Dashboard</div>
		</div>

		<div class="col-sm-6 col-sm-offset-3">
			<?php if (!$this->Session->read('Auth.User')) : ?>             			
			    <div class="users form">
			        <?= $this->Flash->render('auth') ?>
			        <?= $this->Form->create() ?>
			        <fieldset>
			            <legend><?= __('Please enter your username and password') ?></legend>
			            <?= $this->Form->input('username') ?>
			            <?= $this->Form->input('password') ?>
			        </fieldset>
			        <?= $this->Form->button(__('Login')); ?>
			        <?= $this->Form->end() ?>
			      
			    </div>
			<?php endif; ?>	
</div>
	</div>
</div>