<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb($entity->address);
?>

<h1><?= $entity->address; ?></h1>

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

            <li role="presentation"><?= $this->Html->link('View',
                ['controller'=>'properties', 'action' => 'view', $entity->id],
                ['class'=>'active'] ); ?>
            </li>

            <li role="presentation"  class="active"><?= $this->Html->link('Edit',
                ['controller'=>'properties', 'action' => 'edit', $entity->id] ); ?>
            </li>

            <li role="presentation"><?= $this->Html->link('New Room',
                ['controller'=>'rooms', 'action' => 'add', $entity->id] ); ?>
            </li>

            <li role="presentation"><?= $this->Form->postLink('Delete',
                ['controller'=>'properties', 'action' => 'delete', $entity->id],
                ['confirm' => 'Are you sure?', "escape" => false]); ?>
            </li>

        </ul>

    </div>

</div>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title">Edit <?= $entity->address ?></h2>
  </div>  

  <div class="panel-body">
 
    <div class="rooms form large-10 medium-9 columns">
        <?= $this->Form->create($entity, array('type' => 'file')); ?>
        <fieldset>
            <!-- <legend><?= __('Edit Room', array('class' => 'form-control')) ?></legend> -->
            <?php
            echo $this->Form->input('address', array('class' => 'form-control'));
            echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Picture (Optional)']);
        ?>
            <br>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-primary']) ?>
        <?= $this->Form->end() ?>
        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Properties', 'action' => 'index']
            ])?>
            <!--     <?= $this->Form->button(__('Cancel'), ['class' => 'form-control btn btn-fail']) ?>  -->
        </div>
    </div>
</div>




<!-- 
<div class="properties form large-10 medium-9 columns">
    <?= $this->Form->create($entity, array('type' => 'file')); ?>
    <fieldset>
        <legend><?= __('Edit Property') ?></legend>
        <?php
            echo $this->Form->input('address');
			echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Picture (Optional)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>
 -->