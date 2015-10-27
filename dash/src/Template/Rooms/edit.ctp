<?php
$this->Html->addCrumb('Properties', '/properties');
$this->Html->addCrumb($room->property['address'],['controller'=>'properties', 'action' => 'view',$room->property['id']]);
$this->Html->addCrumb($room->room_name);
?> 
<h1>Edit <?= $room->room_name; ?></h1>

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

    <div class="button-group">
    <?= $this->Html->link(
      '<i class="fa fa-plus"></i> New Room',
      ['action' => 'add'],
      ['class' => 'button button-pill-override button-pill-override button-action', 'escape' => false]
    ); ?>
    </div>                

  </div>

  <div class="panel-footer">

    <div class="button-group">
      <?= $this->Html->link(
      '<i class="fa fa-eye"></i> View',
      ['action' => 'view', $room->id],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Edit',
      ['action' => 'edit', $room->id],
      ['class' => 'button button-pill button-action active', 'escape' => false]
      ); ?>
    </div>

    <div class="button-group">
    <?php
      if ($room->room_archived === "NO") {
       echo $this->Form->postLink(
      '<i class="fa fa-archive"></i> Archive Room',
      ['action' => 'archiveroom',$room->id],
      ['confirm' => 'Archive ' . $room->room_name .' of ' . $room->property["address"] . '?' , "escape" => false,
        'class' => 'button button-pill-override button-caution',
        'escape' => false
      ]);

       } else {
        echo $this->Form->postLink(
        '<i class="fa fa-archive"></i> Unarchive Room',
        ['action' => 'unarchiveroom',$room->id],
        ['confirm' => 'Unarchive ' . $room->room_name .' of ' . $room->property["address"] . '?' , "escape" => false,
        'class' => 'button button-pill-override button-caution',
        'escape' => false
        ]);

      } ?>
    </div>

  </div>

</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title">Edit <?= $room->room_name?></h2>
  </div>  

  <div class="panel-body">
 
    <div class="rooms form large-10 medium-9 columns">
        <?= $this->Form->create($room, array('class' => 'form-group')); ?>
        <fieldset>
            <!-- <legend><?= __('Edit Room', array('class' => 'form-control')) ?></legend> -->
            <?php
            echo $this->Form->input('room_name', array('class' => 'form-control'));
            echo $this->Form->input('property_id', ['options' => $properties,'class' => 'form-control']);
            //echo $this->Form->input('vacant', [
            //    'options' => ['TRUE' => 'Yes', 'FALSE' => 'No'], 'class' => 'form-control'
            //]);
            ?>
            <br>
        </fieldset>
    <?= $this->Form->button('<i class="fa fa-pencil"></i> Update Room', ['class' => 'form-control button button-action button-3d']); ?>
        
        <?= $this->Form->end() ?>
        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Properties', 'action' => 'index']
            ])?>
            <!--     <?= $this->Form->button(__('Cancel'), ['class' => 'form-control btn btn-fail']) ?>  -->
        </div>
    </div>
</div>
