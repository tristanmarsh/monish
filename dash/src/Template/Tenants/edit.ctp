<?php
    $this->Html->addCrumb('Tenants', array('controller' => 'Tenants', 'action' => 'index'));
    $this->Html->addCrumb($defaultPerson->first_name." ".$defaultPerson->last_name);
?>

<!-- File: src/Template/Users/edit.ctp -->

<h1><?= $defaultPerson->first_name." ".$defaultPerson->last_name; ?></h1>
<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
        </ul>

    </div>
            <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" ><?= $this->Html->link('View', ['action' => 'view', $defaultPerson->id]) ?></li>
            <li role="presentation" class="active"><?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?></li>
        </ul>

    </div>


</div>

    <div class="panel panel-primary">

      <div class="panel-heading">
                    <h2 class="panel-title">Edit Tenant</h2>
      </div>
      <div class="panel-body">

        <?= $this->Form->create($user, array('type' => 'file', 'class' => 'form-group')) ?>

        <fieldset class="input-group">


            
            <div class="col-md-6">
            
              <?= $this->Form->input('first_name', array('default' => $defaultPerson->first_name,'class' => 'form-control')) ?>
              <?= $this->Form->input('last_name', array('default' => $defaultPerson->last_name,'class' => 'form-control')) ?>
              <?= $this->Form->input('common_name', array('default' => $defaultPerson->common_name,'class' => 'form-control')) ?>
              <?= $this->Form->input('visa', array('default' => $defaultPerson->visa,'class' => 'form-control')) ?>
              <?= $this->Form->input('account_name', array('default' => $defaultPerson->account_name,'class' => 'form-control')) ?>
              <?= $this->Form->input('bsb_number', array('default' => $defaultPerson->bsb_number,'class' => 'form-control')) ?>
<!--              <?= $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']); ?>
                 <?= $this->form->input('date_start',['id'=>'dateStartPicker','class' => 'form-control']); ?> -->


              
            </div>


            <div class="col-md-6">
             
              <?= $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant'], 'class' => 'form-control']) ?>
             
              <?= $this->Form->input('phone', array('default' => $defaultPerson->phone,'class' => 'form-control')) ?>
             
              <?= $this->Form->input('username', array('label'=>'Username/Email', 'class' => 'form-control')) ?>

              <?= $this->Form->input('parent_address', array('default' => $defaultPerson->parent_address,'class' => 'form-control')) ?>

              <?= $this->Form->input('account_number', array('default' => $defaultPerson->account_number,'class' => 'form-control')) ?>

              <?= $this->Form->input('internet_plan', ['options' => ['Free' => 'Free', 'Basic' => 'Basic', 'Standard' => 'Standard', 'Premium' => 'Premium'],'default' => $defaultStudent->internet_plan, 'class' => 'form-control']) ?>
<!-- 
              <?= $this->Form->input('weekly_price', ['class' => 'form-control']); ?>

              <?= $this->form->input('date_end',['id'=>'dateEndPicker','class' => 'form-control']); ?> -->


            
            </div>

            
           </fieldset>
           <br>
            <div class="col-md-12">

           <?= $this->Form->button(__('Edit Tenant'), ['class' => 'form-control btn btn-primary']); ?>
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

