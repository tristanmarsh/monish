<?php
    $this->Html->addCrumb('Leases', '/leases');
    $this->Html->addCrumb('View Lease');
?>
    <h1>Leases</h1>

    <div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
        </ul>

    </div>
</div>

    <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">Lease Detail</h2>
    </div>

<table>
<tr><td><?= __('ID') ?></td></tr>
<tr><td>
    <?= $this->Number->format($lease->id) ?>
</td></tr>
<tr><td><?= __('Room') ?></td></tr>
<tr><td>
    <?= $lease->has('room') ? $this->Html->link($lease->room->room_name, ['controller' => 'Rooms', 'action' => 'view', $lease->room->id]) : '' ?>
</td></tr>
<tr><td><?= __('Student') ?></td></tr>
<tr><td>
          <?php
          $person = $walrus->get($lease->student->person_id);
          ?>
          <?= $person->first_name ?>
          <?= $person->last_name ?>
</td></tr>
<tr><td><?= __('Weekly Price') ?></td></tr>
<tr><td>
    <?= $this->Number->currency($lease->weekly_price, 'USD') ?>
</td></tr>
<tr><td><?= __('Date Start') ?></td></tr>
<tr><td>
    <?= h($lease->date_start->format('Y M d')) ?>
</td></tr>
<tr><td><?= __('Date End') ?></td></tr>
<tr><td>
    <?= h($lease->date_end->format('Y M d')) ?>
</td></tr>
<tr><td><?= __('Lease Status') ?></td></tr>
<tr><td>
   <?= $this->Text->autoParagraph(h($lease->lease_status)); ?>
</td></tr>




<!-- <div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related InternetConnection') ?></h4>
    <?php if (!empty($lease->internet_connection)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Lease Id') ?></th>
            <th><?= __('Bandwidth') ?></th>
            <th><?= __('Monthly Fee') ?></th>
            <th><?= __('Date Start') ?></th>
            <th><?= __('Date End') ?></th>
            <th><?= __('Status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($lease->internet_connection as $internetConnection): ?>
        <tr>
            <td><?= h($internetConnection->id) ?></td>
            <td><?= h($internetConnection->lease_id) ?></td>
            <td><?= h($internetConnection->bandwidth) ?></td>
            <td><?= h($internetConnection->monthly_fee) ?></td>
            <td><?= h($internetConnection->date_start) ?></td>
            <td><?= h($internetConnection->date_end) ?></td>
            <td><?= h($internetConnection->status) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'InternetConnection', 'action' => 'view', $internetConnection->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'InternetConnection', 'action' => 'edit', $internetConnection->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'InternetConnection', 'action' => 'delete', $internetConnection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internetConnection->id)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div> -->

<tr><td><?= __('Related Payments') ?></td></tr>
</table>
<?php if (!empty($lease->payments)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Lease Id') ?></th>
            <th><?= __('Date Paid') ?></th>
            <th><?= __('Amount') ?></th>
            <th><?= __('Payment Period Starting') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($lease->payments as $payments): ?>
        <tr>
            <td><?= h($payments->id) ?></td>
            <td><?= h($payments->lease_id) ?></td>
            <td><?= h($payments->date_paid) ?></td>
            <td><?= h($payments->amount) ?></td>
            <td><?= h($payments->payment_period_starting) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
        <?php endif; ?>
             <?= $this->Form->create(null, [
        'url' => ['controller' => 'Leases', 'action' => 'index']
    ])?>
<!-- <div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Payments') ?></h4>
    <?php if (!empty($lease->payments)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Lease Id') ?></th>
            <th><?= __('Date Paid') ?></th>
            <th><?= __('Amount') ?></th>
            <th><?= __('Payment Period Starting') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($lease->payments as $payments): ?>
        <tr>
            <td><?= h($payments->id) ?></td>
            <td><?= h($payments->lease_id) ?></td>
            <td><?= h($payments->date_paid) ?></td>
            <td><?= h($payments->amount) ?></td>
            <td><?= h($payments->payment_period_starting) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
     <?= $this->Form->create(null, [
        'url' => ['controller' => 'Leases', 'action' => 'index']
    ])?> -->
<!--     <?= $this->Form->button(__('Cancel')) ?> -->
    </div>
</div>
</div>
