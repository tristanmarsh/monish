<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb($property->address);
?>
<h1><?= $property->address; ?></h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation"><a href="/monish/dash/properties">All</a></li>
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

            <li role="presentation"><?= $this->Form->postLink('Delete',
                ['controller'=>'properties', 'action' => 'delete', $property->id],
                ['confirm' => 'Are you sure?', "escape" => false]); ?>
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
                            <th>Status</th>
                            <th style="text-align:center" width="68x">Edit</th>
                            <th style="text-align:center" width="68px">Delete</th>
                        </tr>
                    </thead>
                    <?php foreach ($property->rooms as $rooms): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'rooms', 'action' => 'view', $rooms->id]) ?>        
                            <?= h($rooms->room_name) ?>
                        </td>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'rooms', 'action' => 'view', $rooms->id]) ?>
                            <?php 
                                if ($rooms->vacant === 'FALSE') {
                                    echo "Occupied";
                                }
                                if ($rooms->vacant === 'TRUE') {
                                    echo "Vacant";
                                }
                            ?>
                        </td>
                        <td class="action action-edit">
                            <?php
                                echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller' => 'Rooms', 'action' => 'edit', $rooms->id], ['escape' => false]);
                            ?>
                        </td>
                        <td class="action action-remove">
                            <?php
                                echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', ['controller' => 'Rooms', 'action' => 'delete', $rooms->id], ['confirm' => 'Are you sure?', "escape" => false]);
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
