<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb('Add Property', array('controller' => 'properties', 'action' => 'add'));
?>    

<h1>Leases</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
        </ul>


      </div>

      <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
          <li role="presentation" class="active"><a href="#">Imagine</a></li>
          <li role="presentation"><a href="#">Alternative</a></li>
          <li role="presentation"><a href="#">Secondary</a></li>
          <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-body">
<div class="properties form large-10 medium-9 columns">
    <?= $this->Form->create($property, array('class' => 'form-group')); ?>
    <fieldset>
        <legend><?= __('Add Property', array('class' => 'form-control')) ?></legend>
        <?php
            echo $this->Form->input('address', array('class' => 'form-control'));
            echo $this->Form->input('number_rooms', array('class' => 'form-control'));
            echo $this->Form->input('bathrooms', ['options' => ['0' => 'None', '1', '2', '3', '4'], 'class' => 'form-control'
            ]);
            echo $this->Form->input('kitchens', [
                'options' => ['0' => 'None', '1', '2'], 'class' => 'form-control'
            ]);
            echo $this->Form->input('storeys', [
                'options' => ['1', '2', '3'], 'class' => 'form-control'
            ]);
            echo $this->Form->input('garage', [
                'options' => ['TRUE' => 'Yes', 'FALSE' => 'No'], 'class' => 'form-control'
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-success']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Properties', 'action' => 'index']
    ])?>
<!--     <?= $this->Form->button(__('Cancel')) ?> -->
</div>
</div>
</div>