<?php
  $this->Html->addCrumb('Mac Address', array('controller' => 'Macaddresses', 'action' => 'index'));
  $this->Html->addCrumb('Edit Macaddresses');

?>

<!-- File: src/Template/Articles/edit.ctp -->

<h1>Registered Devices</h1>

<div class="alert alert-alternative-info alert-dismissible" role="alert">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <span>Your devices MAC Address (sometimes referred to as physical address) looks like <code>34:45:56:ed:34:23</code> or <code>34-45-56-ed-34-23</code></span>
</div>

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

  <div class="button-set">
    <?= $this->Html->link(
    '<i class="glyphicon glyphicon-th-list"></i> All',
    ['action' => 'index'],
    ['class' => 'button button-pill button-primary', 'escape' => false]
    ); ?>

    <?= $this->Html->link(
    '<i class="fa fa-eye"></i> Finding Your MAC Address',
    "http://www.wikihow.com/Find-the-MAC-Address-of-Your-Computer",
    ['class' => 'button button-pill button-highlight active', 'escape' => false]
    ); ?>
  </div>
  
  </div>

  <div class="panel-footer">

  <div class="button-set">
    <?= $this->Html->link(
    '<i class="fa fa-pencil"></i> Update Devices',
    ['action' => 'edit', $lion->id],
    ['class' => 'button button-pill button-action active', 'escape' => false]
    ); ?>
  </div>

  </div>

</div>


<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">Device Detail</h2>

  </div>
  <div class="panel-body">   

      <?php
        echo $this->Form->create($lion, array('class' => 'form-group')); ?>


    <div class="row"> 


      <div class="col-md-6">

        <?php

          echo $this->Form->input('device_name_one', array('class' => 'form-control', 'tabindex'=>'1'));
          
          echo $this->Form->input('device_name_two', array('class' => 'form-control', 'tabindex'=>'2'));
        
          echo $this->Form->input('device_name_three', array('class' => 'form-control', 'tabindex'=>'4'));
          
          echo $this->Form->input('device_name_four', array('class' => 'form-control', 'tabindex'=>'6'));
          
          echo $this->Form->input('device_name_five', array('class' => 'form-control', 'tabindex'=>'8'));
          
          echo $this->Form->input('device_name_six', array('class' => 'form-control', 'tabindex'=>'10'));
          
          echo $this->Form->input('device_name_seven', array('class' => 'form-control', 'tabindex'=>'12'));
           
          echo $this->Form->input('device_name_eight', array('class' => 'form-control', 'tabindex'=>'14'));
          
          echo $this->Form->input('device_name_nine', array('class' => 'form-control', 'tabindex'=>'16'));
          
          echo $this->Form->input('device_name_ten', array('class' => 'form-control', 'tabindex'=>'18'));
          
        ?>  

      </div>

      <div class="col-md-6">
        
        <?php
          
          echo $this->Form->input('mac_address_one', array('class' => 'form-control', 'tabindex'=>'1'));
          
          echo $this->Form->input('mac_address_two', array('class' => 'form-control', 'tabindex'=>'3'));
          
          echo $this->Form->input('mac_address_three', array('class' => 'form-control', 'tabindex'=>'5'));
          
          echo $this->Form->input('mac_address_four', array('class' => 'form-control', 'tabindex'=>'7'));
          
          echo $this->Form->input('mac_address_five', array('class' => 'form-control', 'tabindex'=>'9'));
          
          echo $this->Form->input('mac_address_six', array('class' => 'form-control', 'tabindex'=>'11'));
          
          echo $this->Form->input('mac_address_seven', array('class' => 'form-control', 'tabindex'=>'13'));
          
          echo $this->Form->input('mac_address_eight', array('class' => 'form-control', 'tabindex'=>'15'));
          
          echo $this->Form->input('mac_address_nine', array('class' => 'form-control', 'tabindex'=>'17'));
          
          echo $this->Form->input('mac_address_ten', array('class' => 'form-control', 'tabindex'=>'19'));
        
        ?>
      
      </div>

    </div>

    <br>

    <?php
      echo $this->Form->button('<i class="fa fa-pencil"></i> Update Devices', ['class' => 'form-control button button-action button-rounded button-3d', 'tabindex'=>'20']);
      echo $this->Form->end();
    ?>
    <?php
      echo $this->Form->create(null, [
      'url' => ['controller' => 'Macaddresses', 'action' => 'index']
      ]);
    ?>

  </div>

</div>

