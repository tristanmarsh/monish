<!-- File: src/Template/Element/login.ctp -->


<div class="container">
	<div class="row">
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
			        <!--<p>Don't have an account? <?= $this->Html->link('Sign Up', ['action' => 'add']) ?>!</p>-->
			        <!--<p><small>Testing Purposes Only: Admin Credentials <br>username: admin <br>password: asdasd</small></p>-->
			    </div>
			<?php endif; ?>	
</div>
	</div>
</div>