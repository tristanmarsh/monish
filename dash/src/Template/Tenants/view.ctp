<?php
$this->Html->addCrumb('Tenants', '/tenants');
$this->Html->addCrumb($person->first_name." ".$person->last_name);
?>

  <!-- Tristan's Adorable/Gravatar Avatar Script -->
  <?php
    $email = $person->email;
    $emailHash = md5( strtolower( trim( $email ) ) );

    $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
    $defaultImageQuery = urlencode($defaultImageQuery);

    $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;

    $gravatarImage = '<img height="80px" width="80px" class="img img-circle gravatar" style="display:inline; margin-right:15px;" src="' . $gravatarQuery . '"/>';

    ?>

<h1><?= $gravatarImage . $person->first_name." ".$person->last_name; ?></h1>

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

    <div class="button-group">

      <?php if ($person->student->archived === "NO") {
        $current='active';
        $archived='';
      } else if($person->student->archived === "YES"){
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
        ['action' => 'view', $person->id],
        ['class' => 'button button-pill button-primary active', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
        '<i class="fa fa-pencil"></i> Edit',
        ['action' => 'edit', $person->user->id],
        ['class' => 'button button-pill button-action', 'escape' => false]
      ); ?>
    </div>

    <div class="button-group">
    <?php if ($person->student->archived === "NO") {

      echo $this->Form->postLink(
        '<i class="fa fa-archive"></i> Archive Tenant',
        ['controller'=>'tenants', 'action' => 'archivetenant',$student->id],
        ['confirm' => 'Archive ' . $person->first_name . ' ' . $person->last_name .'?' , "escape" => false,
          'class' => 'button button-pill-override button-caution',
          'escape' => false
      ]);

    } else {

      echo $this->Form->postLink(
        '<i class="fa fa-archive"></i> Unarchive Tenant',
        ['controller'=>'tenants', 'action' => 'unarchivetenant',$student->id],
        ['confirm' => 'Unarchive ' . $person->first_name . ' ' . $person->last_name .'?' , "escape" => false,
          'class' => 'button button-pill-override button-caution',
          'escape' => false
      ]);

    } ?>
    </div>

  </div>

</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h2 class="panel-title">General Details</h2>
  </div>

  <!-- Table -->
  <div class="table-responsive">
    <table cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th>First&nbsp;Name</th>
          <th>Last&nbsp;Name</th>
          <th>Preferred&nbsp;Name</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Internet&nbsp;Plan</th>
          <th>Visa</th>
          <th>Parent&nbsp;Address</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $person->first_name ?></td>
          <td><?= $person->last_name ?></td>
          <td><?= $person->common_name ?></td>
          <td><?= $person->gender ?></td>
          <td><?= $person->phone ?></td>
          <td><?= $person->email ?></td>
          <td><?= $person->student->internet_plan ?></td>
          <td><?= $person->visa ?></td>
          <td><?= $person->parent_address ?></td>
          <td class="action action-edit">
            <?php echo $this->Html->link(
              '<span class="glyphicon glyphicon-pencil"></span>',
              ['controller' => 'tenants', 'action' => 'edit', $person->user->id],
              ['escape' => false]);
              ?>
            </span></td>
          </tr>
        </tbody>
      </table>
    </div>
</div>


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  <h2 class="panel-title">Personal Details</h2>
</div>

<!-- Table -->
<div class="table-responsive">
  <table cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th>Visa</th>
        <th>Parent's&nbsp;Address</th>
        <th>Account Name</th>
        <th>Account Number</th>
        <th>BSB</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $person->visa ?></td>
        <td><?= $person->parent_address ?></td>
        <td><?= $person->account_name ?></td>
        <td><?= $person->account_number ?></td>
        <td><?= $person->bsb_number ?></td>
        <td class="action action-edit" >
          <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller' => 'tenants', 'action' => 'edit', $person->user->id], ['escape' => false]); ?>
        </span></td>
      </tr>
    </tbody>
  </table>
</div>
</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  <h2 class="panel-title">Related Leases</h2>
</div>

<!-- Table -->
<div class="table-responsive">

  <?php if (!empty($student->leases)): ?>
  <table cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th><?= __('Property') ?></th>
        <th><?= __('Room') ?></th>
        <th><?= __('Date Start') ?></th>
        <th><?= __('Date End') ?></th>
        <th><?= __('Weekly Price') ?></th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php foreach ($query as $leases): ?>
    <tr>
      <td><?= $leases->property->address ?></td>
      <td><?= $leases->room->room_name ?></td>
      <td><?= h($leases->date_start->format('Y M d')) ?></td>
      <td><?= h($leases->date_end->format('Y M d')) ?></td>
      <td><?= h($this->Number->currency($leases->weekly_price)) ?></td>
      <td class="action action-remove" >
        <?php echo $this->Form->postlink('<span class="glyphicon glyphicon-remove"></span>', ['controller' => 'Leases', 'action' => 'delete', $leases->id], ['confirm' => 'Delete ' . '?' , "escape" => false]); ?>
      </span></td>

    </tr>

  <?php endforeach; ?>
</table>
<?php endif; ?>
</div>
</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  <h2 class="panel-title">Related Emergency Contacts</h2>
</div>

<!-- Table -->
<div class="table-responsive">
  <table cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th><?= __('First Name') ?></th>
        <th><?= __('Last Name') ?></th>
        <th><?= __('Phone') ?></th>
        <th><?= __('Email') ?></th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>    
    <?php foreach ($emergencyQuery as $emergency): ?>
    <tr>
      <td><?= $emergency->first_name ?></td>
      <td><?= $emergency->last_name ?></td>
      <td><?= $emergency->phone ?></td>
      <td><?= $emergency->email ?></td>
      <td class="action action-edit" >
        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller' => 'emergencies', 'action' => 'edit', $emergency->id], ['escape' => false]); ?>
      </span></td>
      <td class="action action-remove" >
        <?php echo $this->Form->postlink('<span class="glyphicon glyphicon-remove"></span>', ['controller' => 'emergencies', 'action' => 'delete', $emergency->id], ['confirm' => 'Delete ' . '?' , "escape" => false]); ?>
      </span></td>
    </tr>

  <?php endforeach; ?>
</table>
</div>
</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
  <h2 class="panel-title">Registered Devices</h2>
</div>

<!-- Table -->
<div class="table-responsive">
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Device&nbsp;Name</th>
        <th>Mac&nbsp;Address</th>
      </tr>
    </thead>
    <!-- ONE -->
    <tr>
      <td><strong>1</strong></td>
      <td>
        <?php if ($person->macaddress->device_name_one === "") : ?>
      <?php endif; ?>
      <?= $person->macaddress->device_name_one ?>
    </td>
    <td>
      <?php if ($person->macaddress->mac_address_one === "") : ?>
    <?php endif; ?>
    <?= $person->macaddress->mac_address_one ?>
  </td>
</tr>
<!-- TWO -->
<tr>
  <td><strong>2</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_two === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_two ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_two === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_two ?>
</td>
</tr>
<!-- THREE -->
<tr>
  <td><strong>3</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_three === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_three ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_three === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_three ?>
</td>
</tr>
<!-- FOUR -->
<tr>
  <td><strong>4</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_four === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_four ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_four === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_four ?>
</td>
</tr>
<!-- FIVE -->
<tr>
  <td><strong>5</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_five === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_five ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_five === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_five ?>
</td>
</tr>
<!-- SIX -->
<tr>
  <td><strong>6</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_six === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_six ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_six === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_six ?>
</td>
</tr>
<!-- SEVEN -->
<tr>
  <td><strong>7</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_seven === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_seven ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_seven === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_seven ?>
</td>
</tr>
<!-- EIGHT -->
<tr>
  <td><strong>8</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_eight === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_eight ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_eight === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_eight ?>
</td>
</tr>
<!-- NINE -->
<tr>
  <td><strong>9</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_nine === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_nine ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_nine === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_nine ?>
</td>
</tr>
<!-- TEN -->
<tr>
  <td><strong>10</strong></td>
  <td>
    <?php if ($person->macaddress->device_name_ten === "") : ?>
  <?php endif; ?>
  <?= $person->macaddress->device_name_ten ?>
</td>
<td>
  <?php if ($person->macaddress->mac_address_ten === "") : ?>
<?php endif; ?>
<?= $person->macaddress->mac_address_ten ?>
</td>
</tr>
</table>
</div>
</div>