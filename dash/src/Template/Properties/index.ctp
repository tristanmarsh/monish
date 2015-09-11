<?php
    $this->Html->addCrumb('Properties', '/properties');
?>    
<h1>Properties</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">

        <div class="col-sm-6">
            <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New Property', ['action' => 'add']) ?></li>
            <li role="presentation"><?= $this->Html->link('New Room', ['controller' => 'rooms', 'action' => 'add']) ?></li>
        </ul>
            
        </div>

        <div class="col-sm-6">

        <div class="input-group input-lg pull-right search">
          <input type="text" class="form-control" placeholder="Filter Results" id="myInputTextField">
          <div class="input-group-btn">
                    
                    <!-- Single button -->
                     <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>

                </div>
            </div>

        </div>

    </div>

<!--     <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><a href="#">Imagine</a></li>
            <li role="presentation"><a href="#">Secondary</a></li>
            <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

    </div> -->

</div>
    
<div class="clearfix">
<div class="row">





<?php foreach ($properties as $property): ?>

    <?php $variable ="hello" ?>

<div class="clearing col-xs-12 col-sm-6 col-md-4 col-lg-4">

        <!-- Retrieve Property Image -->
        <?php if (!($property->avatar_directory === NULL)) {
            $directory = substr($property->avatar_url, 5);
            // echo '<img style="max-width:100%" src="/monish/dash/img/' . $directory . '" />';
        } ?>

    <div class="panel panel-primary">
       
        <!-- Default panel contents -->
        <div class="panel-heading"style='height:300px; background:url(
        <?php
        echo "/monish/dash/img/" . $directory . ") center center"; ?>;background-size:cover' >
                <?php
                //echo $property->address;
                    echo $this->Html->link('<h3 class="panel-title text-center">' . $property->address . '</h3>', ['controller'=>'properties', 'action' => 'view', $property->id], ['escape'=>false] );
                    // echo $this->Html->url(['controller'=>'properties','action'=>'view'], true);
                ?>
        </div>

        <!-- Table -->
        <table cellpadding="0" cellspacing="0" class="">
            <thead>
            <tr>
                <th>Room</th>
                <th>Status</th>
                <th>Tenant</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($property->rooms as $rooms): ?>
                <tr>

                    <td><?= $rooms->room_name ?>
                        <?= $this->Html->link("", ['controller'=>'rooms', 'action' => 'view', $rooms->id]) ?>
                    </td>
                    <td>
                        <?php
                        $room = $roomlease->get($rooms->id, ['contain'=>'Leases']);

                        $test = "";
                        $testtwo = "";
                        $sentinel = true; //true if Never Been Leased
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
                    <td>
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
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

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

  <script>
    $("table").on("click", "tr", function(e) {
        if ($(e.target).is("a,input,th")) // anything else you don't want to trigger the click
            return;
        location.href = $(this).find("a").attr("href");
    });
</script>

