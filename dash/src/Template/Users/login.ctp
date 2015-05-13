<!-- File: src/Template/Users/login.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

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

<?php if ($user['role'] === "admin") : ?>
	<p><br>You are already logged in as <?php echo $user['username']; ?>!</p>
	<?php echo $this->Html->link('Back to Dashboard', ['controller' => 'dashboards', 'action' => 'index']); ?>
<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>
	<p><br>You are already logged in as <?php echo $user['username']; ?>!</p>
	<?php echo $this->Html->link('Back to Dashboard', ['controller' => 'tenantsdashboards', 'action' => 'index']); ?>
<?php endif; ?>