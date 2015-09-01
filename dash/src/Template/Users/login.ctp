<!-- <!-- File: src/Template/Users/login.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>


<?php if ($user['role'] === "admin") : ?>

	<h1>Dashboard</h1>

<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>

	<h1>Welcome to the tenants dashboard</h1>

	<p>

		You can manage the detail and add request with the buttons on the left:<br>

	</p>

<?php endif; ?>