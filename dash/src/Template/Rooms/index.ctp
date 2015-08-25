<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb('Rooms', '/rooms');
?>    
<h1>Rooms</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>

        </ul>

    </div>

<!--     <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><a href="#">Imagine</a></li>
            <li role="presentation"><a href="#">Secondary</a></li>
            <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

    </div> -->

</div>

<!-- Panel -->
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">All Rooms</h2>
    </div>


  <!-- Table -->
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('room_name') ?></th>
                    <th><?= $this->Paginator->sort('property_id') ?></th>
                    <th><?= $this->Paginator->sort('Vacant') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td>

                            <?= h($room->room_name) ?>
                            <?= $this->Html->link("", ['action' => 'view', $room->id]) ?>

                        </td>
                        <td>
                            <?= $room->property->address ?>
                        </td>
                        <td><?= h($room->vacant) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $room->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<paginator>
    <?php echo $this->element('paginator'); ?>
</paginator>


  <script>
    $("table").on("click", "tr", function(e) {
        if ($(e.target).is("a,input")) // anything else you don't want to trigger the click
            return;
        location.href = $(this).find("a").attr("href");
    });
</script>