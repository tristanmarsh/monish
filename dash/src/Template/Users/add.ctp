<!-- src/Template/Users/add.ctp -->

<div class="users form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Registration') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('role', [
            'options' => ['tenant' => 'Tenant']
        ]) ?>
		<?= $this->Form->input('title', [
			'options' => ['MR' => 'Mr', 'MRS' => 'Mrs', 'MISS' => 'Miss', 'DR' => 'Dr']
		]) ?>
		<?= $this->Form->input('first_name') ?>
		<?= $this->Form->input('last_name') ?>
		<?= $this->Form->input('gender', [
			'options' => ['M' => 'Male', 'F' => 'Female']
		]) ?>
		<?= $this->Form->input('phone') ?>
		<?= $this->Form->input('email') ?>
		<?= $this->Form->input('home_country') ?>
		<?= $this->Form->input('city') ?>
		<?= $this->Form->input('suburb') ?>
		<?= $this->Form->input('postcode') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
	<?php
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Users', 'action' => 'index']
		]);
	echo $this->Form->button(__('Cancel'));
	?>
</div>

