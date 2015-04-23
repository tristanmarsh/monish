<!-- File: src/Template/Articles/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>
<h1>List of Maintenance Requests</h1>
<?= $this->Html->link('Add Maintenance Request', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($elephant as $article): ?>
    <tr>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
			<?php 
				if ($article->user_id === $user['id'] OR $user['role'] === 'admin') // If the user owns it, or they are admin, they can see the actions
				{
					echo $this->Form->postLink(
					'Delete',
					['action' => 'delete', $article->id],
					['confirm' => 'Are you sure?']);
					echo " "; // this puts a space between Delete and Edit button
					echo $this->Html->link('Edit', ['action' => 'edit', $article->id]);
				};
			?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p>Click here to <?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?>!</p>

<p>

<?php 
	
	if($user['role'] === 'admin') {
		echo "Only Admins can see this: ";
		echo $this->Html->link('Manage Users', ['controller' => 'users', 'action' => 'index']);
	} 
?>

</p>








