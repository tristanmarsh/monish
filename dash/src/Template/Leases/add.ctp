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
        ['class' => 'button button-pill-override button-action active', 'escape' => false]
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

      <fieldset class="input-group">
        <legend>Tenant</legend>
        <div class="col-md-6">
          <?= $this->Form->input('student_id', ['options' => $students,'class' => 'form-control']); ?>
        </div>
      </fieldset>

      <fieldset class="input-group">
        <legend>Lease</legend>

        <div class="col-md-6">
          <?= $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']); ?>
        </div>

        <div class="col-sm-6">
          <label for="weekly_price">Weekly Price</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="weekly_price" id="weekly_price" class="form-control">
          </div>
        </div>
        
        <div class="col-md-6">
          <?= $this->Form->input('date_start',['id'=>'dateStartPicker', 'type'=>'text','class' => 'form-control']); ?>
        </div>
        
        <div class="col-md-6">
          <?= $this->Form->input('date_end',['id'=>'dateEndPicker', 'type'=>'text', 'class' => 'form-control']); ?>
        </div>

      </fieldset>

      <br>

      <?= $this->Form->button(__('Create Lease'), ['class' => 'form-control button button-action button-3d']); ?>
      <?= $this->Form->end() ?>
      <?= $this->Form->create(null, [
      'url' => ['controller' => 'Leases', 'action' => 'index']
      ])?>
      <!--     <?= $this->Form->button(__('Cancel')) ?> -->
      </div>
    </div>
  </div>

