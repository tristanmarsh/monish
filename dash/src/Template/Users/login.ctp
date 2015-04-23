<!-- File: src/Template/Users/login.ctp -->

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
    <p>Don't have an account? <?= $this->Html->link('Sign Up', ['action' => 'add']) ?>!</p>
    <p><small>Testing Purposes Only: Admin Credentials <br>username: admin <br>password: asdasd</small></p>
</div>