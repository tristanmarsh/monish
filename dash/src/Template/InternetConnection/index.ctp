<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Internet Connection'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Leases'), ['controller' => 'Leases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lease'), ['controller' => 'Leases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="internetConnection index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('lease_id') ?></th>
            <th><?= $this->Paginator->sort('date_start') ?></th>
            <th><?= $this->Paginator->sort('date_end') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($internetConnection as $internetConnection): ?>
        <tr>
            <td><?= $this->Number->format($internetConnection->id) ?></td>
            <td>
                <?= $internetConnection->has('lease') ? $this->Html->link($internetConnection->lease->id, ['controller' => 'Leases', 'action' => 'view', $internetConnection->lease->id]) : '' ?>
            </td>
            <td><?= h($internetConnection->date_start) ?></td>
            <td><?= h($internetConnection->date_end) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $internetConnection->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internetConnection->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internetConnection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internetConnection->id)]) ?>
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
