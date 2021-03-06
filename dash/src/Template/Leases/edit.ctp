<!-- NOT VISIBLE WITHIN THE SYSTEM - DELETE ME -->

<?php
    $this->Html->addCrumb('Leases', '/leases');
    $this->Html->addCrumb('Edit Lease', array('controller' => 'leases', 'action' => 'edit'));
?>

<!--Loads the jQuery scripts used in this view-->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script>
        $(function() {
            $( "#dateStartPicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    <script>
        $(function() {
            $( "#dateEndPicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
</head>

<h1>Leases</h1>

<div class="panel panel-default clearfix">
    
  <div class="panel-body">
      
      <ul class="nav nav-pills">
          <li role="presentation"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
          <li role="presentation"><?= $this->Html->link('New Lease', ['action' => 'add']) ?></li>
      </ul>

  </div>

  <div class="panel-footer">

      <ul class="nav nav-pills">
          <li role="presentation" class="active"><?= $this->Html->link('View', ['action' => 'view', $lease->id]) ?></li>
          <!-- <li role="presentation"><?= $this->Html->link('Edit', ['action' => 'edit', $lease->id]) ?></li> -->
      </ul>

  </div>

</div>

<div class="panel panel-primary">

  <div class="panel-heading">
        <h2 class="panel-title">New Lease</h2>
  </div>
  <div class="panel-body">

      <?= $this->Form->create($lease, array('class' => 'form-group')); ?>
      <fieldset>

        <div class="col-md-6">
        <?php
        echo $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']);
        
        echo $this->Form->input('date_start',['id'=>'dateStartPicker', 'type'=>'text','class' => 'form-control']);
        
        echo $this->Form->input('weekly_price', array('class' => 'form-control'));
        ?>
      </div>

      <div class="col-md-6">
        <?php
        echo $this->Form->input('student_id', ['options' => $students,'class' => 'form-control']);

        echo $this->Form->input('date_end',['id'=>'dateEndPicker', 'type'=>'text', 'class' => 'form-control']);

        ?>

      </div>
      </fieldset>
      <br>

      <?= $this->Form->button('<i class="fa fa-pencil"></i> Edit Lease', ['class' => 'form-control button button-action button-3d']); ?>
      <?= $this->Form->end() ?>
      <?= $this->Form->create(null, [
      'url' => ['controller' => 'Leases', 'action' => 'index']
      ])?>
      <br>
    </div>
  </div>