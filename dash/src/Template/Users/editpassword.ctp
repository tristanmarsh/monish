<?php
    $this->Html->addCrumb('Profile', array('controller' => 'People', 'action' => 'index'));
    $this->Html->addCrumb('Password');

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
      '<i class="fa fa-phone"></i> Edit Phone Number',
      ['controller' => 'people','action' => 'edit',$user->person_id],
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
            echo $this->Form->input('password', array('value'=>'', 'class' => 'form-control','autocomplete' => 'off'));
            echo $this->Form->input('confirm_password', array('class' => 'form-control', 'type'  =>  'password'));
            ?>
            <?php
            echo $this->Form->button('<i class="fa fa-pencil"></i> Update Password', ['class' => 'form-control button button-action button-3d']);
            echo $this->Form->end();
            echo $this->Form->create(null, [
                'url' => ['controller' => 'Users', 'action' => 'index']
                ]);
            // echo $this->Form->button(__('Cancel'));
        ?>
    </div>
</div>