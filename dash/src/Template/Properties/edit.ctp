<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb('Edit Property', array('controller' => 'properties', 'action' => 'edit'));
?>
<div class="properties form large-10 medium-9 columns">
    <?= $this->Form->create($entity, array('type' => 'file')); ?>
    <fieldset>
        <legend><?= __('Edit Property') ?></legend>
        <?php
            echo $this->Form->input('address');
			echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Picture (Optional)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>
