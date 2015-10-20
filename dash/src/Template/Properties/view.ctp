<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb($property->address);
?>
<h1><?= $property->address; ?></h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation"><?= $this->Html->link('Current', ['action' => 'index']) ?></li>
            <li role="presentation"><?= $this->Html->link('Archived', ['action' => 'archived']) ?></li>
            <li role="presentation"><?= $this->Html->link('New Property', ['action' => 'add']) ?></li>
        </ul>

        <!-- <h2><?= $property->address ?></h2> -->

    </div>

    <div class="panel-footer">

        <ul class="nav nav-pills pull-left">

            <li role="presentation" class="active"><?= $this->Html->link('View',
                ['controller'=>'properties', 'action' => 'view', $property->id],
                ['class'=>'active'] ); ?>
            </li>

            <li role="presentation"><?= $this->Html->link('Edit',
                ['controller'=>'properties', 'action' => 'edit', $property->id] ); ?>
            </li>

            <li role="presentation"><?= $this->Html->link('New Room',
                ['controller'=>'rooms', 'action' => 'add', $property->id] ); ?>
            </li>

                        <!-- <li role="presentation"><?= $this->Form->postLink('Delete',
                ['controller'=>'properties', 'action' => 'delete', $property->id],
                ['confirm' => 'Are you sure?', "escape" => false]); ?>
            </li> -->

            <li role="presentation">

                <?php

                   if ($property->archived === "NO") {
                    echo $this->form->postLink('Archive Property', ['action' => 'archiveproperty', $property->id], array('class' => 'menu-item-link', 'escape' => false)); 
                   }
                   else {
                    echo $this->form->postLink('Unarchive Property', ['action' => 'unarchiveproperty', $property->id], array('class' => 'menu-item-link', 'escape' => false));
                   }

                ?>

            </li>

        </ul>

    </div>

</div>

<div class="row">

    <div class="col-lg-6">
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

    <div class="col-lg-6">
        
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h2 class="panel-title">Related Rooms</h2>
            </div>

            <div class="table-responsive">
                <?php if (!empty($property->rooms)): ?>
                    <table class="datatable">
                        <thead>
                        <tr>
                            <th>Room Name</th>
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
                                    <?php
                                    $emailHash = md5( strtolower( trim( $personEntity->email ) ) );
                                    // $defaultImage = urlencode('http://localhost/monish/dash/img/default-profile.jpg');
                                    $gravatarQuery = 'http://www.gravatar.com/avatar/' . $emailHash . '?d=mm';
                                    $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';
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
                                    if ($rooms->archived === 'NO') {
                                        echo "No";
                                    }
                                    if ($rooms->archived === 'YES') {
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
