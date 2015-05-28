<!-- File: src/Template/Users/edit.ctp -->

<h1>Update User</h1>
<?php

	echo $this->Form->create($user);
    echo $this->Form->input('person_id', ['options' => $people]);
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant']]);
	echo $this->Form->button(__('Update User'));
	echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Users', 'action' => 'index']
		]);
	echo $this->Form->button(__('Cancel'));

?>