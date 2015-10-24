<?php
$this->Html->addCrumb('Properties', '/properties');
?>    
<h1>Properties</h1>

<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

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
      '<i class="fa fa-plus"></i> New Property',
      ['action' => 'add'],
      ['class' => 'button button-pill-override button-action', 'escape' => false]
      ); ?>
    </div>

  </div>

</div>


<div class="clearfix">
  <div class="row">

    <?php foreach ($properties as $property): ?>

    <?php $variable ="hello" ?>
    <?php if($property->archived === 'NO') : ?>
    <div class="clearing col-xs-12 col-sm-6 col-md-4 col-lg-4">

      <!-- Retrieve Property Image -->
      <?php if (!($property->avatar_directory === NULL)) {
        $directory = substr($property->avatar_url, 5);
      // echo '<img style="max-width:100%" src="/monish/dash/img/' . $directory . '" />';
      } ?>

      <div class="panel panel-primary panel-property">

        <!-- Default panel contents -->
        <div class="panel-heading">
          <div class="property-image" style='background:url(
            <?php
            echo "/monish/dash/img/" . $directory . ") center center"; ?>;background-size:cover'; >
<?php
        //echo $property->address;
echo $this->Html->link('<h3 class="panel-title text-center">' . $property->address . '</h3>', ['controller'=>'properties', 'action' => 'view', $property->id], ['escape'=>false] );
          // echo $this->Html->url(['controller'=>'properties','action'=>'view'], true);
?>
</div>

</div>

<!-- Table -->
<table cellpadding="0" cellspacing="0" class="">
  <thead>
    <tr>
      <th>Room</th>
      <th colspan="2">Tenant</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($property->rooms as $rooms): ?>
    <?php if($rooms->room_archived === 'NO') : ?>
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
              
              $gravatarImage = '<img height="80px" width="80px" class="img gravatar" src="' . $gravatarQuery . '"/>';
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

        </tr>
      <?php endif ?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>
<?php endif ?>
<?php endforeach; ?>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >>
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
  </div>
  <div class="modal-body">

  </div>
  <div class="modal-footer">


    <button type="button" href="http://localhost/monish/dash/properties/add" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>
</div>
</div>