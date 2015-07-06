<h3>Tenant Details</h3>

<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Common Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Internet Plan</th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $person->first_name ?></td>
            <td><?= $person->last_name ?></td>
            <td><?= $person->common_name ?></td>
            <td><?= $person->gender ?></td>
            <td><?= $person->phone ?></td>
            <td><?= $person->email ?></td>
            <td><?= $person->student->internet_plan ?></td>
            <td class="actions"> 
                <?= $this->Html->link(__('Edit'), ['controller' => 'tenants', 'action' => 'edit', $person->user->id]) ?>
            </td>
        </tr>
    </tbody>
</table>

<div class="related row">
    <div class="column large-12">
        <h4 class="subheader"><?= __('Related Leases') ?></h4>
        <?php if (!empty($student->leases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Property') ?></th>
                <th><?= __('Room') ?></th>
                <th><?= __('Date Start') ?></th>
                <th><?= __('Date End') ?></th>
                <th><?= __('Weekly Price') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($query as $leases): ?>
            <tr>
                <td><?= $leases->property->address ?></td>
                <td><?= $leases->room->room_name ?></td>
                <td><?= h($leases->date_start->format('Y M d')) ?></td>
                <td><?= h($leases->date_end->format('Y M d')) ?></td>
                <td><?= h($this->Number->currency($leases->weekly_price)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Leases', 'action' => 'edit', $leases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leases', 'action' => 'delete', $leases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leases->id)]) ?>
                </td>
            </tr>

            <?php endforeach; ?>    
        </table>
        <?php endif; ?>
    </div>
</div>

<a href="javascript: window.history.back()">Go Back</a>