<?php
    $this->Html->addCrumb('Profile', array('controller' => 'People', 'action' => 'index'));
    $this->Html->addCrumb('Username');

?>
<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<!-- File: src/Template/Users/edit.ctp -->

<h1>Profile</h1>


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
      '<i class="fa fa-phone"></i> Change Phone Number',
      ['controller' => 'people','action' => 'edit', $user->person_id],
      ['class' => 'button button-pill button-action', 'escape' => false]
      ); ?>

      <?php endif; ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Change Username',
       ['controller' => 'users', 'action' => 'editusername', $currentlogged['id']],
      ['class' => 'button button-pill button-action active', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Change Password',
      ['controller' => 'users', 'action' => 'editpassword', $currentlogged['id']],
      ['class' => 'button button-pill button-action', 'escape' => false]
      ); ?>

      </div>

    </div>

<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">Change Username</h2>
  </div>

  <div class="panel-body">
      <?php

          echo $this->Form->create($user, array('class' => 'form-group'));
          //echo $this->Form->input('person_id', ['options' => $people]);
          echo $this->Form->input('username', array('class' => 'form-control'));
          // echo $this->Form->input('password', array('class' => 'form-control'));
          // echo $this->Form->input('confirm_password', array('class' => 'form-control', 'type'  =>  'password'));
          ?>
          <?php
          //echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant']]);
          echo $this->Form->button('<i class="fa fa-pencil"></i> Update Username', ['class' => 'form-control button button-action button-3d']);

          echo $this->Form->end();
          echo $this->Form->create(null, [
              'url' => ['controller' => 'Users', 'action' => 'index']
              ]);
          // echo $this->Form->button(__('Cancel'));
      ?>
  </div>
</div>