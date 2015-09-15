<?php
    $this->Html->addCrumb('Requests', array('controller' => 'requests', 'action' => 'index'));
    $this->Html->addCrumb('Add Request', array('controller' => 'requests', 'action' => 'add'));
?>
<!-- File: src/Template/Articles/add.ctp -->

<h1>Requests</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <li role="presentation"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('New Request', ['action' => 'add']) ?></li>
        </ul>


      </div>

    </div>







              <div class="panel panel-primary">

          <div class="panel-heading">
            <h2 class="panel-title">Edit Request</h2>

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

			<?php	// add the type to the create-method
				//echo $this->Form->create($entity, ['type' => 'file']);

				// add the avatar-input
				echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Picture (Optional)']);
			?>
    </div>
           
           </fieldset>
           <br>
                        <div class="col-md-12">
           <?= $this->Form->button(__('Create Request'), ['class' => 'form-control btn btn-primary']); ?>
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

<!-- // <?php
//     // note $this->Form->create() generates <form method="post" action="/articles/add">
//     echo $this->Form->create($zebra, array('class' => 'form-group'));
//     echo $this->Form->input('title', array('class' => 'form-control'));
// 	echo $this->Form->input('category', ['options' => ['GENERAL' => 'GENERAL', 'MAINTENANCE' => 'MAINTENANCE', 'INTERNET' => 'INTERNET', 'LEASE' => 'LEASE']], array('class' => 'form-control'));
//     echo $this->Form->input('property_address', ['options' => $addresses], array('class' => 'form-control'));
//     echo $this->Form->input('description', ['rows' => '3'], array('class' => 'form-control'));
//     echo $this->Form->button(__('Submit Request'));
//     echo $this->Form->end();
// 	echo $this->Form->create(null, [
// 		'url' => ['controller' => 'Requests', 'action' => 'index']
// 		]);
// 	echo $this->Form->button(__('Cancel'));
// ?> -->