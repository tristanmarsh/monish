<?php
    $this->Html->addCrumb('Tenants', '/tenants');
    $this->Html->addCrumb('Emergencies');
    $this->Html->addCrumb('Edit');
?>
<h1>Emergency Contacts</h1>

<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Edit Emergency Contact',
      ['controller' => 'emergencies', 'action' => 'edit', $emergency->id],
      ['class' => 'button button-pill button-action active', 'escape' => false]
    ); ?>

  </div>


</div>


<div class="panel panel-primary">

    <div class="panel-heading">
        <h2 class="panel-title">Edit Emergency Contact</h2>
    </div>

    <div class="panel-body">
        <?= $this->Form->create($emergency, array('class' => 'form-group')); ?>
        <fieldset>

            <div class="row">

                <div class="col-md-6">
                  <?= $this->Form->input('first_name', array('class' => 'form-control')); ?>
                </div>

                <div class="col-md-6">
                  <?= $this->Form->input('last_name', array('class' => 'form-control')); ?>
                </div>

                <div class="col-md-6">
                  <?= $this->Form->input('phone', array('class' => 'form-control')); ?>
                </div>

                <div class="col-md-6">
                  <?= $this->Form->input('email', array('class' => 'form-control')); ?>
                </div>

            </div>

        </fieldset>
        <br>
    <?= $this->Form->button('<i class="fa fa-pencil"></i> Edit Emergency Contact', ['class' => 'form-control btn-primary button button-action button-3d', 'escape' => false]); ?>

        <?= $this->Form->end() ?>
    	<?= $this->Form->create(null, [
            'url' => ['controller' => 'Emergencies', 'action' => 'index']
        ])?>
    <!--     <a href="javascript: window.history.back()" class="button">Go Back</a> -->
    <!--     <?= $this->Form->button(__('Cancel')) ?> -->
    </div>
</div>



