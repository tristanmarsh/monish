<?php
    $this->Html->addCrumb('Tenants', '/tenants');
    $this->Html->addCrumb('Edit Tenant', array('controller' => 'tenants', 'action' => 'edit'));
?>
<!-- File: src/Template/Users/edit.ctp -->

<h1>Update User</h1>
<?php

	echo $this->Form->create($user);
    echo $this->Form->input('first_name', array('default' => $defaultPerson->first_name));
    echo $this->Form->input('last_name', array('default' => $defaultPerson->last_name));
    echo $this->Form->input('common_name', array('default' => $defaultPerson->common_name));
    echo $this->Form->input('phone', array('default' => $defaultPerson->phone));
    echo $this->Form->input('internet_plan', ['options' => ['FREE' => 'FREE', 'BASIC' => 'BASIC', 'STANDARD' => 'STANDARD', 'PREMIUM' => 'PREMIUM'], 'default' => $defaultStudent->internet_plan]);
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