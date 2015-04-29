<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leases'), ['controller' => 'Leases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lease'), ['controller' => 'Leases', 'action' => 'add']) ?> </li>
    </ul>
</div>-->

<?php
    $this->Html->addCrumb('Users', '/users');
    $this->Html->addCrumb('Add User', array('controller' => 'users', 'action' => 'add'));
?>

<h1>Manage Students</h1>
<?= $this->Html->link('Add Student', ['action' => 'add']) ?>
<span style="float:right"><?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
<table cellpadding="0" cellspacing="0">
<thead>
    <tr>
        <!--<th><?= $this->Paginator->sort('id') ?></th>-->
        <th><?= $this->Paginator->sort('person_id') ?></th>
        <th><?= $this->Paginator->sort('expected_grad_date') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
</thead>
<tbody>
<?php foreach ($students as $student): ?>
    <tr>
        <!--<td><?= $this->Number->format($student->id) ?></td>-->
        <td>
            <?= $student->has('user') ? $this->Html->link($student->user->first_name, ['controller' => 'Users', 'action' => 'view', $student->user->id]) : '' ?>
        </td>
        <td><?= h($student->expected_grad_date->format('Y M d')) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
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


