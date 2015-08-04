<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb('Add Property', array('controller' => 'properties', 'action' => 'add'));
?>    
<div class="properties form large-10 medium-9 columns">
    <?= $this->Form->create($property); ?>
    <fieldset>
        <legend><?= __('Add Property') ?></legend>
        <?php
            echo $this->Form->input('address');
            echo $this->Form->input('number_rooms');
            echo $this->Form->input('bathrooms', [
                'options' => ['0' => 'None', '1', '2', '3', '4']
            ]);
            echo $this->Form->input('kitchens', [
                'options' => ['0' => 'None', '1', '2']
            ]);
            echo $this->Form->input('storeys', [
                'options' => ['1', '2', '3']
            ]);
            echo $this->Form->input('garage', [
                'options' => ['TRUE' => 'Yes', 'FALSE' => 'No']
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>
