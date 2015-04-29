<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emergency Student'), ['controller' => 'EmergencyStudent', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emergency Student'), ['controller' => 'EmergencyStudent', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leases'), ['controller' => 'Leases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lease'), ['controller' => 'Leases', 'action' => 'add']) ?> </li>
    </ul>
</div>-->
<div class="actions columns large-2 medium-3">
    <h3><?= __('Menu') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit This Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete This Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List All Students'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="students view large-10 medium-9 columns">
    <h2><?= h("Student Details") ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Full Name') ?></h6>
            <p>
                <?= $student->has('user') ? $this->Html->link($student->user->first_name, ['controller' => 'Users', 'action' => 'view', $student->user->id]) : '' ?>
                <span><?= $student->has('user') ? $this->Html->link($student->user->last_name, ['controller' => 'Users', 'action' => 'view', $student->user->id]) : '' ?></span>
            </p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Student ID') ?></h6>
            <p><?= $this->Number->format($student->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Expected Grad Date') ?></h6>
            <p><?= h($student->expected_grad_date) ?></p>
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
            <th><?= __('Student Id') ?></th>
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
            <td><?= h($leases->student_id) ?></td>
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
    </div>
</div>
