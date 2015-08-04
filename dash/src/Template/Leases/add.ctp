<?php
    $this->Html->addCrumb('Leases', '/leases');
    $this->Html->addCrumb('Add Lease', array('controller' => 'leases', 'action' => 'add'));
?>

<!--Loads the jQuery scripts used in this view-->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script>
        $(function() {
            $( "#dateStartPicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    <script>
        $(function() {
            $( "#dateEndPicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
</head>

<div class="leases form large-10 medium-9 columns">
    <?= $this->Form->create($lease); ?>
    <fieldset>
        <legend><?= __('Add Lease') ?></legend>
        <?php
            echo $this->Form->input('room_id', ['options' => $rooms]);
            echo $this->Form->input('student_id', ['options' => $students]);
            echo $this->Form->input('date_start',['id'=>'dateStartPicker', 'type'=>'text']);
            echo $this->Form->input('date_end',['id'=>'dateEndPicker', 'type'=>'text']);
            echo $this->Form->input('weekly_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Leases', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>

