<?php
    $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('View Request');

?>
<h1><?= $giraffe->title; ?></h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New Request', ['action' => 'add']) ?></li>
        </ul>

    </div>

    <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('View', ['action' => 'view', $giraffe->id]) ?></li>
            <li role="presentation"><?= $this->Html->link('Edit', ['action' => 'edit', $giraffe->id]) ?></li>
        </ul>

    </div>

</div>

<?php 
  if (!($giraffe->avatar_directory === NULL)) {
    $directory = substr($giraffe->avatar_url, 5);
} ?>

<?php if ($giraffe->avatar_directory) : ?>
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">
              <?= h($giraffe->title) ?>
            </h2>
          </div>
          <div class="panel-body">
            <?= $this->Html->image($directory, ['alt' => 'CakePHP', 'class' => 'img img-responsive img-center']); ?>
          </div>
        </div>
      </div>


    <div class="col-sm-6">
      <div class="panel panel-primary">
  <?php else : ?>
      <div class="panel panel-primary">
  <?php endif; ?>

    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">Request Detail</h2>
    </div>


<table>

    <tr>
      <th>Title: <?= h($giraffe->title) ?></th>
    </tr>

    <tr>
      <td>Category: <?= h($giraffe->category) ?></td>
    </tr>
    <tr>
      <td>Property: <?= h($giraffe->property_address) ?></td>
    </tr>
    <tr>
      <td><?= h($giraffe->description) ?></td>
    </tr>
<!-- <tr>
<td> <?php echo $this->Html->link('changestatus', ['action' => 'changestatus', $article->id]);

?></td>
</tr> -->



    <tr>
      <td>
          Maintenace Requested By: <?= h($lion->person->first_name)?> <?= h($lion->person->last_name)?>
      </td>
    </tr>
    <tr>
      <td><small>Created: <?= $giraffe->created->format('d M Y H:i:s') ?></small></td>
    </tr>
</table>
  </div>
      <?php if ($giraffe->avatar_directory) : ?>
  </div>
  </div>
    <?php else : ?>
  </div>
    <?php endif; ?>



