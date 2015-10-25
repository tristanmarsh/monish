<?php
    $this->Html->addCrumb('Leases', '/leases');
    $this->Html->addCrumb($lease->property->address." ".$lease->room->room_name);
?>
<h1><?= $lease->property->address." ".$lease->room->room_name; ?></h1>

<?php $person = $walrus->get($lease->student->person_id); ?>

<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <div class="button-group">
      <?= $this->Html->link(
        '<i class="fa fa-flash"></i> Current',
        ['action' => 'index'],
        ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
        '<i class="fa fa-archive"></i> Archived',
        ['action' => 'archived'],
        ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>
    </div>
    
    <div class="button-group">
        <?= $this->Html->link(
        '<i class="fa fa-plus"></i> New Lease',
        ['action' => 'add'],
        ['class' => 'button button-pill-override button-action', 'escape' => false]
      ); ?>
    </div>
        
  </div>

  <div class="panel-footer">
    
      <?= $this->Html->link(
        '<i class="fa fa-eye"></i> View',
        ['action' => 'view',$lease->id],
        ['class' => 'button button-pill button-primary active', 'escape' => false]
      ); ?>

      <?= $this->form->postlink(
        '<i class="fa fa-times"></i> Delete',
        ['action' => 'delete',$lease->id],
        ['confirm' => 'Delete ' . $lease->property->address. " ". $lease->room->room_name  .' Lease for '. $person->first_name . " " . $person->last_name . '?' ,'class' => 'button button-pill-override button-caution', "escape" => false]
      ); ?>

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

<tr><td>Lease Started On: <?= h($lease->date_start->format('Y/m/d')) ?></td></tr>

<tr><td>Lease Expires On: <?= h($lease->date_end->format('Y/m/d')) ?></td></tr>

<!-- <tr><td>Lease Status: <?= $this->Text->autoParagraph(h($lease->lease_status)); ?></td></tr> -->



</table>

             <?= $this->Form->create(null, [
        'url' => ['controller' => 'Leases', 'action' => 'index']
    ])?>

    </div>

