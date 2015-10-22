<?php
  $this->Html->addCrumb('Leases', '/leases');
  $this->Html->addCrumb('Add Lease');
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

<h1>New Lease</h1>

<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <div class="button-group">

      <?= $this->Html->link(
      '<i class="fa fa-flash"></i> Current',
      ['action' => 'index'],
      ['class' => 'button button-pill button-primary button-3d', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-archive"></i> Archived',
      ['action' => 'archived'],
      ['class' => 'button button-pill button-primary button-3d', 'escape' => false]
      ); ?>

    </div>
    
    <div class="button-group">
      <?= $this->Html->link(
      '<i class="fa fa-plus"></i> New Lease',
      ['action' => 'add'],
      ['class' => 'button button-pill button-action button-3d active', 'escape' => false]
      ); ?>

    </div>
        
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

      <div class="col-md-12">
      <?= $this->Form->button(__('Create Lease'), ['class' => 'form-control btn btn-primary']); ?>
      <?= $this->Form->end() ?>
      <?= $this->Form->create(null, [
      'url' => ['controller' => 'Leases', 'action' => 'index']
      ])?>
      <br>
      <!--     <?= $this->Form->button(__('Cancel')) ?> -->
      </div>
    </div>
  </div>

