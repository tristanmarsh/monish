<?php
    $this->Html->addCrumb('Tenants', '/tenants');
    $this->Html->addCrumb('Emergencies');
    $this->Html->addCrumb('Edit');
?>
<h1>Emergency Contacts</h1>

    <div class="panel panel-default">
      <div class="panel-body">   
<div class="emergencies form large-10 medium-9 columns">
    <?= $this->Form->create($emergency, array('class' => 'form-group')); ?>
    <fieldset>
        <legend><?= __('Edit Emergency', array('class' => 'form-control')) ?></legend>
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
<!--     <a href="javascript: window.history.back()" class="button">Go Back</a> -->
<!--     <?= $this->Form->button(__('Cancel')) ?> -->
</div>
</div>
</div>

