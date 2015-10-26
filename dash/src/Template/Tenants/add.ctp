<?php
    $this->Html->addCrumb('Tenants', '/tenants');
    $this->Html->addCrumb('New Tenant', array('controller' => 'tenants', 'action' => 'add'));
?>
<!-- src/Template/People/add.ctp -->
<!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
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

<h1>New Tenant</h1>

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
      '<i class="fa fa-plus"></i> New Tenant',
      ['action' => 'add'],
      ['class' => 'button button-pill button-pill-override button-action active', 'escape' => false]
      ); ?>
    
    </div>

  </div>

</div>

<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">Create New Tenant & Lease</h2>
  </div>
  <div class="panel-body">

    <?= $this->Form->create($user, array('type' => 'file', 'class' => 'form-group')) ?>

    <fieldset>

      <legend>Personal Details</legend>

      <div class="col-sm-6">
        <?= $this->Form->input('first_name', array('class' => 'form-control')) ?>
      </div>

      <div class="col-sm-6">
        <?= $this->Form->input('last_name', array('class' => 'form-control')) ?>
      </div>

      <div class="col-sm-6">
        <?= $this->Form->input('common_name', array('class' => 'form-control')) ?>
      </div>
      
      <div class="col-sm-6">
      <?= $this->Form->input('gender', ['options' => ['M' => 'Male', 'F' => 'Female'], 'class' => 'form-control']) ?>
      </div>
      
      <div class="col-sm-6">
        <?= $this->Form->input('phone', array('type'=>'number', 'class' => 'form-control')) ?>
      </div>
      
      <div class="col-sm-6">
        <?= $this->Form->input('visa', array('class' => 'form-control')) ?>
      </div>
      
      <div class="col-sm-6">
        <?= $this->Form->input('email', array('type'=>'email', 'class' => 'form-control')) ?>
      </div>
      
      <div class="col-sm-6">
        <?= $this->Form->input('parent_address', array('class' => 'form-control')) ?>
      </div>

    </fieldset>

    <fieldset>
    
      <legend>Payment Details</legend>
        
      <div class="col-sm-6">
        <?= $this->Form->input('account_name', array('class' => 'form-control')) ?>
      </div>
              
      <div class="col-sm-6">
        <?= $this->Form->input('account_number', array('type'=>'number', 'class' => 'form-control')) ?>
      </div>

      <div class="col-sm-6">
        <?= $this->Form->input('bsb_number', array('type'=>'number', 'class' => 'form-control')) ?>
      </div>

    </fieldset>

    <fieldset>

      <legend>Lease Details</legend>

      <div class="input-group">

        <div class="col-sm-6">
          <?= $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']); ?>
        </div>

        <div class="col-sm-6">
          <label for="weekly_price">Weekly Price</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="weekly_price" id="weekly_price" class="form-control">
          </div>
        </div>

      </div>

      <div class="col-sm-6">
        <?= $this->Form->input('date_start',['id'=>'dateStartPicker','class' => 'form-control']); ?>
      </div>

<!-- 
      <div class="container">
          <div class="row">
              <div class='col-sm-6'>
                  <div class="form-group">
                      <div class='input-group date' id='datetimepicker1'>
                          <input type='text' class="form-control" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
              </div>
              <script type="text/javascript">
                  $(function () {
                      $('#datetimepicker1').datetimepicker();
                  });
              </script>
          </div>
      </div>
 -->

      <div class="col-sm-6">
        <?= $this->Form->input('date_end',['id'=>'dateEndPicker','class' => 'form-control']); ?>
      </div>

      <div class="col-sm-6">
        <?= $this->Form->input('internet_plan', ['options' => ['Free' => 'Free', 'Basic' => 'Basic', 'Standard' => 'Standard', 'Premium' => 'Premium'], 'class' => 'form-control']) ?>
      </div>

    </fieldset>

    </fieldset>
    <br>
    <div class="col-md-12">

      <?= $this->Form->button('<i class="fa fa-plus"></i> Create New Tenant', ['class' => 'form-control button button-action button-3d']); ?>
      <?= $this->Form->end() ?>
      <?php
        echo $this->Form->create(null, [
        'url' => ['controller' => 'People', 'action' => 'index']
        ]);
      ?>
    </div>

  </div>

</div>




