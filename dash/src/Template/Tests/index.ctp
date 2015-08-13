<h1>Tests</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
        </ul>

    </div>

    <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><a href="#">Imagine</a></li>
            <li role="presentation"><a href="#">Secondary</a></li>
            <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

    </div>

</div>

<?= $lastroomupdate->date->format('d/m/Y') ?>
<br><br>

<p>
This function adds the person, student, lease and user. 
<br>The user credentials are automatically generated:
<br>username: email entered
<br>password: email entered
</p>

<p><?= $this->Html->link('tenants', ['action' => 'tenants']); ?></p>

<p id="demo"></p>

<script>
    document.getElementById("demo").innerHTML = Date();
</script>

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
                                        echo "Lease Expired";
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

<?php
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
?>

<?php foreach ($query as $lease): ?>

    <br>
    <?php
        echo $lease->date_end->format('Y-m-d');
        echo ",,".date("Y-m-d");
        if ($lease->date_end->format('Y-m-d') > date("Y-m-d"))
            echo "Ongoing";
        else if ($lease->date_end->format('Y-m-d') === date("Y-m-d"))
            echo "Expires Today";
        else
            echo "Expired";
    ?>

<?php endforeach; ?>
<br>------------------------------------------------
<?php foreach ($rooms as $room): ?>

    <br>
    <?php
    $test = "";
    if (!empty($room->leases)) {
        foreach ($room->leases as $leastenddate) {
            $test = $test."||".$leastenddate->date_end->format('Y-m-d');
        }
    }
    else {
        echo "Never Been Leased";
    }
    $toArray = explode("||",$test);
    if (max($toArray) > date("Y-m-d")){
        echo "Leased Until ".max($toArray);
    }
    else if (max($toArray) === date("Y-m-d")){
        echo "Lease Expires Today";
    }
    else if (max($toArray) < date("Y-m-d")){
        echo "Lease Expired";
    }
    ?>

<?php endforeach; ?>