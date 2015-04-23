<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Internet Connection'), ['action' => 'edit', $internetConnection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internet Connection'), ['action' => 'delete', $internetConnection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internetConnection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internet Connection'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internet Connection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leases'), ['controller' => 'Leases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lease'), ['controller' => 'Leases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="internetConnection view large-10 medium-9 columns">
    <h2><?= h($internetConnection->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Lease') ?></h6>
            <p><?= $internetConnection->has('lease') ? $this->Html->link($internetConnection->lease->id, ['controller' => 'Leases', 'action' => 'view', $internetConnection->lease->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($internetConnection->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Start') ?></h6>
            <p><?= h($internetConnection->date_start) ?></p>
            <h6 class="subheader"><?= __('Date End') ?></h6>
            <p><?= h($internetConnection->date_end) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Bandwidth') ?></h6>
            <?= $this->Text->autoParagraph(h($internetConnection->bandwidth)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Monthly Fee') ?></h6>
            <?= $this->Text->autoParagraph(h($internetConnection->monthly_fee)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <?= $this->Text->autoParagraph(h($internetConnection->status)); ?>

        </div>
    </div>
</div>
