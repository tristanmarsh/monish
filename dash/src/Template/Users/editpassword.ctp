<?php
    $this->Html->addCrumb('Profile', array('controller' => 'People', 'action' => 'index'));
    $this->Html->addCrumb('Password');

?>
<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<!-- File: src/Template/Users/edit.ctp -->

<h1>Update User</h1>


   <div class="panel panel-default panel-actionbar clearfix">

      <div class="panel-body">

          <?= $this->Html->link(
          '<i class="fa fa-eye"></i> View',
          ['controller' => 'people','action' => 'index'],
          ['class' => 'button button-pill button-primary', 'escape' => false]
          ); ?>

      </div>

      <div class="panel-footer">
  <?php if ($currentlogged['role'] === "tenant") : ?>
        <?= $this->Html->link(
      '<i class="fa fa-phone"></i> Edit Phone Number',
      ['controller' => 'people','action' => 'edit',$user->id],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>
      <?php endif; ?>
      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Edit Username',
       ['controller' => 'users', 'action' => 'editusername', $currentlogged['id']],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Edit Password',
      ['controller' => 'users', 'action' => 'editpassword', $currentlogged['id']],
      ['class' => 'button button-pill button-primary active', 'escape' => false]
      ); ?>

      </div>

    </div>

<div class="panel panel-default">
    <div class="panel-body">
        <?php

            echo $this->Form->create($user, array('class' => 'form-group'));
            //echo $this->Form->input('person_id', ['options' => $people]);
            // echo $this->Form->input('username', array('class' => 'form-control'));
            echo $this->Form->input('password', array('value'=>'', 'class' => 'form-control','autocomplete' => 'off'));
            echo $this->Form->input('confirm_password', array('class' => 'form-control', 'type'  =>  'password'));
            ?>
            <br>
            <?php
            //echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant']]);
            echo $this->Form->button(__('Update User'), ['class' => 'form-control btn btn-primary']);
            echo $this->Form->end();
            echo $this->Form->create(null, [
                'url' => ['controller' => 'Users', 'action' => 'index']
                ]);
            // echo $this->Form->button(__('Cancel'));
        ?>
    </div>
</div>