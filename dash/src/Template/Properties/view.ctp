<?php
  $this->Html->addCrumb('Properties', '/properties');
  $this->Html->addCrumb($property->address);
?>
<h1><?= $property->address; ?></h1>

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

  <div class="button-group">

    <?php if ($property->archived === "NO") {
      $current='active';
      $archived='';
    } else if($property->archived === "YES"){
      $current='';
      $archived='active';
    } ?>

    <?= $this->Html->link(
    '<i class="fa fa-flash"></i> Current',
    ['action' => 'index'],
    ['class' => 'button button-pill button-primary ' . $current, 'escape' => false]
    ); ?>

    <?= $this->Html->link(
    '<i class="fa fa-archive"></i> Archived',
    ['action' => 'archived'],
    ['class' => 'button button-pill button-primary ' . $archived, 'escape' => false]
    ); ?>

  </div>
  
  <div class="button-group">
    <?= $this->Html->link(
    '<i class="fa fa-plus"></i> New Property',
    ['action' => 'add'],
    ['class' => 'button button-pill button-pill-override button-action', 'escape' => false]
    ); ?>
  </div>                
    
  </div>

  <div class="panel-footer">

  <div class="button-group">
    <?= $this->Html->link(
    '<i class="fa fa-eye"></i> View',
    ['action' => 'view', $property->id],
    ['class' => 'button button-pill button-primary active', 'escape' => false]
    ); ?>

    <?= $this->Html->link(
    '<i class="fa fa-pencil"></i> Edit',
    ['action' => 'edit', $property->id],
    ['class' => 'button button-pill button-action', 'escape' => false]
    ); ?>
  </div>

  <div class="button-group">
  <?php
   if ($property->archived === "NO") {
     echo $this->Form->postLink(
    '<i class="fa fa-archive"></i> Archive Property',
    ['action' => 'archiveproperty',$property->id],
    ['confirm' => 'Archive ' . $property->address .'?' , "escape" => false,
      'class' => 'button button-pill-override button-caution',
      'escape' => false
    ]);

     } else {
      echo $this->Form->postLink(
      '<i class="fa fa-archive"></i> Unarchive Property',
      ['action' => 'unarchiveproperty',$property->id],
      ['confirm' => 'Unarchive ' . $property->address .'?' , "escape" => false,
        'class' => 'button button-pill-override button-caution',
        'escape' => false
      ]);

    } ?>
  </div>

  <div class="button-group">
    <?= $this->Html->link(
      '<i class="fa fa-plus"></i> New Room',
      ['controller'=>'rooms', 'action' => 'add', $property->id],
      ['class' => 'button button-pill-override button-action', 'escape' => false]
    ); ?>
  </div>


  </div>

</div>

