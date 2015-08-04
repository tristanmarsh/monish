<?php
    $this->Html->addCrumb('Rooms', '/rooms');
    $this->Html->addCrumb('Edit Room', array('controller' => 'rooms', 'action' => 'edit'));
?>    
<div class="rooms form large-10 medium-9 columns">
    <?= $this->Form->create($room); ?>
    <fieldset>
        <legend><?= __('Edit Room') ?></legend>
        <?php
            echo $this->Form->input('room_name');
            echo $this->Form->input('property_id', ['options' => $properties]);
            echo $this->Form->input('vacant', [
                'options' => ['TRUE' => 'Yes', 'FALSE' => 'No']
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Rooms', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>
