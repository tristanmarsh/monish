<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb($entity->address);
?>

<h1><?= $entity->address; ?></h1>

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

  <div class="button-group">

    <?php if ($entity->archived === "NO") {
      $current='active';
      $archived='';
    } else if($entity->archived === "YES"){
      $current='';
      $archived='active';
    } ?>

    <?= $this->Html->link(
    '<i class="fa fa-flash"></i> Current',
    ['action' => 'index'],
    ['class' => 'button button-pill button-primary ' . $current, 'escape' => false]
    ); ?>

    <?= $this->Html->link(
    '<i class="fa fa-archive"></i> Archived',
    ['action' => 'archived'],
    ['class' => 'button button-pill button-primary ' . $archived, 'escape' => false]
    ); ?>

  </div>
  
  <div class="button-group">
    <?= $this->Html->link(
    '<i class="fa fa-plus"></i> New Property',
    ['action' => 'add'],
    ['class' => 'button button-pill button-pill-override button-action', 'escape' => false]
    ); ?>
  </div>                
    
  </div>

  <div class="panel-footer">

  <div class="button-group">
    <?= $this->Html->link(
    '<i class="fa fa-eye"></i> View',
    ['action' => 'view', $entity->id],
    ['class' => 'button button-pill button-primary', 'escape' => false]
    ); ?>

    <?= $this->Html->link(
    '<i class="fa fa-pencil"></i> Edit',
    ['action' => 'edit', $entity->id],
    ['class' => 'button button-pill button-action active', 'escape' => false]
    ); ?>
  </div>

  <div class="button-group">
  <?php
   if ($entity->archived === "NO") {
     echo $this->Form->postLink(
    '<i class="fa fa-archive"></i> Archive Property',
    ['action' => 'archiveproperty',$entity->id],
    ['confirm' => 'Archive ' . $entity->address .'?' , "escape" => false,
      'class' => 'button button-pill-override button-caution',
      'escape' => false
    ]);

     } else {
      echo $this->Form->postLink(
      '<i class="fa fa-archive"></i> Unarchive Property',
      ['action' => 'unarchiveproperty',$entity->id],
      ['confirm' => 'Unarchive ' . $entity->address .'?' , "escape" => false,
        'class' => 'button button-pill-override button-caution',
        'escape' => false
      ]);

    } ?>
  </div>

  </div>

</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title">
        Edit <?= $entity->address ?></h2>
  </div>  

  <div class="panel-body">

    <?= $this->Form->create($entity, array('type' => 'file')); ?>

    <fieldset>
    <!-- <legend><?= __('Edit Room', array('class' => 'form-control')) ?></legend> -->
    <?php
        echo $this->Form->input('address', array('class' => 'form-control'));
        
        echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Picture (Optional)']);
    ?>
    </fieldset>

    <br>

    <?= $this->Form->button('<i class="fa fa-pencil"></i> Update Property', ['class' => 'form-control button button-action button-3d']); ?>
    
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
        ])?>

    </div>

</div>
