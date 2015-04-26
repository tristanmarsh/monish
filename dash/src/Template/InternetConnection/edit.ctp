<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $internetConnection->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $internetConnection->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Internet Connection'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leases'), ['controller' => 'Leases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lease'), ['controller' => 'Leases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="internetConnection form large-10 medium-9 columns">
    <?= $this->Form->create($internetConnection); ?>
    <fieldset>
        <legend><?= __('Edit Internet Connection') ?></legend>
        <?php
            echo $this->Form->input('lease_id', ['options' => $leases]);
            echo $this->Form->input('bandwidth');
            echo $this->Form->input('monthly_fee');
            echo $this->Form->input('date_start');
            echo $this->Form->input('date_end');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'InternetConnection', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>
