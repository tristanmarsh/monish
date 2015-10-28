<?php
$this->Html->addCrumb('Properties', '/properties');
$this->Html->addCrumb('Add Property', array('controller' => 'properties', 'action' => 'add'));
?>    

<h1>New Property</h1>

<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <div class="button-group">
      <?= $this->Html->link(
      '<i class="fa fa-flash"></i> Current',
      ['action' => 'index'],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-archive"></i> Archived',
      ['action' => 'archived'],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>
    </div>
    
    <div class="button-group">
      <?= $this->Html->link(
      '<i class="fa fa-plus"></i> New Property',
      ['action' => 'add'],
      ['class' => 'button button-pill-override button-action active', 'escape' => false]
      ); ?>
    </div>

  </div>

</div>


<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">New Property</h2>
  </div>

  <div class="panel-body">
    <div class="properties form large-10 medium-9 columns">
      <?= $this->Form->create($entity, array('type'=>'file', 'class' => 'form-group')); ?>
      
      <fieldset class="input-group">
        <!-- <legend><?= __('New Property', array('type'=>'file', 'class' => 'form-control')) ?></legend> -->
        <?php
        echo $this->Form->input('address', array('class' => 'form-control'));
        echo $this->Form->input('avatar', ['type' => 'file', 'label' => 'Picture (Optional)']);
        ?>
        <br>
      </fieldset>
      
      <br>

      <?= $this->Form->button('<i class="fa fa-plus"></i> Create Property', ['class' => 'form-control button button-action button-3d']) ?>

      <?= $this->Form->end() ?>
      <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
      ])?>
    </div>
  </div>
</div>