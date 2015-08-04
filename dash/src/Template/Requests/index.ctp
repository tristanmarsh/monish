<!-- File: src/Template/Requests/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

<h1>Requests</h1>

<div class="panel clearfix">
    
    <ul class="nav nav-pills pull-left">
        <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
        <li role="presentation"><a href="#">Pending</a></li>
        <li role="presentation"><a href="#">Completed</a></li>
    </ul>

    <form class="navbar-form navbar-left" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Submit</button>
            </span>
        </div><!-- /input-group -->
    </form>

</div>

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">All Requests</h2>
    </div>

<div class="table-responsive">
    <table>
        <tr>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('person_id', 'Requested By') ?></th>
            <th><?= $this->Paginator->sort('category') ?></th>
            <th><?= $this->Paginator->sort('property_address', 'property') ?></th>
            <th><?= $this->Paginator->sort('created', 'requested') ?></th>
            <th>Action</th>
        </tr>

        <!-- Here is where we iterate through our $articles query object, printing out article info -->

        <?php foreach ($elephant as $article): ?>
        <?php if ($article->person_id === $userEntity->person_id OR $user['role'] === 'admin') : ?>
        
        <tr>
            <td>
                <?= $article->title ?>
            </td>
            <td>
                <?php
                echo $article->person->first_name;
                echo " ".$article->person->last_name;
                ?>
            </td>
            <td>
                <?= $article->category ?>
            </td>
            <td>
                <?= $article->property_address ?>
            </td>
            <td>
                <?= $article->created->format('d/m/y' /*'h:m A'*/) ?>
            </td>
            <td>
             <?php 
        				if ($article->person_id === $userEntity->person_id OR $user['role'] === 'admin') // If the user owns it, or they are admin, they can see the actions
        				{
        					echo $this->Form->postLink(
                               'Delete',
                               ['action' => 'delete', $article->id],
                               ['confirm' => 'Are you sure?']);
        					echo " "; // this puts a space between Delete and Edit button
        					echo $this->Html->link('Edit', ['action' => 'edit', $article->id]);
        				};
                     ?>
                 </td>
             </tr>

         <?php endif ?>
         
     <?php endforeach; ?>
 </table>
</div></div>

<paginator>
<?php echo $this->element('paginator'); ?>
</paginator>








