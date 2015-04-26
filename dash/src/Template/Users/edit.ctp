<!-- File: src/Template/Users/edit.ctp -->

<h1>Update User</h1>
<?php

	echo $this->Form->create($user);
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant']]);
	echo $this->Form->input('title', ['options' => ['MR' => 'Mr', 'MRS' => 'Mrs', 'MISS' => 'Miss', 'DR' => 'Dr']]);
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('gender', ['options' => ['M' => 'Male', 'F' => 'Female']]);
	echo $this->Form->input('phone');
	echo $this->Form->input('email');
	echo $this->Form->input('home_country');
	echo $this->Form->input('city');
	echo $this->Form->input('suburb');
	echo $this->Form->input('postcode');
	echo $this->Form->button(__('Update User'));
	echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Users', 'action' => 'index']
		]);
	echo $this->Form->button(__('Cancel'));

?>