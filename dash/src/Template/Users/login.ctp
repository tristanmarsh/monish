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


                <h3>Welcome to the administrator dashboard</h3>


    <p>

    You can manage the database with the buttons on the left:<br>

    </p>
<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>


                <h3>Welcome to the tenants dashboard</h3>


    <p>

    You can manage the database with the buttons on the left:<br>

    </p>

<?php endif; ?>