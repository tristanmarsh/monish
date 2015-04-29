<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit This Contact'), ['action' => 'edit', $emergency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete This Contact'), ['action' => 'delete', $emergency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emergency->id)]) ?> </li>
        <li><?= $this->Html->link(__('Go Back'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="emergencies view large-10 medium-9 columns">
    <h2>Emergency Contact Details</h2>
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
            <p><?= $this->Number->format($emergency->phone, ['pattern' => '#']) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Students') ?></h4>
    <?php if (!empty($emergency->students)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Student') ?></th>
            <th><?= __('Expected Grad Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($emergency->students as $students): ?>
        <tr>
            <td><?= h($students->id) ?></td>
            <td><?= h($students->expected_grad_date->format('Y M d')) ?></td>
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
