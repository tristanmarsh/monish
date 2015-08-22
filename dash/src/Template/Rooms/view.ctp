<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb('Rooms', '/rooms');
    $this->Html->addCrumb('View Room', array('controller' => 'rooms', 'action' => 'view'));
?>   
<h1>Rooms</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <li role="presentation"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('View', ['action' => 'view', $room->id]) ?></li>
          <li role="presentation"><?= $this->Html->link('Edit', ['action' => 'edit', $room->id]) ?></li>
          <li role="presentation"><?= $this->Html->link('Properties', ['controller' => 'properties', 'action' => 'index']) ?></li>
        </ul>


      </div>

<!--       <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
          <li role="presentation" class="active"><a href="#">Imagine</a></li>
          <li role="presentation"><a href="#">Alternative</a></li>
          <li role="presentation"><a href="#">Secondary</a></li>
          <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

      </div> -->
    </div>
<div class="panel panel-primary"> 
        <div class="panel-heading">
        <h2 class="panel-title">Room Detail</h2>
    </div>

    <table>
        <tr>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;Room ID</th>
        </tr>
        <tr>
            <td><?= h($room->id) ?></td>
        </tr>
        <tr>
            <td><?= h($room->property['address']) ?></td>
        </tr>
        <tr>
            <td><?= h($room->room_name) ?></td>
        </tr>
        <tr>
            <td>    <?php
        if ($room->vacant === "FALSE"){
        echo "Not Vacant";}
    else {echo "Vacant";}?>
            </td>
        </tr>

        </table>        

<!--     <h1><?= h($room->property['address']) ?></h1>
    <h2><?= h($room->room_name) ?></h2>
    <h2>
    <?php
    if ($room->vacant === "FALSE"){
        echo "Not Vacant";
    }
    else {echo "Vacant";}
    ?>
    </h2>
    <h3><?= $this->Html->link('Edit Room', ['action' => 'edit', $room->id]) ?></h3>
</div> -->


    <!-- Default panel contents -->

    <div class="panel-heading">
        <h2 class="panel-title">Related Leases</h2>
    </div>
    <?php if (!empty($room->leases)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;<?= __('Tenant') ?></th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;<?= __('Date Start') ?></th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;<?= __('Date End') ?></th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;<?= __('Weekly Price') ?></th>
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
<!--     <?= $this->Form->button(__('Cancel')) ?> -->
    </div>
    </div>
</div>
