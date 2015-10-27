<?php
    $this->Html->addCrumb('Tenants', array('controller' => 'Tenants', 'action' => 'index'));
    $this->Html->addCrumb($defaultPerson->first_name." ".$defaultPerson->last_name);
?>

<!-- File: src/Template/Users/edit.ctp -->

  <!-- Tristan's Adorable/Gravatar Avatar Script -->
  <?php
    $email = $defaultPerson->email;
    $emailHash = md5( strtolower( trim( $email ) ) );

    $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
    $defaultImageQuery = urlencode($defaultImageQuery);

    $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;

    $gravatarImage = '<img height="80px" width="80px" class="img img-circle gravatar" style="display:inline; margin-right:15px;" src="' . $gravatarQuery . '"/>';

    ?>

<h1><?= $gravatarImage . $defaultPerson->first_name." ".$defaultPerson->last_name; ?></h1>


<div class="panel panel-default panel-actionbar">
  
  <div class="panel-body">

    <div class="button-group">

      <?php if ($defaultPerson->student->archived === "NO") {
        $current='active';
        $archived='';
      } else if($defaultPerson->student->archived === "YES"){
        $current='';
        $archived='active';
      } ?>

      <?= $this->Html->link(
      '<i class="fa fa-flash"></i> Current',
      ['action' => 'index'],
      ['class' => 'button button-pill button-primary ' . $current , 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-archive"></i> Archived',
      ['action' => 'archived'],
      ['class' => 'button button-pill button-primary ' . $archived, 'escape' => false]
      ); ?>

    </div>
    
    <div class="button-group">
      <?= $this->Html->link(
      '<i class="fa fa-plus"></i> New Tenant',
      ['action' => 'add'],
      ['class' => 'button button-pill button-pill-override button-action', 'escape' => false]
      ); ?>
    </div>                
      
  </div>

  <div class="panel-footer">

    <div class="button-group">
      <?= $this->Html->link(
      '<i class="fa fa-eye"></i> View',
      ['action' => 'view', $defaultPerson->id],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Edit',
      ['action' => 'edit', $user->id],
      ['class' => 'button button-pill button-action active', 'escape' => false]
      ); ?>
    </div>

    <div class="button-group">
      <?php if ($defaultPerson->student->archived === "NO") {

        echo $this->Form->postLink(
          '<i class="fa fa-archive"></i> Archive Tenant',
          ['controller'=>'tenants', 'action' => 'archivetenant',$defaultPerson->student->id],
          ['confirm' => 'Archive ' . $defaultPerson->first_name . ' ' . $defaultPerson->last_name .'?' , "escape" => false,
            'class' => 'button button-pill-override button-caution',
            'escape' => false
        ]);

      } else {

        echo $this->Form->postLink(
          '<i class="fa fa-archive"></i> Unarchive Tenant',
          ['controller'=>'tenants', 'action' => 'unarchivetenant',$defaultPerson->student->id],
          ['confirm' => 'Unarchive ' . $defaultPerson->first_name . ' ' . $defaultPerson->last_name .'?' , "escape" => false,
            'class' => 'button button-pill-override button-caution',
            'escape' => false
        ]);

      } ?>

    </div>

  </div>

</div>


<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">Edit Tenant</h2>
  </div>
  
  <div class="panel-body">

    <?= $this->Form->create($user, array('type' => 'file', 'class' => 'form-group')) ?>

    <fieldset class="input-group">

    
      <legend>Personal Details</legend>

      <div class="col-md-6">
        <?= $this->Form->input('first_name', array('default' => $defaultPerson->first_name,'class' => 'form-control')) ?>
      </div>

      <div class="col-md-6">
        <?= $this->Form->input('last_name', array('default' => $defaultPerson->last_name,'class' => 'form-control')) ?>
      </div>
      
      <div class="col-md-6">
        <?= $this->Form->input('common_name', array('default' => $defaultPerson->common_name,'class' => 'form-control')) ?>
      </div>

      <div class="col-md-6">
        <?= $this->Form->input('phone', array('default' => $defaultPerson->phone,'class' => 'form-control')) ?>
      </div>
      
      <div class="col-md-6">
        <?= $this->Form->input('visa', array('default' => $defaultPerson->visa,'class' => 'form-control')) ?>
      </div>

      <div class="col-md-6">
        <?= $this->Form->input('username', array('label'=>'Username/Email', 'class' => 'form-control')) ?>
      </div>
      
      <div class="col-md-6">
        <?= $this->Form->input('parent_address', array('default' => $defaultPerson->parent_address,'class' => 'form-control')) ?>
      </div>

      <div class="col-md-6">
        <?= $this->Form->input('internet_plan', ['options' => ['Free' => 'Free', 'Basic' => 'Basic', 'Standard' => 'Standard', 'Premium' => 'Premium'],'defaul
      t' => $defaultStudent->internet_plan, 'class' => 'form-control']) ?>
      </div>

      <div class="col-md-6">
        <?= $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant'], 'class' => 'form-control']) ?>
      </div>

    </fieldset>

    <fieldset class="input-group">

     <legend>Payment Details</legend>

        <div class="col-md-6">
          <?= $this->Form->input('account_name', array('default' => $defaultPerson->account_name,'class' => 'form-control')) ?>
        </div>

        <div class="col-md-6">
          <?= $this->Form->input('account_number', array('default' => $defaultPerson->account_number,'class' => 'form-control')) ?>
        </div>

        <div class="col-md-6">
          <?= $this->Form->input('bsb_number', array('default' => $defaultPerson->bsb_number,'class' => 'form-control')) ?>
        </div>

        <!-- Hidden Lease Details Which Should Never Be Edited -->
        <!-- <?= $this->Form->input('room_id', ['options' => $rooms,'class' => 'form-control']); ?> -->
        <!-- <?= $this->Form->input('weekly_price', ['class' => 'form-control']); ?> -->
        <!-- <?= $this->Form->input('date_start',['id'=>'dateStartPicker','class' => 'form-control']); ?> -->
        <!-- <?= $this->Form->input('date_end',['id'=>'dateEndPicker','class' => 'form-control']); ?> -->
      
     </fieldset>
    
    <br>

     <?= $this->Form->button('<i class="fa fa-pencil"></i> Edit Tenant', ['class' => 'form-control button button-action button-3d']); ?>
     <?= $this->Form->end() ?>
     <?php
     echo $this->Form->create(null, [
      'url' => ['controller' => 'People', 'action' => 'index']
      ]);
     ?>

  </div>

  </div>




</div>