<div class="row">

  <div class="col-md-6">
    <div class="panel panel-primary">

      <div class="panel-heading">
        <h2 class="panel-title"><?= $property->address ?></h2>
      </div>
      
      <?php
        if (!($property->avatar_directory === NULL)) {
          $directory = substr($property->avatar_url, 5);
          echo $this->Html->image($directory, ['alt' => 'CakePHP', 'class'=>'img img-responsive img-center']);
        }
      ?>

    </div>
  </div> 

  <div class="col-md-6">
    
    <div class="panel panel-primary">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <h2 class="panel-title">Rooms</h2>
      </div>

      <div class="table-responsive">
        <?php if (!empty($property->rooms)): ?>
          <table class="datatable">
            <thead>
            <tr>
              <th>Room</th>
              <th colspan="2">Tenant</th>
              <th>Status</th>
              <th>Archived</th>
              <th style="text-align:center" width="68x">Edit</th>
              <!-- <th style="text-align:center" width="68px">Delete</th> -->
            </tr>
            </thead>
            <?php foreach ($property->rooms as $rooms): ?>
              <tr>

                <!-- Room Name -->
                <td>
                  <?= $this->Html->link("", ['controller'=>'rooms', 'action' => 'view', $rooms->id]) ?>
                  <?= $rooms->room_name ?>
                </td>

                <!-- Tenant Avatar -->
                <td>
                  <?= $this->Html->link("", ['controller'=>'rooms', 'action' => 'view', $rooms->id]) ?>
                  <?php
                  $room = $roomlease->get($rooms->id, ['contain'=>'Leases']);

                  $test = "";
                  $testtwo = "";
                  $sentinel = true; //true if Never Been Leased
                  ?>
                  <?php
                  if (!empty($room->leases)) {
                    foreach ($room->leases as $leastenddate) {
                      $test = $test."||".$leastenddate->date_end->format('Y-m-d');
                    }
                  }
                  else {
                    $sentinel = false;
                  }
                  if ($sentinel) { //THIS CHECK MAKES THE TABLE ALIGNMENT WEIRD I HAVE NO IDEA WHY, But it is the only way for the code to correctly check room status
                    $toArray = explode("||", $test);

                    foreach ($room->leases as $leastenddate) {
                      if ($leastenddate->date_end->format('Y-m-d') === max($toArray)) {
                        $studentid = $leastenddate->student_id;
                        $studentEntity = $studentTable->get($studentid, ['contain'=>'People']);
                        $personEntity = $peopleTable->get($studentEntity->person_id);
                      };
                    }

                    if (max($toArray) > date("Y-m-d")) {

                    } else if (max($toArray) === date("Y-m-d")) {

                    } else if (max($toArray) < date("Y-m-d")) {
                    }
                  }
                  ?>
                  
                  <!-- Tristan's Adorable/Gravatar Avatar Script -->
                  <?php if (!empty($personEntity)){

                    $email = $personEntity->email;
                    $emailHash = md5( strtolower( trim( $email ) ) );

                    $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
                    $defaultImageQuery = urlencode($defaultImageQuery);

                    $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;
                    
                    $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';
                  } ?>

                  <?php
                  if (!empty($room->leases)) {
                    foreach ($room->leases as $leastenddate) {
                      $test = $test."||".$leastenddate->date_end->format('Y-m-d');
                    }
                  }
                  else {
                    $sentinel = false;
                  }
                  if ($sentinel) { //THIS CHECK MAKES THE TABLE ALIGNMENT WEIRD I HAVE NO IDEA WHY, But it is the only way for the code to correctly check room status
                    $toArray = explode("||", $test);

                    foreach ($room->leases as $leastenddate) {
                      if ($leastenddate->date_end->format('Y-m-d') === max($toArray)) {
                        $studentid = $leastenddate->student_id;
                        $studentEntity = $studentTable->get($studentid, ['contain'=>'People']);
                        $personEntity = $peopleTable->get($studentEntity->person_id);
                      };
                    }

                    if (max($toArray) > date("Y-m-d")) {
                      echo $gravatarImage;
                    } else if (max($toArray) === date("Y-m-d")) {
                      echo $gravatarImage;
                    } else if (max($toArray) < date("Y-m-d")) {
                    }
                  }
                  ?>
                </td>

                <!-- Tenant Name -->
                <td>
                  <?= $this->Html->link("", ['controller'=>'rooms', 'action' => 'view', $rooms->id]) ?>
                  <?php
                  if (!empty($room->leases)) {
                    foreach ($room->leases as $leastenddate) {
                      $test = $test."||".$leastenddate->date_end->format('Y-m-d');
                    }
                  }
                  else {
                    echo "No Tenant";
                    $sentinel = false;
                  }
                  if ($sentinel) { //THIS CHECK MAKES THE TABLE ALIGNMENT WEIRD I HAVE NO IDEA WHY, But it is the only way for the code to correctly check room status
                    $toArray = explode("||", $test);

                    foreach ($room->leases as $leastenddate) {
                      if ($leastenddate->date_end->format('Y-m-d') === max($toArray)) {
                        $studentid = $leastenddate->student_id;
                        $studentEntity = $studentTable->get($studentid, ['contain'=>'People']);
                        $personEntity = $peopleTable->get($studentEntity->person_id);
                      };
                    }

                    if (max($toArray) > date("Y-m-d")) {
                      echo $personEntity->first_name." ".$personEntity->last_name;
                    } else if (max($toArray) === date("Y-m-d")) {
                      echo $personEntity->first_name." ".$personEntity->last_name;
                    } else if (max($toArray) < date("Y-m-d")) {
                      echo "No Tenant ";
                    }
                  }
                  ?>
                </td>

                <!-- Status -->
                <td>
                  <?= $this->Html->link("", ['controller'=>'rooms', 'action' => 'view', $rooms->id]) ?>
                  <?php
                  if (!empty($room->leases)) {
                    foreach ($room->leases as $leastenddate) {
                      $test = $test."||".$leastenddate->date_end->format('Y-m-d');
                    }
                  }
                  else {
                    echo "Never Been Leased";
                    $sentinel = false;
                  }
                  if ($sentinel) { //THIS CHECK MAKES THE TABLE ALIGNMENT WEIRD I HAVE NO IDEA WHY, But it is the only way for the code to correctly check room status
                    $toArray = explode("||", $test);

                    foreach ($room->leases as $leastenddate) {
                      if ($leastenddate->date_end->format('Y-m-d') === max($toArray)) {
                        $studentid = $leastenddate->student_id;
                        $studentEntity = $studentTable->get($studentid, ['contain'=>'People']);
                        $personEntity = $peopleTable->get($studentEntity->person_id);
                      };
                    }

                    if (max($toArray) > date("Y-m-d")) {
                      echo "Leased Until " . max($toArray);
                    } else if (max($toArray) === date("Y-m-d")) {
                      echo "Lease Expires Today";
                    } else if (max($toArray) < date("Y-m-d")) {
                      echo "Lease Expired Since ".max($toArray);
                    }
                  }
                  ?>
                </td>

                <!-- Archived -->
                <td>
                  <?= $this->Html->link("", ['controller'=>'rooms', 'action' => 'view', $rooms->id]) ?>
                  <?php
                  if ($rooms->room_archived === 'NO') {
                    echo "No";
                  }
                  if ($rooms->room_archived === 'YES') {
                    echo "Yes";
                  }
                  ?>
                </td>

                <!-- Edit -->
                <td class="action action-edit">
                  <?php
                  echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller' => 'Rooms', 'action' => 'edit', $rooms->id], ['escape' => false]);
                  ?>
                </td>

              </tr>
            <?php endforeach; ?>
          </table>
        <?php endif; ?>
        <div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>

      </div>
    </div>

  </div>   

</div>
