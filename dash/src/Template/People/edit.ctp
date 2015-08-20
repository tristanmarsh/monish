<?php
    $this->Html->addCrumb('Personal details', array('controller' => 'People', 'action' => 'index'));
    $this->Html->addCrumb('Edit Phone Number');

?>

<!-- File: src/Template/People/edit.ctp -->

<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<?php if ($currentlogged['role'] === "admin") : ?>

    <h1>Update Person</h1>
    <?php

        echo $this->Form->create($user);
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('gender', ['options' => ['M' => 'Male', 'F' => 'Female']]);
        echo $this->Form->input('phone');
        echo $this->Form->input('email');
        echo $this->Form->button(__('Update Person'));
        echo $this->Form->end();
        echo $this->Form->create(null, [
            'url' => ['controller' => 'People', 'action' => 'index']
            ]);
        echo $this->Form->button(__('Cancel'));

    ?>

<?php endif; ?>

<?php if ($currentlogged['role'] === "tenant") : ?>

    <h1>Edit Personal Details</h1>
    <?php

    echo $this->Form->create($user);
    echo $this->Form->input( 'phone', array( 'type' => 'number' ) );
    echo $this->Form->button(__('Update Details'));
    echo $this->Form->end();
    echo $this->Form->create(null, [
        'url' => ['controller' => 'People', 'action' => 'index']
    ]);
    echo $this->Form->button(__('Cancel'));

    ?>

<?php endif; ?>
