<!--Loads the jQuery scripts used in this view-->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script>
        $(function() {
            $( "#dateStartPicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    <script>
        $(function() {
            $( "#dateEndPicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
</head>

<div class="users form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('New Tenant + Lease') ?></legend>
		<?= $this->Form->input('first_name') ?>
		<?= $this->Form->input('last_name') ?>
        <?= $this->Form->input('common_name') ?>
		<?= $this->Form->input('gender', [
			'options' => ['M' => 'Male', 'F' => 'Female']
		]) ?>
		<?= $this->Form->input('phone') ?>
		<?= $this->Form->input('email') ?>
		<?= $this->Form->input('internet_plan', ['options' => ['FREE' => 'FREE', 'BASIC' => 'BASIC', 'STANDARD' => 'STANDARD', 'PREMIUM' => 'PREMIUM']]) ?>
		<?= $this->Form->input('property_id', ['options' => $properties]); ?>
        <?= $this->Form->input('room_id', ['options' => $rooms]); ?>
        <?= $this->Form->input('date_start',['id'=>'dateStartPicker']); ?>
        <?= $this->Form->input('date_end',['id'=>'dateEndPicker']); ?>
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

