<!-- src/Template/Users/add.ctp -->

<div class="users form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Registration') ?></legend>
        <?= $this->Form->input('person_id', ['options' => $people]) ?>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('role', [
            'options' => ['tenant' => 'Tenant']
        ]) ?>
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

