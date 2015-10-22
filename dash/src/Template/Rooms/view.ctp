<?php
$this->Html->addCrumb('Properties', '/properties');
$this->Html->addCrumb($room->property['address'],['controller'=>'properties', 'action' => 'view', $room->property['id']]);
$this->Html->addCrumb($room->room_name);
?>   
<h1><?= $room->room_name; ?></h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
    </div> -->

    <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <!-- <li role="presentation"><?= $this->Html->link('All', ['action' => 'index']) ?></li> -->
          <!-- <li role="presentation"><?= $this->Html->link('Edit', ['action' => 'edit', $room->id]) ?></li> -->
          <!-- <li role="presentation" class="active"><?= $this->Html->link('View', ['action' => 'view', $room->id]) ?></li> -->
          <li role="presentation"><?= $this->Html->link('New Room', ['action' => 'add']) ?></li>
      </ul>

  </div>


  <div class="panel-footer">

    <ul class="nav nav-pills pull-left">
        <li role="presentation" class="active"><?= $this->Html->link('View', ['action' => 'view', $room->id]) ?></li>
        <li role="presentation"><?= $this->Html->link('Edit', ['action' => 'edit', $room->id]) ?></li>
        <li role="presentation">
            <?php

            if ($room->room_archived === "NO") {
                echo $this->Form->postLink('Archive Room', ['action' => 'archiveroom', $room->id], array('class' => 'menu-item-link', 'escape' => false)); 
            }
            else {
                echo $this->Form->postLink('Unarchive Room', ['action' => 'unarchiveroom', $room->id], array('class' => 'menu-item-link', 'escape' => false));
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
                <h2 class="panel-title">Room Details</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th><?= h($room->room_name) ?></th>
                    </tr>
                </thead>
                <tr>
                    <td>
                        Current Tenant: 
                        <?php
                        $test = "";
                        $testtwo = "";
                                $sentinel = true; //true if Never Been Leased
                                if (!empty($room->leases)) {
                                    foreach ($room->leases as $leastenddate) {
                                        $test = $test."||".$leastenddate->date_end->format('Y-m-d');
                                    }
                                }
                                else {
                                    echo "Nobody";
                                    $sentinel = false;
                                }
                                if ($sentinel) { 
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
                                        echo "Nobody ";
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= h($room->property['address']) ?></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if ($room->vacant === "FALSE"){
                                    echo "Not Vacant";
                                }
                                else {
                                    echo "Vacant";
                                }
                                ?>
                            </td>
                        </tr>

                    </table>        

                </div>

            </div>

            <div class="col-lg-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">Related Leases</h2>
                    </div>

                    <?php if (!empty($room->leases)): ?>
                    <div class="table-responsive">
                        <table class="datatable">
                            <thead>
                                <tr>
                                    <th>Tenant</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>'Weekly Price</th>
                                    <!-- <th class="actions"><?= __('Actions') ?></th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($room->leases as $leases): ?>


                                    <tr>
                                        <td>
                                            <?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $leases->id]) ?>
                                            <?php
                                            $currentLease = $leasesTable->get($leases->id, ['contain'=>'students']);
                                            $currentStudent = $studentsTable->get($currentLease->student_id, ['contain'=>'people']);
                                            echo $currentStudent->People['first_name']." ";
                                            echo $currentStudent->People['last_name'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $leases->id]) ?>
                                            <?= h($leases->date_start->format('Y/m/d')) ?></td>
                                        <td>
                                            <?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $leases->id]) ?>
                                            <?= h($leases->date_end->format('Y/m/d')) ?></td>
                                        <td>
                                            <?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $leases->id]) ?>
                                            <?= h($this->Number->currency($leases->weekly_price)) ?></td>

                                    <!--     <td class="action action-remove" >
                                          <?php echo $this->form->postlink('<span class="glyphicon glyphicon-remove"></span>', ['controller' => 'Leases', 'action' => 'delete', $leases->id], ['confirm' => 'Delete ' . '?' , "escape" => false]); ?>
                                        </span></td> -->
                                    </tr>


                            <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>
            <?php endif; ?>

        </div>

    </div>   

</div>

