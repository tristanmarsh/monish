<!-- File: src/Template/Articles/edit.ctp -->

<h1>Update Maintenance</h1>
<?php

    echo $this->Form->create($lion);
    echo $this->Form->input('title');
    echo $this->Form->input('description', ['rows' => '3']);
    echo $this->Form->button(__('Update Maintenance'));
    echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Maintenances', 'action' => 'index']
		]);
	echo $this->Form->button(__('Cancel'));
?>