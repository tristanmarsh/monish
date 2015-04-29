<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $emergency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $emergency->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Emergencies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Emergency Student'), ['controller' => 'EmergencyStudent', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emergency Student'), ['controller' => 'EmergencyStudent', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
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
</div>
