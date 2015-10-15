<?php
    $this->Html->addCrumb('Tenants', '/tenants');
    $this->Html->addCrumb('Add Tenant', array('controller' => 'tenants', 'action' => 'add'));
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

<div class="panel panel-default clearfix">
    
    <div class="panel-body">

        <div class="col-sm-6">
            <ul class="nav nav-pills pull-left">
                <li role="presentation"><?= $this->Html->link('Current', ['action' => 'index']) ?></li>
                <li role="presentation"><?= $this->Html->link('Archived', ['action' => 'archived']) ?></li>
                <li role="presentation" class="active"><?= $this->Html->link('New Tenant', ['action' => 'add']) ?></li>
            </ul>
            
        </div>

    </div>

<!--     <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><a href="#">Imagine</a></li>
            <li role="presentation"><a href="#">Secondary</a></li>
            <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

    </div> -->

</div>



    <div class="panel panel-primary">

      <div class="panel-heading">
                    <h2 class="panel-title">New Tenant & Lease</h2>
      </div>
      <div class="panel-body">

        <?= $this->Form->create($user, array('type' => 'file', 'class' => 'form-group')) ?>

        <fieldset class="input-group">


            
            <div class="col-md-6">
            
              <?= $this->Form->input('first_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('last_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('common_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('visa', array('class' => 'form-control')) ?>
              <?= $this->Form->input('account_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('bsb_number', array('class' => 'form-control')) ?>
             <?= $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']); ?>
                 <?= $this->form->input('date_start',['id'=>'dateStartPicker','class' => 'form-control']); ?>


              
            </div>


            <div class="col-md-6">
             
              <?= $this->Form->input('gender', ['options' => ['M' => 'Male', 'F' => 'Female'], 'class' => 'form-control' ]) ?>
             
              <?= $this->Form->input('phone', array('class' => 'form-control')) ?>
             
              <?= $this->Form->input('email', array('class' => 'form-control')) ?>

              <?= $this->Form->input('parent_address', array('class' => 'form-control')) ?>

              <?= $this->Form->input('account_number', array('class' => 'form-control')) ?>

              <?= $this->Form->input('internet_plan', ['options' => ['Free' => 'Free', 'Basic' => 'Basic', 'Standard' => 'Standard', 'Premium' => 'Premium'], 'class' => 'form-control']) ?>

              <?= $this->Form->input('weekly_price', ['class' => 'form-control']); ?>

              <?= $this->form->input('date_end',['id'=>'dateEndPicker','class' => 'form-control']); ?>


            
            </div>

            
           </fieldset>
           <br>
            <div class="col-md-12">

           <?= $this->Form->button(__('Create Tenant'), ['class' => 'form-control btn btn-primary']); ?>
           <?= $this->Form->end() ?>
           <br><br>
           <?php
           echo $this->Form->create(null, [
            'url' => ['controller' => 'People', 'action' => 'index']
            ]);
           ?>
         </div>

           </div>



      </div>




