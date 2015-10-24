<?php
    $this->Html->addCrumb('Requests', array('controller' => 'requests', 'action' => 'index'));
    $this->Html->addCrumb('Add Request', array('controller' => 'requests', 'action' => 'add'));
?>
<!-- File: src/Template/Articles/add.ctp -->

<h1>New Request</h1>

<div class="panel panel-default panel-actionbar clearfix">
    
  <div class="panel-body">
  
    <div class="button-set">
      <?= $this->Html->link(
      '<i class="glyphicon glyphicon-envelope"></i> All',
      ['action' => 'index'],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>
    </div>

    <?= $this->Html->link(
    '<i class="fa fa-plus"></i> New Request',
    ['action' => 'add'],
    ['class' => 'button button-pill button-action active', 'escape' => false]
    ); ?>

  </div>

</div>

<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">New Request</h2>
  </div>

  <div class="panel-body">
   
    <?= $this->Form->create($entity, array('type' => 'file', 'class' => 'form-group')) ?>
    
    <fieldset>

      <div class="row">

        <div class="col-md-6">

          <?= $this->Form->input('title', array('class' => 'form-control')) ?>

  			  <?= $this->Form->input('property_address', ['options' => $addresses,'class' => 'form-control']) ?>
        
        </div>

        <div class="col-md-6">   
                
          <?= $this->Form->input(
            'entry_time',
            ['label'=>'Permission to enter room or property?',
              'options' => ['Anytime' => 'Yes, Any Time',
              '10am to 5pm' => 'Yes, Between 10:am and 5:pm',
              'Arrange a time' => 'No, please arrange a time with me',
              'N/A' => 'Not applicable'],
            'class' => 'form-control'])
           ?>

          <?= $this->Form->input(
            'category',
            ['options' => ['General' => 'General',
              'Maintenance' => 'Maintenance',
              'Internet' => 'Internet',
              'Lease' => 'Lease',
              'Noisy Tenant'=> 'Noisy Tenant',
              'Other Tenant Not Cleaning'=> 'Other Tenant Not Cleaning',
              'Bathroom Light Broken'=>'Bathroom Light Broken',
              'Bedroom Light Broken'=>'Bedroom Light Broken',
              'Shower Hose Leaking/Broken' =>'Shower Hose Leaking/Broken',
              'Shower Leaking'=>'Shower Leaking',
              'Toilet Broken'=>'Toilet Broken',
              'Toilet Not Flushing Properly'=>'Toilet Not Flushing Properly',
              'Fan not Working'=>'Fan not Working',
              'Vacuum Cleaner not Working'=>'Vacuum Cleaner not Working',
              'Others Leaking (Please state in description)'=>'Others Leaking (Please state in description)',
              'Main Room Lights Not Working (Please state in description'=>'Main Room Lights Not Working (Please state in description)',
              'Remote for the Garage ($50 refundable deposit) '=>'Remote for the Garage ($50 refundable deposit)',
              'Lost Keys ($55 replacement cost)'=>'Lost Keys ($55 replacement cost)',
              'Others(Please specify below)'=>'Others(Please specify below)'],
            'class' => 'form-control'])
          ?>

        </div>

        <div class="col-md-12">
          <?= $this->Form->input('description', ['rows' => '3', 'class' => 'form-control']) ?>
        </div> 

        <div class="col-md-12">
          <div class="custom-file-upload">
            <?php echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Image']); ?>
          </div>
        </div>
        
      </div>
           
    </fieldset>

    <br>
    
    <br>

    <?= $this->Form->button('<i class="fa fa-paper-plane"></i> Send Request', ['class' => 'form-control btn-primary button button-action button-3d']); ?>
    <?= $this->Form->end() ?>
    
  </div>
</div>