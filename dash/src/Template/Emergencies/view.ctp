<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Emergency'), ['action' => 'edit', $emergency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emergency'), ['action' => 'delete', $emergency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emergency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emergencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emergency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emergency Student'), ['controller' => 'EmergencyStudent', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emergency Student'), ['controller' => 'EmergencyStudent', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="emergencies view large-10 medium-9 columns">
    <h2><?= h($emergency->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($emergency->first_name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($emergency->last_name) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($emergency->email) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($emergency->id) ?></p>
            <h6 class="subheader"><?= __('Phone') ?></h6>
            <p><?= $this->Number->format($emergency->phone) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related EmergencyStudent') ?></h4>
    <?php if (!empty($emergency->emergency_student)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Emergency Id') ?></th>
            <th><?= __('Student Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($emergency->emergency_student as $emergencyStudent): ?>
        <tr>
            <td><?= h($emergencyStudent->emergency_id) ?></td>
            <td><?= h($emergencyStudent->student_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'EmergencyStudent', 'action' => 'view', $emergencyStudent->]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'EmergencyStudent', 'action' => 'edit', $emergencyStudent->]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmergencyStudent', 'action' => 'delete', $emergencyStudent->], ['confirm' => __('Are you sure you want to delete # {0}?', $emergencyStudent->)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Students') ?></h4>
    <?php if (!empty($emergency->students)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Expected Grad Date') ?></th>
            <th><?= __('Person Id') ?></th>
            <th><?= __('Country Of Birth') ?></th>
            <th><?= __('Emergency Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($emergency->students as $students): ?>
        <tr>
            <td><?= h($students->id) ?></td>
            <td><?= h($students->expected_grad_date) ?></td>
            <td><?= h($students->person_id) ?></td>
            <td><?= h($students->country_of_birth) ?></td>
            <td><?= h($students->emergency_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $students->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $students->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Students', 'action' => 'delete', $students->id], ['confirm' => __('Are you sure you want to delete # {0}?', $students->id)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
