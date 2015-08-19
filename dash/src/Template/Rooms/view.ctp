<?php
    $this->Html->addCrumb('Rooms', '/rooms');
    $this->Html->addCrumb('View Room', array('controller' => 'rooms', 'action' => 'view'));
?>    
<div class="rooms view large-10 medium-9 columns">
    <h1><?= h($room->property['address']) ?></h1>
    <h1><?= h($room->room_name) ?></h1>
    <h1>
    <?php
    if ($room->vacant === "FALSE"){
        echo "Not Vacant";
    }
    else {echo "Vacant";}
    ?>
    </h1>

</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Leases') ?></h4>
    <?php if (!empty($room->leases)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Tenant') ?></th>
            <th><?= __('Date Start') ?></th>
            <th><?= __('Date End') ?></th>
            <th><?= __('Weekly Price') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($room->leases as $leases): ?>
        <tr>
            <td>
                <?php 
                    $currentLease = $leasesTable->get($leases->id, ['contain'=>'students']);
                    $currentStudent = $studentsTable->get($currentLease->student_id, ['contain'=>'people']);
                    echo $currentStudent->People['first_name']." ";
                    echo $currentStudent->People['last_name'];
                ?>
            </td>
            <td><?= h($leases->date_start->format('d/m/Y')) ?></td>
            <td><?= h($leases->date_end->format('d/m/Y')) ?></td>
            <td><?= h($this->Number->currency($leases->weekly_price)) ?></td>

            <td class="actions">
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leases', 'action' => 'delete', $leases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leases->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
        <?= $this->Form->create(null, [
        'url' => ['controller' => 'Rooms', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
    </div>
    </div>
</div>
