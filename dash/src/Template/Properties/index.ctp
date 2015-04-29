<br>
<?= $this->Html->link(__('Add New Property'), ['action' => 'add']) ?>
<span style="float:right"><?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
<table cellpadding="0" cellspacing="0">
<thead>
    <tr>
        <th><?= $this->Paginator->sort('address') ?></th>
        <th><?= $this->Paginator->sort('number_rooms') ?></th>
        <th><?= $this->Paginator->sort('bathrooms') ?></th>
        <th><?= $this->Paginator->sort('kitchens') ?></th>
        <th><?= $this->Paginator->sort('storeys') ?></th>
        <th><?= $this->Paginator->sort('garage') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
</thead>
<tbody>
<?php foreach ($properties as $property): ?>
    <tr>
        <td><?= h($property->address) ?></td>
        <td><?= $this->Number->format($property->number_rooms) ?></td>
        <td><?= $this->Number->format($property->bathrooms) ?></td>
        <td><?= $this->Number->format($property->kitchens) ?></td>
        <td><?= $this->Number->format($property->storeys) ?></td>
        <td><?= $this->Number->format($property->garage) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
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
<p>
    <?php
    echo "Back to ";
    echo $this->Html->link('Dashboard', ['controller' => 'dashboards', 'action' => 'index']);
    ?>
</p>