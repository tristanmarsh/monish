<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb('Rooms');
    $this->Html->addCrumb('Add Room', array('controller' => 'rooms', 'action' => 'add'));

?>    


<h1>Rooms</h1>

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

    <div class="button-group">
    <?= $this->Html->link(
      '<i class="fa fa-plus"></i> New Room',
      ['action' => 'add'],
      ['class' => 'button button-pill-override button-pill-override button-action active', 'escape' => false]
    ); ?>
    </div>                

  </div>

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
    <?= $this->Form->button('<i class="fa fa-plus"></i> Create Room', ['class' => 'form-control button button-action button-3d']) ?>

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