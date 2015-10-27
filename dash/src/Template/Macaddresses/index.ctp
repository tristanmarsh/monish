<?php
  $this->Html->addCrumb('Mac Address', array('controller' => 'Macaddresses', 'action' => 'index'));
?>

<!-- File: src/Template/Requests/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

<!-- START OF WHAT ADMINISTRATORS SEES -->
<?php if ($user['role'] === "admin") : ?>

<!-- (It's nothing - The administrator sees nothing) -->

<!-- START OF WHAT TENANTS SEES -->
<?php elseif ($user['role'] === "tenant") : ?>

<h1>Registered Devices</h1>

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

    <div class="button-set">
      <?= $this->Html->link(
        '<i class="glyphicon glyphicon-th-list"></i> All',
        ['action' => 'index'],
        ['class' => 'button button-pill button-primary active', 'escape' => false]
      ); ?>
    </div>

    <div class="button-set">
      <?= $this->Html->link(
      '<i class="fa fa-eye"></i> Finding Your MAC Address',
        "http://www.wikihow.com/Find-the-MAC-Address-of-Your-Computer",
        ['class' => 'button button-pill button-highlight', 'escape' => false]
      ); ?>
    </div>
  
  </div>

  <div class="panel-footer">

    <div class="button-set">
      <?= $this->Html->link(
        '<i class="fa fa-pencil"></i> Update Devices',
        ['action' => 'edit', $personEntity->macaddress->id],
        ['class' => 'button button-pill button-action', 'escape' => false]
      ); ?>
    </div>

  </div>

</div>

<div class="panel panel-primary">
        
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

      <tbody>

        <?php

        $i=0;

        $array = array('one','two','three','four','five','six','seven','eight','nine','ten');

        foreach ($array as $value) {

          $device_name = 'device_name_' . $value;
          $mac_address = 'mac_address_' . $value;
          $i++;

          if ( ($personEntity->macaddress->$device_name !== "") && ($personEntity->macaddress->$mac_address !== "") ): ?>
            <tr>

              <td><strong><?= $i ?></strong></td>

              <td>
                <?= $personEntity->macaddress->$device_name ?>
              </td>

              <td>
                <?= $personEntity->macaddress->$mac_address ?>
              </td>

            </tr>
          
          <?php endif;

        } ?>

      </tbody>
      
    </table>
  </div>
</div>

<?php endif; ?>