<?php
    $this->Html->addCrumb('Tenants', '/tenants');
    $this->Html->addCrumb('Add Tenant', array('controller' => 'tenants', 'action' => 'add'));
?>
<!-- src/Template/People/add.ctp -->
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

<h1>Tenants</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
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



<!-- 
      <div class="panel-footer">
      
      <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
            <span class="sr-only">33% Complete</span>
          </div>
        </div>        

      </div> -->



    </div>



    <div class="panel panel-default">
      <div class="panel-body">


        <?= $this->Form->create($user, array('class' => 'form-group')) ?>
        <fieldset class="input-group">

          <div class="panel-heading">
            <legend><?= __('Create New Tenant & Lease', array('class' => 'form-control')) ?></legend>
          </div>

          <div class="panel-body">
            
            <div class="col-md-6">
            
              <?= $this->Form->input('first_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('last_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('common_name', array('class' => 'form-control')) ?>

              
            </div>

            <div class="col-md-6">
             
              <?= $this->Form->input('gender', ['options' => ['M' => 'Male', 'F' => 'Female'], 'class' => 'form-control' ]) ?>
             
              <?= $this->Form->input('phone', array('class' => 'form-control')) ?>
             
              <?= $this->Form->input('email', array('class' => 'form-control')) ?>
            
            </div>

            
             <?= $this->Form->input('internet_plan', ['options' => ['FREE' => 'FREE', 'BASIC' => 'BASIC', 'STANDARD' => 'STANDARD', 'PREMIUM' => 'PREMIUM'], 'class' => 'form-control']) ?>
             
             <?= $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']); ?>
            
            <div class="col-md-6">
              <?= $this->form->input('date_start',['id'=>'dateStartPicker','class' => 'form-control']); ?>
            </div>

            <div class="col-md-6">
              <?= $this->form->input('date_end',['id'=>'dateEndPicker','class' => 'form-control']); ?>
            </div>

             <?= $this->Form->input('weekly_price', ['class' => 'form-control']); ?>
           
           </fieldset>

           <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-success']); ?>
           <?= $this->Form->end() ?>
           <?php
           echo $this->Form->create(null, [
            'url' => ['controller' => 'People', 'action' => 'index']
            ]);
           ?>

           </div>



         <!-- <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group">
          <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
          <span class="input-group-addon" id="basic-addon2">@example.com</span>
        </div>

        <div class="input-group">
          <span class="input-group-addon">$</span>
          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
          <span class="input-group-addon">.00</span>
        </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon" id="sizing-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
        </div>

        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
        </div>

        <div class="input-group input-group-sm">
          <span class="input-group-addon" id="sizing-addon3">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon3">
        </div> -->


      </div>
    </div>




