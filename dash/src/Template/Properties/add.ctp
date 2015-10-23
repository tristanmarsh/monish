<?php
$this->Html->addCrumb('Properties', '/properties');
$this->Html->addCrumb('Add Property', array('controller' => 'properties', 'action' => 'add'));
?>    

<h1>New Property</h1>

<div class="panel panel-default clearfix">

  <div class="panel-body">

    <ul class="nav nav-pills pull-left">
      <li role="presentation"><?= $this->Html->link('Current', ['action' => 'index']) ?></li>
      <li role="presentation"><?= $this->Html->link('Archived', ['action' => 'archived']) ?></li>
      <li role="presentation"  class="active"><?= $this->Html->link('New Property', ['action' => 'add']) ?></li>
      <!-- <li role="presentation"><?= $this->Html->link('New Room', ['controller' => 'rooms', 'action' => 'add']) ?></li> -->
    </ul>

  </div>

</div>

<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">New Property</h2>
  </div>

  <div class="panel-body">
    <div class="properties form large-10 medium-9 columns">
      <?= $this->Form->create($entity, array('type'=>'file', 'class' => 'form-group')); ?>
      <fieldset>
        <!-- <legend><?= __('New Property', array('type'=>'file', 'class' => 'form-control')) ?></legend> -->
        <?php
        echo $this->Form->input('address', array('class' => 'form-control'));
        echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Picture (Optional)']);
        ?>
        <br>
      </fieldset>
      <?= $this->Form->button(__('Create Property'), ['class' => 'form-control btn btn-primary']) ?>
      <?= $this->Form->end() ?>
      <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
      ])?>
    </div>
  </div>
</div>