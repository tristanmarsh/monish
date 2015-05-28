<!-- <!-- File: src/Template/Users/login.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>


<?php if ($user['role'] === "admin") : ?>

    <h3>Welcome to the administrator dashboard</h3>


    <p>

        You can manage the database with the buttons on the left:<br>

    </p>
<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>


    <h3>Welcome to the tenants dashboard</h3>


    <p>

        You can manage the detail and add request with the buttons on the left:<br>

    </p>

<?php endif; ?>