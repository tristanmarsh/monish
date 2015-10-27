<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb('Rooms');
    $this->Html->addCrumb('Add Room', array('controller' => 'rooms', 'action' => 'add'));

?>    


<h1>Rooms</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills">
         <!--  <li role="presentation"><?= $this->Html->link('All', ['action' => 'index']) ?></li> -->
          <li role="presentation" class="active"><?= $this->Html->link('New Room', ['action' => 'add']) ?></li>
        </ul>


      </div>

<!--       <div class="panel-footer">

        <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="#">Imagine</a></li>
          <li role="presentation"><a href="#">Alternative</a></li>
          <li role="presentation"><a href="#">Secondary</a></li>
          <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

      </div> -->
    </div>


    <div class="panel panel-primary">

      <div class="panel-heading">
            <h2 class="panel-title">New Room</h2>

                      </div>
      <div class="panel-body">


    <?= $this->Form->create($room, array('class' => 'form-group')); ?>
    <fieldset>
      <div class="rooms form large-10 medium-9 columns">
        
        <?php
            echo $this->Form->input('room_name', array('class' => 'form-control'));
            ?>

            <div class="dropdown">
              <?=  $this->Form->input('property_id', ['options' => $properties, 'empty' => true, 'required' => true, 'class' => 'combobox form-control']); ?>
          </div>


    <?php

            //echo $this->Form->input('vacant', [
            //    'options' => ['TRUE' => 'Yes', 'FALSE' => 'No'], 'class' => 'form-control'
            //]);
        ?>
        <br>
    </fieldset>
    <?= $this->Form->button(__('Create Room'), ['class' => 'form-control btn btn-primary']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Rooms', 'action' => 'index']
    ])?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
    ])?>
<!--     <?= $this->Form->button(__('Cancel'), ['class' => 'form-control btn btn-fail']) ?> -->
</div>
</div>
</div>