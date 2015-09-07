<?php
    $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('Edit');
?>
<!-- File: src/Template/Articles/edit.ctp -->

<h1>Request</h1>
<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
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
	echo $this->Form->input('category', ['options' => ['General' => 'General', 'Maintenance' => 'Maintenance', 'Internet' => 'Internet', 'Lease' => 'Lease'], 'class' => 'form-control']);
    echo $this->Form->input('property_address', ['options' => $addresses,'class' => 'form-control']);
    echo $this->Form->input('entry_time', ['options' => ['Anytime' => 'Yes, Any Time', '10am to 5pm' => 'Yes, Between 10:am and 5:pm', 'Arrange a time' => 'No, please arrange a time with me', 'N/A' => 'Not applicable'],'class' => 'form-control']);
    echo $this->Form->input('description', ['rows' => '3', 'class' => 'form-control']);

    ?>
    <br>
    <?php

    echo $this->Form->button(__('Update Request'), ['class' => 'form-control btn btn-info']);
    echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Requests', 'action' => 'index']
		]);
	// echo $this->Form->button(__('Cancel'));
?>

</div>
</div>