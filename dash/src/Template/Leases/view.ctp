<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Lease'), ['action' => 'edit', $lease->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lease'), ['action' => 'delete', $lease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lease->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lease'), ['action' => 'add']) ?> </li>
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
<div class="leases view large-10 medium-9 columns">
    <h2><?= h($lease->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Room') ?></h6>
            <p><?= $lease->has('room') ? $this->Html->link($lease->room->id, ['controller' => 'Rooms', 'action' => 'view', $lease->room->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Student') ?></h6>
            <p><?= $lease->has('student') ? $this->Html->link($lease->student->id, ['controller' => 'Students', 'action' => 'view', $lease->student->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($lease->id) ?></p>
            <h6 class="subheader"><?= __('Weekly Price') ?></h6>
            <p><?= $this->Number->format($lease->weekly_price) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Start') ?></h6>
            <p><?= h($lease->date_start) ?></p>
            <h6 class="subheader"><?= __('Date End') ?></h6>
            <p><?= h($lease->date_end) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Lease Status') ?></h6>
            <?= $this->Text->autoParagraph(h($lease->lease_status)); ?>

        </div>
    </div>
</div>
<div class="related row">
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
</div>
<div class="related row">
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
    </div>
</div>
