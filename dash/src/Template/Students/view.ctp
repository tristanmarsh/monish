
<div class="students view large-10 medium-9 columns">
    <h2><?= h("Student Details") ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Full Name') ?></h6>
            <p>
                <?= $student->has('person') ? $this->Html->link($student->person->first_name, ['controller' => 'People', 'action' => 'view', $student->person->id]) : '' ?>
                <span><?= $student->has('person') ? $this->Html->link($student->person->last_name, ['controller' => 'People', 'action' => 'view', $student->person->id]) : '' ?></span>
            </p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Student ID') ?></h6>
            <p><?= $this->Number->format($student->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Emergency Contact') ?></h4>
    <?php if (!empty($student->emergency)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('First Name') ?></th>
            <th><?= __('Last Name') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <tr>
            <td><?= h($student->emergency->first_name) ?></td>
            <td><?= h($student->emergency->last_name) ?></td>
            <td><?= h($student->emergency->phone) ?></td>
            <td><?= h($student->emergency->email) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Emergencies', 'action' => 'view', $student->emergency->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Emergencies', 'action' => 'edit', $student->emergency->id]) ?>
				
            </td>
        </tr>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Leases') ?></h4>
    <?php if (!empty($student->leases)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Room Id') ?></th>
            <th><?= __('Date Start') ?></th>
            <th><?= __('Date End') ?></th>
            <th><?= __('Lease Status') ?></th>
            <th><?= __('Weekly Price') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($student->leases as $leases): ?>
        <tr>
            <td><?= h($leases->id) ?></td>
            <td><?= h($leases->room_id) ?></td>
            <td><?= h($leases->date_start) ?></td>
            <td><?= h($leases->date_end) ?></td>
            <td><?= h($leases->lease_status) ?></td>
            <td><?= h($leases->weekly_price) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Leases', 'action' => 'view', $leases->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Leases', 'action' => 'edit', $leases->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leases', 'action' => 'delete', $leases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leases->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'students', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
    </div>
</div>
