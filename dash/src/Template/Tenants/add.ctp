<!-- src/Template/People/add.ctp -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script>
    $(function() {
        $( "#dateStartPicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    </script>
    <script>
    $(function() {
        $( "#dateEndPicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    </script>
</head>

<h3>Tenants</h3>

<div class="panel clearfix">

    <div class="container">

        <div class="row">

            <ul class="nav nav-pills pull-left">
                <li role="presentation"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
                <li role="presentation" class="active"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
            </ul>

            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>

</div>

<hr>

<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
    <span class="sr-only">33% Complete</span>
</div>
</div>

Progress Bar Concept for multi page forms

</div>


<div class="users form panel">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('New Tenant + Lease') ?></legend>
        <?= $this->Form->input('first_name') ?>
        <?= $this->Form->input('last_name') ?>
        <?= $this->Form->input('common_name') ?>
        <?= $this->Form->input('gender', [
         'options' => ['M' => 'Male', 'F' => 'Female']
         ]) ?>
         <?= $this->Form->input('phone') ?>
         <?= $this->Form->input('email') ?>
         <?= $this->Form->input('internet_plan', ['options' => ['FREE' => 'FREE', 'BASIC' => 'BASIC', 'STANDARD' => 'STANDARD', 'PREMIUM' => 'PREMIUM']]) ?>
         <?= $this->Form->input('property_id', ['options' => $properties]); ?>
         <?= $this->Form->input('room_id', ['options' => $rooms]); ?>
         <?= $this->form->input('date_start',['id'=>'dateStartPicker']); ?>
         <?= $this->form->input('date_end',['id'=>'dateEndPicker']); ?>
         <?= $this->Form->input('weekly_price'); ?>
     </fieldset>
     <?= $this->Form->button(__('Submit')); ?>
     <?= $this->Form->end() ?>
     <?php
     echo $this->Form->create(null, [
      'url' => ['controller' => 'People', 'action' => 'index']
      ]);
     echo $this->Form->button(__('Cancel'));
     ?>
 </div>

