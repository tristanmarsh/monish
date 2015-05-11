<h1>Manage Emergency Contacts</h1>

<!--<div class="emergencies index large-10 medium-9 columns">-->
    <?= $this->Html->link(__('Add Emergency Contact'), ['action' => 'add']) ?>
    <span style="float:right"><?= $this->Html->link(__('Logout'), ['controller' => 'logout', 'action' => 'add']) ?></span>
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
    <?php foreach ($emergencies as $emergency): ?>
        <tr>
            <td><?= $this->Number->format($emergency->id) ?></td>
            <td><?= h($emergency->first_name) ?></td>
            <td><?= h($emergency->last_name) ?></td>
            <td><?= $this->Number->format($emergency->phone) ?></td>
            <td><?= h($emergency->email) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $emergency->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emergency->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emergency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emergency->id)]) ?>
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
<!--</div>-->
<p>
    <?php
    echo "Back to ";
    echo $this->Html->link('Dashboard', ['controller' => 'dashboards', 'action' => 'index']);
    ?>
</p>