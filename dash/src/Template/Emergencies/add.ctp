<?php
    $this->Html->addCrumb('Emergency Contacts', array('controller' => 'Emergencies', 'action' => 'index'));
    $this->Html->addCrumb('Add New Contact', array('controller' => 'Emergencies', 'action' => 'add'));

?>



<h1>Emergency Contacts</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <li role="presentation" ><?= $this->Html->link('All', ['action' => 'index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
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

<div class="emergencies form large-10 medium-9 columns">
    <?= $this->Form->create($emergency, array('class' => 'form-group')); ?>
    <fieldset>
        <legend><?= __('New Emergency', array('class' => 'form-control')) ?></legend>
        <?php
            echo $this->Form->input('first_name', array('class' => 'form-control'));
            echo $this->Form->input('last_name', array('class' => 'form-control'));
            echo $this->Form->input('phone', array('class' => 'form-control'));
            echo $this->Form->input('email', array('class' => 'form-control'));
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-info']) ?>
    <?= $this->Form->end() ?>
	<?= $this->Form->create(null, [
        'url' => ['controller' => 'Emergencies', 'action' => 'index']
    ])?>
<!--     <?= $this->Form->button(__('Cancel')) ?> -->
</div>
</div>
</div>