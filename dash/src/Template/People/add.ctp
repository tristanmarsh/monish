<!-- src/Template/People/add.ctp -->

<div class="users form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Registration') ?></legend>
		<?= $this->Form->input('first_name') ?>
		<?= $this->Form->input('last_name') ?>
		<?= $this->Form->input('gender', [
			'options' => ['M' => 'Male', 'F' => 'Female']
		]) ?>
		<?= $this->Form->input( 'phone', array( 'type' => 'number' )) ?>
		<?= $this->Form->input('email') ?>
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

