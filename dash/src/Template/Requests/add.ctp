<!-- File: src/Template/Articles/add.ctp -->

<h1>Request</h1>
<?php
    // note $this->Form->create() generates <form method="post" action="/articles/add">
    echo $this->Form->create($zebra);
    echo $this->Form->input('title');
    echo $this->Form->input('description', ['rows' => '3']);
    echo $this->Form->button(__('Submit Request'));
    echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Requests', 'action' => 'index']
		]);
	echo $this->Form->button(__('Cancel'));
?>