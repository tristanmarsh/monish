<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Lease'), ['action' => 'add']) ?></li>
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
<div class="leases index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('room_id') ?></th>
            <th><?= $this->Paginator->sort('student_id') ?></th>
            <th><?= $this->Paginator->sort('date_start') ?></th>
            <th><?= $this->Paginator->sort('date_end') ?></th>
            <th><?= $this->Paginator->sort('weekly_price') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($leases as $lease): ?>
        <tr>
            <td><?= $this->Number->format($lease->id) ?></td>
            <td>
                <?= $lease->has('room') ? $this->Html->link($lease->room->id, ['controller' => 'Rooms', 'action' => 'view', $lease->room->id]) : '' ?>
            </td>
            <td>
                <?= $lease->has('student') ? $this->Html->link($lease->student->id, ['controller' => 'Students', 'action' => 'view', $lease->student->id]) : '' ?>
            </td>
            <td><?= h($lease->date_start) ?></td>
            <td><?= h($lease->date_end) ?></td>
            <td><?= $this->Number->format($lease->weekly_price) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $lease->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lease->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lease->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
