<?php
    $this->Html->addCrumb('Requests', array('controller' => 'requests', 'action' => 'index'));
    $this->Html->addCrumb('Add Request', array('controller' => 'requests', 'action' => 'add'));
?>
<!-- File: src/Template/Articles/add.ctp -->

<h1>Requests</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
        </ul>


      </div>

<!--       <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
          <li role="presentation" class="active"><a href="#">Imagine</a></li>
          <li role="presentation"><a href="#">Alternative</a></li>
          <li role="presentation"><a href="#">Secondary</a></li>
          <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

      </div> -->
    </div>

<div class="panel panel-default">
      <div class="panel-body">


        <?= $this->Form->create($zebra, array('class' => 'form-group')) ?>
        <fieldset class="input-group">

          <div class="panel-heading">
            <legend><?= __('Create New Request', array('class' => 'form-control')) ?></legend>
          </div>

          <div class="panel-body">
            
            <div class="col-md-3">
            
              <?= $this->Form->input('title', array('class' => 'form-control')) ?>
              <?= $this->Form->input('category', ['options' => ['GENERAL' => 'GENERAL', 'MAINTENANCE' => 'MAINTENANCE', 'INTERNET' => 'INTERNET', 'LEASE' => 'LEASE'],'class' => 'form-control']) ?>
              <?= $this->Form->input('property_address', ['options' => $addresses,'class' => 'form-control']) ?>
              <?= $this->Form->input('description', ['rows' => '3', 'class' => 'form-control']) ?>

              
            </div>

           
           </fieldset>

           <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-success']); ?>
           <?= $this->Form->end() ?>
           <?php
           echo $this->Form->create(null, [
            'url' => ['controller' => 'Requests', 'action' => 'index']
            ]);
           ?>

           </div>
    </div>
</div>

<!-- // <?php
//     // note $this->Form->create() generates <form method="post" action="/articles/add">
//     echo $this->Form->create($zebra, array('class' => 'form-group'));
//     echo $this->Form->input('title', array('class' => 'form-control'));
// 	echo $this->Form->input('category', ['options' => ['GENERAL' => 'GENERAL', 'MAINTENANCE' => 'MAINTENANCE', 'INTERNET' => 'INTERNET', 'LEASE' => 'LEASE']], array('class' => 'form-control'));
//     echo $this->Form->input('property_address', ['options' => $addresses], array('class' => 'form-control'));
//     echo $this->Form->input('description', ['rows' => '3'], array('class' => 'form-control'));
//     echo $this->Form->button(__('Submit Request'));
//     echo $this->Form->end();
// 	echo $this->Form->create(null, [
// 		'url' => ['controller' => 'Requests', 'action' => 'index']
// 		]);
// 	echo $this->Form->button(__('Cancel'));
// ?> -->