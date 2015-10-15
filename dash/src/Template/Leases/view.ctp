<?php
    $this->Html->addCrumb('Leases', '/leases');
    $this->Html->addCrumb($lease->property->address." ".$lease->room->room_name);
?>
    <h1><?= $lease->property->address." ".$lease->room->room_name; ?></h1>

    <div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation"><?= $this->Html->link('Current', ['action' => 'index']) ?></li>
            <li role="presentation"><?= $this->Html->link('Archived', ['action' => 'archived']) ?></li>
            <li role="presentation"><?= $this->Html->link('New Lease', ['action' => 'add']) ?></li>
        </ul>

    </div>
    <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('View', ['action' => 'view', $lease->id]) ?></li>
            <!-- <li role="presentation"><?= $this->Html->link('Edit', ['action' => 'edit', $lease->id]) ?></li> -->
        </ul>

    </div>


</div>

    <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">Lease Details</h2>
    </div>

<table>

<tr><td>Location: <?= h($lease->room->room_name." in ".$lease->property->address)?></td></tr>
<!--<?= $lease->has('room') ? $this->Html->link($lease->room->room_name, ['controller' => 'Rooms', 'action' => 'view', $lease->room->id]) : '' ?> -->

<tr><td>Tenant: <?php
          $person = $walrus->get($lease->student->person_id);
          ?>
          <?= $person->first_name ?>
          <?= $person->last_name ?></td></tr>

<tr><td>Weekly Price: <?= $this->Number->currency($lease->weekly_price, 'USD') ?></td></tr>

<tr><td>Lease Started On: <?= h($lease->date_start->format('d/m/Y')) ?></td></tr>

<tr><td>Lease Expires On: <?= h($lease->date_end->format('d/m/Y')) ?></td></tr>

<!-- <tr><td>Lease Status: <?= $this->Text->autoParagraph(h($lease->lease_status)); ?></td></tr> -->



</table>

             <?= $this->Form->create(null, [
        'url' => ['controller' => 'Leases', 'action' => 'index']
    ])?>

    </div>

