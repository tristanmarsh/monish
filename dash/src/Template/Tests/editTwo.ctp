<!-- File: src/Template/Users/edit.ctp -->

<h1>Update User</h1>
<?php

	echo $this->Form->create($person);
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('common_name');
    echo $this->Form->input('phone');
	echo $this->Form->input('username', array('default' => $defaultUser->username));
	echo $this->Form->input('password', array('default' => $defaultUser->password));
    echo $this->Form->input('internet_plan', array('default' => $defaultStudent->internet_plan));
	echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant']]);
	echo $this->Form->button(__('Update User'));
	echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Users', 'action' => 'index']
		]);
	echo $this->Form->button(__('Cancel'));

?>