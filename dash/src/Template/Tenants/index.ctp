<h3>Tenants</h3>

<div class="panel">
    <ul class="nav nav-pills">
        <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
        <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
    </ul>
</div>

<div class="table-responsive">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('common_name') ?></th>
                <th><?= $this->Paginator->sort('gender') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('internet_plan') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person): ?>
            <tr>
                <?php if (!($person->user->role === "admin")) : ?>
                <td><?= $person->first_name ?></td>
                <td><?= $person->last_name ?></td>
                <td><?= $person->common_name ?></td>
                <td><?= $person->gender ?></td>
                <td><?= $person->phone ?></td>
                <td><?= $person->email ?></td>
                <td><?= $person->student->internet_plan ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('More Details'), ['controller' => 'tenants', 'action' => 'view', $person->id]) ?></br>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'tenants', 'action' => 'edit', $person->user->id]) ?>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<div class="paginator text-center">



    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>