<?php
    $this->Html->addCrumb('Personal details', array('controller' => 'people', 'action' => 'index'));
    $this->Html->addCrumb('Login Details');

?>


<!-- File: src/Template/Users/edit.ctp -->

<h1>Update User</h1>

<div class="panel panel-default">
    <div class="panel-body">
        <?php

            echo $this->Form->create($user, array('class' => 'form-group'));
            //echo $this->Form->input('person_id', ['options' => $people]);
            echo $this->Form->input('username', array('class' => 'form-control'));
            echo $this->Form->input('password', array('class' => 'form-control'));
            ?>
            <br>
            <?php
            //echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant']]);
            echo $this->Form->button(__('Update User'), ['class' => 'form-control btn btn-info']);
            echo $this->Form->end();
            echo $this->Form->create(null, [
                'url' => ['controller' => 'Users', 'action' => 'index']
                ]);
            // echo $this->Form->button(__('Cancel'));
        ?>
    </div>
</div>