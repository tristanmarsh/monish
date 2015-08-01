    

<h1>Properties</h1>
<?= $this->Html->link(__('Add New Property'), ['action' => 'add']) ?><br>

<?php foreach ($properties as $property): ?>

    <br>
    <?php

    echo $property->address;


    ?>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($property->rooms as $rooms): ?>
                <tr>
                    <td><?= $rooms->room_name ?></td>
                    <td>
                        <?php
                        $room = $roomlease->get($rooms->id, ['contain'=>'Leases']);

                        $test = "";
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
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php endforeach; ?>