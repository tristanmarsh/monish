<!-- File: src/Template/Articles/edit.ctp -->

<h1>Update Request</h1>
<?php

    echo $this->Form->create($lion);
    echo $this->Form->input('device_name_one');
	echo $this->Form->input('mac_address_one');
    echo $this->Form->input('device_name_two');
    echo $this->Form->input('mac_address_two');
    echo $this->Form->input('device_name_three');
    echo $this->Form->input('mac_address_three');
    echo $this->Form->input('device_name_four');
    echo $this->Form->input('mac_address_four');
    echo $this->Form->input('device_name_five');
    echo $this->Form->input('mac_address_five');
    echo $this->Form->input('device_name_six');
    echo $this->Form->input('mac_address_six');
    echo $this->Form->input('device_name_seven');
    echo $this->Form->input('mac_address_seven');
    echo $this->Form->input('device_name_eight');
    echo $this->Form->input('mac_address_eight');
    echo $this->Form->input('device_name_nine');
    echo $this->Form->input('mac_address_nine');
    echo $this->Form->input('device_name_ten');
    echo $this->Form->input('mac_address_ten');
    echo $this->Form->button(__('Update Request'));
    echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Macaddresses', 'action' => 'index']
		]);
	echo $this->Form->button(__('Cancel'));
?>