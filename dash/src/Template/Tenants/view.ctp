<?php
$this->Html->addCrumb('Tenants', '/tenants');
$this->Html->addCrumb($person->first_name." ".$person->last_name);
?>
<h1><?= $person->first_name." ".$person->last_name; ?></h1>
<div class="panel panel-default clearfix">

    <div class="panel-body">

        <ul class="nav nav-pills">
            <li role="presentation"><?= $this->Html->link('Current', ['action' => 'index']) ?></li>
            <li role="presentation"><?= $this->Html->link('Archived', ['action' => 'archived']) ?></li>
            <li role="presentation"><?= $this->Html->link('New Tenant', ['action' => 'add']) ?></li>
        </ul>

    </div>
    <div class="panel-footer">

        <ul class="nav nav-pills">
            <li role="presentation" class="active"><?= $this->Html->link('View', ['action' => 'view', $person->id]) ?></li>
            <li role="presentation" ><?= $this->Html->link('Edit', ['action' => 'edit', $person->user->id]) ?></li>
      <!--       <li role="presentation" ><?= $this->Html->link('Archive Tenant', ['action' => 'archive', $student->id]) ?></li> -->

            <li role="presentation">

                <?php

                   if ($person->student->archived === "NO") {
                    echo $this->form->postLink('Archive Tenant', ['controller'=>'tenants', 'action' => 'archivetenant', $student->id], array('class' => 'menu-item-link', 'escape' => false)); 
                   }
                   else {
                    echo $this->form->postLink('Unarchive Tenant', ['controller'=>'tenants', 'action' => 'unarchivetenant', $student->id], array('class' => 'menu-item-link', 'escape' => false));
                   }

                ?>


            </li>
                   


        </ul>

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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Common Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Internet Plan</th>
                <th>Visa</th>
                <th>Parent Address</th>
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
                <th>Parent's Address</th>
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
                <?php echo $this->form->postlink('<span class="glyphicon glyphicon-remove"></span>', ['controller' => 'Leases', 'action' => 'delete', $leases->id], ['confirm' => 'Delete ' . '?' , "escape" => false]); ?>
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
                <?php echo $this->form->postlink('<span class="glyphicon glyphicon-remove"></span>', ['controller' => 'emergencies', 'action' => 'delete', $emergency->id], ['confirm' => 'Delete ' . '?' , "escape" => false]); ?>
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
                <th>Device Name</th>
                <th>Mac Address</th>
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