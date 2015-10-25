<?php
    $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb($entity->title);
?>
<!-- File: src/Template/Articles/edit.ctp -->

<h1><?= $entity->title; ?></h1>

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
    ['class' => 'button button-pill button-action', 'escape' => false]
    ); ?>

  </div>

  <div class="panel-footer">

      <div class="button-group">
      <?= $this->Html->link(
        '<i class="fa fa-eye"></i> View',
        ['action' => 'view', $entity->id],
        ['class' => 'button button-pill button-primary', 'escape' => false]
        ); ?>

      <?= $this->Html->link(
        '<i class="fa fa-pencil"></i> Edit',
        ['action' => 'edit', $entity->id],
        ['class' => 'button button-pill button-action active', 'escape' => false]
      ); ?>  
      </div>

      <div class="button-group">
        <?= $this->Form->postLink(
          '<i class="fa fa-times"></i> Close',
          ['controller'=>'requests', 'action' => 'delete', $entity->id],
          ['confirm' => 'Close ' . $entity->title .' Request from '.  $lion->person->first_name . " " . $lion->person->last_name . '?' , "escape" => false,
            'class' => 'button button-pill-override button-caution',
            'escape' => false
          ]
        ); ?>
      </div>
    
  </div>
  
</div>

<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">Edit Request</h2>
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

            <?= $this->Form->input('entry_time', ['label'=>'Permission to enter room or property?', 'options' => ['Anytime' => 'Yes, Any Time', '10am to 5pm' => 'Yes, Between 10:am and 5:pm', 'Arrange a time' => 'No, please arrange a time with me', 'N/A' => 'Not applicable'],'class' => 'form-control']) ?>

            <?= $this->Form->input('category', ['options' => ['General' => 'General', 'Maintenance' => 'Maintenance', 'Internet' => 'Internet', 'Lease' => 'Lease', 'Noisy Tenant'=> 'Noisy Tenant', 'Other Tenant Not Cleaning'=> 'Other Tenant Not Cleaning','Bathroom Light Broken'=>'Bathroom Light Broken','Bedroom Light Broken'=>'Bedroom Light Broken','Shower Hose Leaking/Broken' =>'Shower Hose Leaking/Broken', 'Shower Leaking'=>'Shower Leaking','Toilet Broken'=>'Toilet Broken','Toilet Not Flushing Properly'=>'Toilet Not Flushing Properly','Fan not Working'=>'Fan not Working','Vacuum Cleaner not Working'=>'Vacuum Cleaner not Working','Others Leaking (Please state in description)'=>'Others Leaking (Please state in description)','Main Room Lights Not Working (Please state in description'=>'Main Room Lights Not Working (Please state in description)','Remote for the Garage ($50 refundable deposit) '=>'Remote for the Garage ($50 refundable deposit)', 'Lost Keys ($55 replacement cost)'=>'Lost Keys ($55 replacement cost)','Others(Please specify below)'=>'Others(Please specify below)'],'class' => 'form-control']) ?>

          </div>


         <div class="col-md-12">

          <?= $this->Form->input('description', ['rows' => '3', 'class' => 'form-control']) ?>

          <?php // add the type to the create-method
            //echo $this->Form->create($entity, ['type' => 'file']);

            // add the avatar-input
          echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Picture (Optional)']);
          ?>
        </div>

      </div>


    </fieldset>
    <br>
     <?= $this->Form->button('<i class="fa fa-pencil"></i> Edit Request', ['class' => 'form-control button button-action button-3d']); ?>
     
     <?= $this->Form->end() ?>

     <?php echo $this->Form->create(null, [
      'url' => ['controller' => 'Requests', 'action' => 'index']
      ]); ?>

    </div>
</div>