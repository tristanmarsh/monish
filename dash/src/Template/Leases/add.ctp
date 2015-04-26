<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Leases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Internet Connection'), ['controller' => 'InternetConnection', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internet Connection'), ['controller' => 'InternetConnection', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="leases form large-10 medium-9 columns">
    <?= $this->Form->create($lease); ?>
    <fieldset>
        <legend><?= __('Add Lease') ?></legend>
        <?php
            echo $this->Form->input('room_id', ['options' => $rooms]);
            echo $this->Form->input('student_id', ['options' => $students]);
            echo $this->Form->input('date_start');
            echo $this->Form->input('date_end');
            echo $this->Form->input('lease_status');
            echo $this->Form->input('weekly_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Leases', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>
