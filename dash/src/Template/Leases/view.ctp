<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit This Lease'), ['action' => 'edit', $lease->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete This Lease'), ['action' => 'delete', $lease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lease->id)]) ?> </li>
        <li><?= $this->Html->link(__('List All Leases'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="leases view large-10 medium-9 columns">
    <h2>Lease Details</h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Room') ?></h6>
            <p><?= $lease->has('room') ? $this->Html->link($lease->room->room_name, ['controller' => 'Rooms', 'action' => 'view', $lease->room->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Student') ?></h6>
            <p>
                <?= $lease->has('student') ? $this->Html->link($query->user->first_name, ['controller' => 'Students', 'action' => 'view', $lease->student->id]) : '' ?>
                <?= $lease->has('student') ? $this->Html->link($query->user->last_name, ['controller' => 'Students', 'action' => 'view', $lease->student->id]) : '' ?>
            </p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($lease->id) ?></p>
            <h6 class="subheader"><?= __('Weekly Price') ?></h6>
            <p><?= $this->Number->currency($lease->weekly_price, 'USD') ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Start') ?></h6>
            <p><?= h($lease->date_start->format('Y M d')) ?></p>
            <h6 class="subheader"><?= __('Date End') ?></h6>
            <p><?= h($lease->date_end->format('Y M d')) ?></p>
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
