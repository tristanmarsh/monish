<?php
    $this->Html->addCrumb('Personal details', array('controller' => 'People', 'action' => 'index'));
    $this->Html->addCrumb('Edit Phone Number');

?>

<!-- File: src/Template/People/edit.ctp -->

<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<?php if ($currentlogged['role'] === "admin") : ?>

    <h1>Update Person</h1>
        <div class="panel panel-default">
      <div class="panel-body">  
    <?php

        echo $this->Form->create($user, array('class' => 'form-group'));
        echo $this->Form->input('first_name', array('class' => 'form-control'));
        echo $this->Form->input('last_name', array('class' => 'form-control'));
        echo $this->Form->input('gender', ['options' => ['M' => 'Male', 'F' => 'Female'], 'class' => 'form-control']);
        echo $this->Form->input('phone', array('class' => 'form-control'));
        echo $this->Form->input('email', array('class' => 'form-control'));
        echo $this->Form->button(__('Update Person'), ['class' => 'form-control btn btn-primary']);
        echo $this->Form->end();
        echo $this->Form->create(null, [
            'url' => ['controller' => 'People', 'action' => 'index']
            ]);
        // echo $this->Form->button(__('Cancel'));

    ?>
    </div>
</div>

<?php endif; ?>

<?php if ($currentlogged['role'] === "tenant") : ?>

    <h1>Edit Personal Details</h1>
        <div class="panel panel-default">
      <div class="panel-body">  
    <?php

    echo $this->Form->create($user,array('class' => 'form-group'));
    echo $this->Form->input( 'phone', array( 'type' => 'number', 'class' => 'form-control' ) );
    echo $this->Form->button(__('Update Details'), ['class' => 'form-control btn btn-primary']);
    echo $this->Form->end();
    echo $this->Form->create(null, [
        'url' => ['controller' => 'People', 'action' => 'index']
    ]);
    // echo $this->Form->button(__('Cancel'));

    ?>
    </div>
</div>

<?php endif; ?>

