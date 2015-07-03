<!-- File: src/Template/Users/edit.ctp -->

<h1>Update User</h1>
<?php

    echo $this->Form->create($user);
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('gender', ['options' => ['M' => 'Male', 'F' => 'Female']]);
    echo $this->Form->input('phone');
    echo $this->Form->input('email');
    echo $this->Form->button(__('Update Person'));
    echo $this->Form->end();
    echo $this->Form->create(null, [
        'url' => ['controller' => 'People', 'action' => 'index']
    ]);
    echo $this->Form->button(__('Cancel'));

?>

<?= $user ?>