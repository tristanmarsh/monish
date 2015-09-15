<?php
    $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('Edit');
?>
<!-- File: src/Template/Articles/edit.ctp -->

<h1>Request</h1>
<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New Request', ['action' => 'add']) ?></li>
        </ul>

    </div>


        <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" ><?= $this->Html->link('View', ['action' => 'view', $entity->id]) ?></li>
            <li role="presentation" class="active"><?= $this->Html->link('Edit', ['action' => 'edit', $entity->id]) ?></li>
        </ul>

    </div>


</div>


              <div class="panel panel-primary">

          <div class="panel-heading">
            <h2 class="panel-title">New Request</h2>

                      </div>
            <div class="panel-body">
                      <?= $this->Form->create($entity, array('type' => 'file', 'class' => 'form-group')) ?>
              <fieldset>

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
           
           </fieldset>
           <br>
                        <div class="col-md-12">
           <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-primary']); ?>
           <?= $this->Form->end() ?>
           <br>
           <br>
           
           <?php
           echo $this->Form->create(null, [
            'url' => ['controller' => 'Requests', 'action' => 'index']
            ]);
           ?>
      </div>
    </div>
</div>