<?php
    $this->Html->addCrumb('Properties', '/properties');
?>    
<h1>Properties</h1>

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
    
<div class="clearfix">
<div class="row">

<?php foreach ($properties as $property): ?>

<div class="clearing col-xs-12 col-sm-6 col-md-4 col-lg-3">  

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"> 
            <h2 class="panel-title text-center">
                <?php
                    echo $property->address;
                ?>
            </h2>
        </div>

        <!-- Table -->
        <table cellpadding="0" cellspacing="0" class="">
            <thead>
            <tr>
                <th>Room</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($property->rooms as $rooms): ?>
                <tr>
                    
                    <td><?= $rooms->room_name ?>
                    <?= $this->Html->link("", ['action' => 'view', $property->id]) ?>
                </td>
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
</div>

<?php endforeach; ?>

</div>
</div>

  <script>
    $("table").on("click", "tr", function(e) {
        if ($(e.target).is("a,input,th")) // anything else you don't want to trigger the click
            return;
        location.href = $(this).find("a").attr("href");
    });
</script>

