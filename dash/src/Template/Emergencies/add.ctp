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

        <ul class="nav nav-pills">
          <li role="presentation" ><?= $this->Html->link('All', ['action' => 'index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('New Emergency Contact', ['action' => 'add']) ?></li>
        </ul>


      </div>

    </div>

    <div class="panel panel-primary">

          <div class="panel-heading">
            <h2 class="panel-title">New Emergency Contact</h2>

                      </div>
      <div class="panel-body">

    <?= $this->Form->create($emergency, array('class' => 'form-group')); ?>
    <fieldset>
        <div class="col-md-6">
        <?php
            echo $this->Form->input('first_name', array('class' => 'form-control'));
            echo $this->Form->input('last_name', array('class' => 'form-control'));
            ?>
        </div>
        <div class="col-md-6">
        <?php
            echo $this->Form->input('phone', array('class' => 'form-control'));
            echo $this->Form->input('email', array('class' => 'form-control'));
        ?>
      </div>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-primary']) ?>
    <?= $this->Form->end() ?>
	<?= $this->Form->create(null, [
        'url' => ['controller' => 'Emergencies', 'action' => 'index']
    ])?>
<!--     <?= $this->Form->button(__('Cancel')) ?> -->
</div>
</div>