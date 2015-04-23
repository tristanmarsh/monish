<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leases'), ['controller' => 'Leases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lease'), ['controller' => 'Leases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="payments form large-10 medium-9 columns">
    <?= $this->Form->create($payment); ?>
    <fieldset>
        <legend><?= __('Add Payment') ?></legend>
        <?php
            echo $this->Form->input('lease_id', ['options' => $leases]);
            echo $this->Form->input('date_paid');
            echo $this->Form->input('amount');
            echo $this->Form->input('payment_period_starting');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
