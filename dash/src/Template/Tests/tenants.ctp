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
    <?php foreach ($students as $person): ?>
        <tr>
            <td><?= $person->person->first_name ?></td>
            <td><?= $person->person->last_name ?></td>
            <td><?= $person->person->common_name ?></td>
            <td><?= $person->person->gender ?></td>
            <td><?= $person->person->phone ?></td>
            <td><?= $person->person->email ?></td>
            <td><?= $person->internet_plan ?></td>
            <td class="actions">
                <?= $this->Html->link(__('More Details'), ['controller' => 'people', 'action' => 'view', $person->id]) ?>
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