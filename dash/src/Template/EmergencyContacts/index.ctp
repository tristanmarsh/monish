<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Emergency Contact'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="emergencyContacts index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('first_name') ?></th>
            <th><?= $this->Paginator->sort('last_name') ?></th>
            <th><?= $this->Paginator->sort('phone') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($emergencyContacts as $emergencyContact): ?>
        <tr>
            <td><?= $this->Number->format($emergencyContact->id) ?></td>
            <td><?= h($emergencyContact->first_name) ?></td>
            <td><?= h($emergencyContact->last_name) ?></td>
            <td><?= $this->Number->format($emergencyContact->phone) ?></td>
            <td><?= h($emergencyContact->email) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $emergencyContact->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emergencyContact->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emergencyContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emergencyContact->id)]) ?>
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
