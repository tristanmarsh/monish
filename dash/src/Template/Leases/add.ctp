<?php
  $this->Html->addCrumb('Leases', '/leases');
  $this->Html->addCrumb('Add Lease');
?>

<!--Loads the jQuery scripts used in this view-->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
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

    <ul class="nav nav-pills pull-left">
      <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
      <li role="presentation" class="active"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
    </ul>

  </div>

</div>

<div class="panel panel-default">
  <div class="panel-body">
    <div class="leases form large-10 medium-9 columns">

      <?= $this->Form->create($lease, array('class' => 'form-group')); ?>
      <fieldset>
        <legend><?= __('Add Lease', array('class' => 'form-control')) ?></legend>
        <?php
        echo $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']);
        echo $this->Form->input('student_id', ['options' => $students,'class' => 'form-control']);
        echo $this->Form->input('date_start',['id'=>'dateStartPicker', 'type'=>'text','class' => 'form-control']);
        echo $this->Form->input('date_end',['id'=>'dateEndPicker', 'type'=>'text', 'class' => 'form-control']);
        echo $this->Form->input('weekly_price', array('class' => 'form-control'));
        ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-success']); ?>
      <?= $this->Form->end() ?>
      <?= $this->Form->create(null, [
      'url' => ['controller' => 'Leases', 'action' => 'index']
      ])?>
      <!--     <?= $this->Form->button(__('Cancel')) ?> -->

    </div>
  </div>
</div>
