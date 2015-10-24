<?php
    $this->Html->addCrumb('Profile', array('controller' => 'People', 'action' => 'index'));
    $this->Html->addCrumb('Edit Phone Number');

?>

<!-- File: src/Template/People/edit.ctp -->

<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<?php if ($currentlogged['role'] === "admin") : ?>

    <h1>Profile</h1>
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

    <h1>Profile</h1>

        <div class="panel panel-default panel-actionbar clearfix">

      <div class="panel-body">

          <?= $this->Html->link(
          '<i class="fa fa-eye"></i> View',
          ['action' => 'index'],
          ['class' => 'button button-pill button-primary', 'escape' => false]
          ); ?>

      </div>

      <div class="panel-footer">

        <?= $this->Html->link(
      '<i class="fa fa-phone"></i> Edit Phone Number',
      ['action' => 'edit',$user->id ],
      ['class' => 'button button-pill button-primary active', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Edit Username',
       ['controller' => 'users', 'action' => 'editusername', $currentlogged['id']],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Edit Password',
      ['controller' => 'users', 'action' => 'editpassword', $currentlogged['id']],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      </div>

    </div>
    


        <div class="panel panel-default">
      <div class="panel-body">  
    <?php

    echo $this->Form->create($user,array('class' => 'form-group'));
    echo $this->Form->input( 'phone', array( 'type' => 'number', 'class' => 'form-control' ) );
    echo $this->Form->button(__('<i class="fa fa-pencil"></i> Update Username'), ['class' => 'form-control button button-action button-3d']);
    echo $this->Form->end();
    echo $this->Form->create(null, [
        'url' => ['controller' => 'People', 'action' => 'index']
    ]);
    // echo $this->Form->button(__('Cancel'));

    ?>
    </div>
</div>

<?php endif; ?>

