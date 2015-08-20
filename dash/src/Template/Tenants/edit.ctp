<?php
    $this->Html->addCrumb('Tenants', array('controller' => 'Tenants', 'action' => 'index'));
    $this->Html->addCrumb('Edit Tenant');
?>

<!-- File: src/Template/Users/edit.ctp -->

<h1>Update Tenant</h1>
<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" ><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"class="active"><?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?></li>
        </ul>

    </div>

<!--     <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><a href="#">Imagine</a></li>
            <li role="presentation"><a href="#">Secondary</a></li>
            <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

    </div> -->

</div>

    <div class="panel panel-default">
      <div class="panel-body">   
<?php

	echo $this->Form->create($user, array('class' => 'form-group'));
    echo $this->Form->input('first_name', array('default' => $defaultPerson->first_name,'class' => 'form-control'));
    echo $this->Form->input('last_name', array('default' => $defaultPerson->last_name,'class' => 'form-control'));
    echo $this->Form->input('common_name', array('default' => $defaultPerson->common_name,'class' => 'form-control'));
    echo $this->Form->input('phone', array('default' => $defaultPerson->phone,'class' => 'form-control'));
    echo $this->Form->input('internet_plan', ['options' => ['FREE' => 'FREE', 'BASIC' => 'BASIC', 'STANDARD' => 'STANDARD', 'PREMIUM' => 'PREMIUM'], 'default' => $defaultStudent->internet_plan, 'class' => 'form-control']);
	echo $this->Form->input('username', array('class' => 'form-control'));
	echo $this->Form->input('password', array('class' => 'form-control'));
	echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'tenant' => 'Tenant'], 'class' => 'form-control']);
    ?>
    <br>
    <?php 
	echo $this->Form->button(__('Update User') ,['class' => 'form-control btn btn-success']);
	echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Users', 'action' => 'index']
		]);
	// echo $this->Form->button(__('Cancel'));

?>
</div>
</div>