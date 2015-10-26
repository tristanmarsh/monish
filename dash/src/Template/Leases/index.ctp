<?php
$this->Html->addCrumb('Leases', '/leases');
?>
<h1>Leases</h1>

<!-- File: src/Template/Leases/index.ctp -->
<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <div class="row">

      <div class="col-sm-6 clearfix"> 

        <div class="button-group">
          <?= $this->Html->link(
            '<i class="fa fa-flash"></i> Current',
            ['action' => 'index'],
            ['class' => 'button button-pill button-primary active', 'escape' => false]
          ); ?>

          <?= $this->Html->link(
            '<i class="fa fa-archive"></i> Archived',
            ['action' => 'archived'],
            ['class' => 'button button-pill button-primary', 'escape' => false]
          ); ?>
        </div>
        
        <div class="button-group">
          <?= $this->Html->link(
          '<i class="fa fa-plus"></i> New Lease',
          ['action' => 'add'],
          ['class' => 'button button-pill-override button-action', 'escape' => false]
          ); ?>
        </div>

      </div>

      
      <div class="col-sm-6 clearfix">

        <form class="searchbox">
          <input type="search" id="myInputTextField" placeholder="Search..." name="search" class="searchbox-input" onkeyup="buttonUp();" required>
          <input type="submit" class="searchbox-submit" value="Go">
          <span class="searchbox-icon"><i class="fa fa-search"></i></span>
        </form>

      </div>

    </div>

  </div>

</div>


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h2 class="panel-title">Current Leases</h2>
  </div>


  <!-- Table -->
  <div class="table-responsive">
    <table class="datatable">
      <thead>
        <tr>
          <th>Tenant</th>
          <th>Property</th>
          <th>Room</th>
          <th>Start</th>
          <th>End</th>
          <th>Weekly&nbsp;Price</th>
          <th style="text-align:center;">Delete</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($leases as $lease): ?>
        <?php if($lease->archived === 'NO') : ?>
        <tr>
          <td> 
            <?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?>  
            <?php $person = $walrus->get($lease->student->person_id); ?>
           
            <!-- Tristan's Adorable/Gravatar Avatar Script -->
            <?php
              $email = $person->email;
              $emailHash = md5( strtolower( trim( $email ) ) );

              $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
              $defaultImageQuery = urlencode($defaultImageQuery);

              $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;
              
              $gravatarImage = '<img height="80px" width="80px" class="img gravatar" src="' . $gravatarQuery . '"/>';

              echo $gravatarImage;
            ?>

            <span>

              <?= $person->first_name ?>
              <?= $person->last_name ?>
            </span></td>
            <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>
              <?= $lease->property->address ?>
            </span></td>
            <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>  
              <?= $lease->room->room_name ?>
            </span></td>

            <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>
              <?= h($lease->date_start->format('Y/m/d')) ?>
            </span></td>
            <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>
              <?= h($lease->date_end->format('Y/m/d')) ?>
            </span></td>
            <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>
              <?= $this->Number->currency($lease->weekly_price) ?>
            </span></td>
            <td class="action action-remove" >
              <?php echo $this->Form->postlink('<span class="glyphicon glyphicon-remove"></span>', ['controller' => 'Leases', 'action' => 'delete', $lease->id], ['confirm' => 'Delete ' . $lease->property->address. " ". $lease->room->room_name  .' Lease for '. $person->first_name . " " . $person->last_name . '?' , "escape" => false]); ?>
            </span></td>

          </span></td>
        </tr>
      <?php endif ?>
    <?php endforeach; ?>

  </tbody>
</table>
<div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>
</div>

</div>
