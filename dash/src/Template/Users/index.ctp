<!-- File: src/Template/Users/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>
<h1>Manage Users</h1>
<?= $this->Html->link('Add User', ['action' => 'add']) ?>
<span style="float:right"><?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
<table>
    <tr>
        <th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Username</th>
        <th>Role</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($users as $user): ?>
        <tr>
			<td>
                <?= $user->first_name ?>
            </td>
			<td>
                <?= $user->last_name ?>
            </td>
			<td>
                <?= $user->gender ?>
            </td>
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
					echo $this->Html->link('View', ['action' => 'view', $user->id]); 
					echo " "; // this puts a space between Delete and View button
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

<p>
    <?php
        echo "Back to ";
        echo $this->Html->link('Dashboard', ['controller' => 'dashboards', 'action' => 'index']);
    ?>
</p>
