<?php
    $this->Html->addCrumb('Mac Address', array('controller' => 'Macaddresses', 'action' => 'index'));
    $this->Html->addCrumb('Edit Macaddresses');

?>

<!-- File: src/Template/Articles/edit.ctp -->

<h1>Update Devices</h1>

<div class="panel panel-default clearfix">
<div class="panel-body">

    <ul class="nav nav-pills pull-left">
        <li role="presentation">
            <?= $this->Html->link('All', ['action' => 'index']) ?>
        </li>
        <li role="presentation" class="active">
            <a class="btn float-right">Update Devices</a>
        </li>
        <li role="presentation">
            <a class="btn float-right" href="http://www.wikihow.com/Find-the-MAC-Address-of-Your-Computer">Help me find my MAC Address</a>
        </li>
    </ul>

</div>
</div>

<style type="text/css" >

.form {}

.input-50 .input.text{
    width:50%;
    float:left;
}

.input-50 .input.text:nth-of-type(2n) {
    clear:left;
}

.input-50 button {
    display:block;
    float:left;
    clear:left;
}



</style>




   <div class="panel panel-default">
      <div class="panel-body">   


<div class="form input-50">
<?php
    echo $this->Form->create($lion, array('class' => 'form-group'));
    echo $this->Form->input('device_name_one', array('class' => 'form-control'));
	echo $this->Form->input('mac_address_one', array('class' => 'form-control'));
    echo $this->Form->input('device_name_two', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_two', array('class' => 'form-control'));
    echo $this->Form->input('device_name_three', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_three', array('class' => 'form-control'));
    echo $this->Form->input('device_name_four', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_four', array('class' => 'form-control'));
    echo $this->Form->input('device_name_five', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_five', array('class' => 'form-control'));
    echo $this->Form->input('device_name_six', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_six', array('class' => 'form-control'));
    echo $this->Form->input('device_name_seven', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_seven', array('class' => 'form-control'));
    echo $this->Form->input('device_name_eight', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_eight', array('class' => 'form-control'));
    echo $this->Form->input('device_name_nine', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_nine', array('class' => 'form-control'));
    echo $this->Form->input('device_name_ten', array('class' => 'form-control'));
    echo $this->Form->input('mac_address_ten', array('class' => 'form-control'));
    echo "\n<br />\n<br />";
    echo $this->Form->button(__('Update Request'), ['class' => 'form-control btn btn-info']);
    echo $this->Form->end();
	echo $this->Form->create(null, [
		'url' => ['controller' => 'Macaddresses', 'action' => 'index']
		]);
	// echo $this->Form->button(__('Cancel'));
?>
</div>

</div>
</div>
