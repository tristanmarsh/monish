<table>
<?php foreach ($allrooms as $rooms): ?>
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
                                    echo "TRUE";
                                    $sentinel = false;
                                }
                                if ($sentinel) { //THIS CHECK MAKES THE TABLE ALIGNMENT WEIRD I HAVE NO IDEA WHY, But it is the only way for the code to correctly check room status
                                    $toArray = explode("||", $test);
                                    if (max($toArray) > date("Y-m-d")) {
                                        echo "FALSE";
                                    } else if (max($toArray) === date("Y-m-d")) {
                                        echo "FALSE";
                                    } else if (max($toArray) < date("Y-m-d")) {
                                        echo "TRUE";
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?> 

<!--                 <table>
<?php foreach ($allrooms as $rooms): ?>
                    <tr>
                        <td><?= $rooms->room_name ?></td>
                        <td>
<?php 
                                $test = "";
                                $sentinel = true; //true if Never Been Leased
                                if (!empty($currentroom->leases)) {
                                    foreach ($currentroom->leases as $leastenddate) {
                                        $test = $test."||".$leastenddate->date_end->format('Y-m-d');
                                    }
                                }
                                else {
                                    echo "TRUE";
                                    $sentinel = false;
                                }
                                if ($sentinel) { //THIS CHECK MAKES THE TABLE ALIGNMENT WEIRD I HAVE NO IDEA WHY, But it is the only way for the code to correctly check room status
                                    $toArray = explode("||", $test);
                                    if (max($toArray) > date("Y-m-d")) {
                                        echo "FALSE";
                                    } else if (max($toArray) === date("Y-m-d")) {
                                        echo "FALSE";
                                    } else if (max($toArray) < date("Y-m-d")) {
                                        echo "TRUE";
                                    }
                                }

?>
 </td>
                    </tr>
                <?php endforeach; ?> -->

