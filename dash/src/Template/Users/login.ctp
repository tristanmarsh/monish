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
</div><!-- /.escape row -->
</div><!-- /.escape content -->
</div><!-- /.escape container -->

	<div class="col-sm-3 sidebar">
			
			<ul class="nav nav-sidebar">
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Requests', ['controller' => 'Requests', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'index']) ?>
			    </li>
				
				<li>
					<span class="glyphicon glyphicon-star"></span>
					<?= $this->Html->link('Emergency Contacts', ['controller' => 'emergencies', 'action' => 'index']) ?>
				</li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Students', ['controller' => 'students', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Leases', ['controller' => 'leases', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Properties', ['controller' => 'properties', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Rooms', ['controller' => 'rooms', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<span style="float:right"><?= $this->html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
			    </li>

			</ul>

	</div>

	<div class="col-sm-9">

		<div class="content">

			<h3>Welcome to the administrator dashboard</h3>

		</div>

	</div>
<p>

You can manage the database with the buttons on the left:<br>



</p>
<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>

</div><!-- /.escape row -->
</div><!-- /.escape content -->
</div><!-- /.escape container -->

	<div class="col-sm-3 sidebar">

		<?php echo $this->element('tenant-sidebar'); ?>
		
	</div>

	<div class="col-sm-9">

		<div class="content">

			<h3>Welcome to the tenants dashboard</h3>

		</div>

	</div>
<p>

You can manage the database with the buttons on the left:<br>

</p>

<?php endif; ?>