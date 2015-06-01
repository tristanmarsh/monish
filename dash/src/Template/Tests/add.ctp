<!-- src/Template/People/add.ctp -->

<div class="users form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('New Tenant + Lease') ?></legend>
		<?= $this->Form->input('first_name') ?>
		<?= $this->Form->input('last_name') ?>
		<?= $this->Form->input('gender', [
			'options' => ['M' => 'Male', 'F' => 'Female']
		]) ?>
		<?= $this->Form->input('phone') ?>
		<?= $this->Form->input('email') ?>
		<?= $this->Form->input('internet_plan', ['options' => ['FREE' => 'FREE', 'BASIC' => 'BASIC', 'STANDARD' => 'STANDARD', 'PREMIUM' => 'PREMIUM']]) ?>
		<?= $this->Form->input('property_id', ['options' => $properties]); ?>
        <?= $this->Form->input('room_id', ['options' => $rooms]); ?>
        <?= $this->Form->input('date_start', ['type' => 'date']); ?>
        <?= $this->Form->input('date_end', ['type' => 'date']); ?>
        <?= $this->Form->input('weekly_price'); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
	<?php
	echo $this->Form->create(null, [
		'url' => ['controller' => 'People', 'action' => 'index']
		]);
	echo $this->Form->button(__('Cancel'));
	?>
</div>

