<div class="emergencies form large-10 medium-9 columns">
    <?= $this->Form->create($emergency); ?>
    <fieldset>
        <legend><?= __('Edit Emergency') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('phone');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	<?= $this->Form->create(null, [
        'url' => ['controller' => 'Emergencies', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>
