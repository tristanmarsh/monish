<?php
    $this->Html->addCrumb('Emergency Contacts', array('controller' => 'Emergencies', 'action' => 'index'));
    $this->Html->addCrumb('Add New Contact', array('controller' => 'Emergencies', 'action' => 'add'));

?>

<h1>Emergency Contacts</h1>

<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <div class="button-set">
      <?= $this->Html->link(
        '<i class="glyphicon glyphicon-user"></i> All',
        ['action' => 'index'],
        ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>
    </div>

    <?= $this->Html->link(
      '<i class="fa fa-plus"></i> New Emergency Contact',
      ['action' => 'add'],
      ['class' => 'button button-pill button-action active', 'escape' => false]
    ); ?>

  </div>

</div>

<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">New Emergency Contact</h2>
  </div>

  <div class="panel-body">

    <?= $this->Form->create($emergency, array('class' => 'form-group')); ?>
    <fieldset>

      <div class="row">

        <div class="col-md-6">
          <?= $this->Form->input('first_name', array('class' => 'form-control')); ?>
        </div>

        <div class="col-md-6">
          <?= $this->Form->input('last_name', array('class' => 'form-control')); ?>
        </div>

        <div class="col-md-6">
          <?= $this->Form->input('phone', array('class' => 'form-control')); ?>
        </div>
        
        <div class="col-md-6">
          <?= $this->Form->input('email', array('class' => 'form-control')); ?>
        </div>

      </div>
      
    </fieldset>

    <?= $this->Form->button('<i class="fa fa-plus"></i> Create Emergency Contact', ['class' => 'form-control btn-primary button button-action button-3d', 'escape' => false]); ?>
    <?= $this->Form->end() ?>
    
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, ['url' => ['controller' => 'Emergencies', 'action' => 'index'] ])?>
  
  </div>

</div>