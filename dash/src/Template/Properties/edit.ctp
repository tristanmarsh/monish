<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $property->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="properties form large-10 medium-9 columns">
    <?= $this->Form->create($property); ?>
    <fieldset>
        <legend><?= __('Edit Property') ?></legend>
        <?php
            echo $this->Form->input('address');
            echo $this->Form->input('number_rooms');
            echo $this->Form->input('bathrooms');
            echo $this->Form->input('kitchens');
            echo $this->Form->input('storeys');
            echo $this->Form->input('garage');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
