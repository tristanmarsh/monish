<?php
    $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('View Request');

?>
<h1>Requests</h1>

<div class="panel panel-default clearfix">

<!--     <div class="panel-heading">
        <h1 class="panel-title">Example</h1>
      </div> -->

      <div class="panel-body">

        <ul class="nav nav-pills pull-left">
          <li role="presentation"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
          <li role="presentation" class="active"><?= $this->Html->link('View', ['action' => 'view', $lion->id]) ?></li>
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

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">Request Detail</h2>
    </div>


<table>

<tr><th>&nbsp;&nbsp;&nbsp;&nbsp;Title: <?= h($giraffe->title) ?></th></tr>

<tr><td>Category: <?= h($giraffe->category) ?></td></tr>
<tr><td>Property: <?= h($giraffe->property_address) ?></td></tr>
<tr><td><?= h($giraffe->description) ?></td></tr>
<!-- <tr><td> <?php echo $this->Html->link('changestatus', ['action' => 'changestatus', $article->id]);

?></td></tr> -->



<tr><td>
Maintenace Requested By: <?= h($lion->person->first_name)?> <?= h($lion->person->last_name)?>
</td></tr>
<tr><td><small>Created: <?= $giraffe->created->format('d M Y H:i:s') ?></small></td></tr>
</table>
</div>


