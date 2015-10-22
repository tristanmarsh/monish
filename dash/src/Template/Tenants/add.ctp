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
                    <h2 class="panel-title">New Tenant & Lease</h2>
      </div>
      <div class="panel-body">

        <?= $this->Form->create($user, array('type' => 'file', 'class' => 'form-group')) ?>

        <fieldset class="input-group">


            
            <div class="col-md-6">
              <legend>Personal Detail</legend>
            
              <?= $this->Form->input('first_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('last_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('common_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('gender', ['options' => ['M' => 'Male', 'F' => 'Female'], 'class' => 'form-control' ]) ?>
              <?= $this->Form->input('phone', array('class' => 'form-control')) ?>
              <?= $this->Form->input('visa', array('class' => 'form-control')) ?>
              <?= $this->Form->input('email', array('class' => 'form-control')) ?>
              <?= $this->Form->input('parent_address', array('class' => 'form-control')) ?>
              <?= $this->Form->input('internet_plan', ['options' => ['Free' => 'Free', 'Basic' => 'Basic', 'Standard' => 'Standard', 'Premium' => 'Premium'], 'class' => 'form-control']) ?>
              
              
              
              


              
            </div>


            <div class="col-md-6">
             <legend>Bank Detail</legend>
              <?= $this->Form->input('account_name', array('class' => 'form-control')) ?>
              <?= $this->Form->input('account_number', array('class' => 'form-control')) ?>
             <?= $this->Form->input('bsb_number', array('class' => 'form-control')) ?>
              
             
              <legend>Lease Detail</legend>
              <?= $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']); ?>
              <?= $this->Form->input('weekly_price', ['class' => 'form-control']); ?>
              <?= $this->form->input('date_start',['id'=>'dateStartPicker','class' => 'form-control']); ?>

              

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




