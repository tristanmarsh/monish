<!-- File: src/Template/Users/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

<?php
    $this->Html->addCrumb('Users', '/users');
?>

<h1>Users</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['controller' => 'tenants', 'action' => 'add']) ?></li>
        </ul>

    </div>
</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h2 class="panel-title">All Users</h2>
</div>



<!--<?= $this->Html->link('Add User', ['action' => 'add']) ?>-->

<div class="table-responsive">
  <table>
    <tr>
      <th><?= $this->Paginator->sort('Username') ?></th>
      <th><?= $this->Paginator->sort('Role') ?></th>
      <th><?= $this->Paginator->sort('Created') ?></th>
      <th><?= $this->Paginator->sort('Modified') ?></th>
      <th class="actions"><?= __('Actions') ?></th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($users as $user): ?>
    <tr>
      <td>
        <?= $user->username ?>
      </td>
      <td>
        <?= $user->role ?>
      </td>
      <td>
        <?= $user->created//->format(DATE_RFC850) ?>
      </td>
      <td>
        <?= $user->modified//->format(DATE_RFC850) ?>
      </td>
      <td>
        <?php if ($user['role'] === 'admin') // Admin cannot delete themselves (well they can, but they have to type the url in.)
        {echo $this->Html->link('Edit', ['action' => 'edit', $user->id]);}
        else
        {
          echo $this->Form->postLink(
           'Delete',
           ['action' => 'delete', $user->id],
           ['confirm' => 'Are you sure?']);
          echo " "; // this puts a space between Delete and Edit button
          echo $this->Html->link('Edit', ['action' => 'edit', $user->id]);
        };
        ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
</div>