<?php
    $this->Html->addCrumb('Rooms', '/rooms');
    $this->Html->addCrumb('Add Room', array('controller' => 'rooms', 'action' => 'add'));
?>    


<h1>Rooms</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('New Room', ['action' => 'add']) ?></li>
        </ul>


      </div>

<!--       <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
          <li role="presentation" class="active"><a href="#">Imagine</a></li>
          <li role="presentation"><a href="#">Alternative</a></li>
          <li role="presentation"><a href="#">Secondary</a></li>
          <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

      </div> -->
    </div>

    <div class="panel panel-default">
      <div class="panel-body">
<div class="rooms form large-10 medium-9 columns">
    <?= $this->Form->create($room, array('class' => 'form-group')); ?>
    <fieldset>
        <legend><?= __('Add Room', array('class' => 'form-control')) ?></legend>
        <?php
            echo $this->Form->input('room_name', array('class' => 'form-control'));
            echo $this->Form->input('property_id', ['options' => $properties,'class' => 'form-control']);
            //echo $this->Form->input('vacant', [
            //    'options' => ['TRUE' => 'Yes', 'FALSE' => 'No'], 'class' => 'form-control'
            //]);
        ?>
        <br>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-success']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Rooms', 'action' => 'index']
    ])?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel'), ['class' => 'form-control btn btn-fail']) ?>
</div>
</div>
</div>