<h1>This is for testing purposes only</h1>

<?= $this->Html->link('Add New Tenant', ['action' => 'add']); ?> 
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