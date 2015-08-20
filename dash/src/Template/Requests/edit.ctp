<?php
    $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('Edit');
?>
<!-- File: src/Template/Articles/edit.ctp -->

<h1>Request</h1>
<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" ><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"class="active"><?= $this->Html->link('Edit', ['action' => 'edit', $lion->id]) ?></li>
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

    echo $this->Form->create($lion, array('class' => 'form-group'));
    echo $this->Form->input('title', array('class' => 'form-control'));
	echo $this->Form->input('category', ['options' => ['GENERAL' => 'GENERAL', 'MAINTENANCE' => 'MAINTENANCE', 'INTERNET' => 'INTERNET', 'LEASE' => 'LEASE'], 'class' => 'form-control']);
    echo $this->Form->input('property_address', ['options' => $addresses,'class' => 'form-control']);
    echo $this->Form->input('description', ['rows' => '3', 'class' => 'form-control']);
    echo $this->Form->button(__('Update Request'), ['class' => 'form-control btn btn-info']);
    echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Requests', 'action' => 'index']
		]);
	// echo $this->Form->button(__('Cancel'));
?>

</div>
</div>