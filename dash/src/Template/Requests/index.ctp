<?php
    $this->Html->addCrumb('Requests', '/requests');
?>

<!-- File: src/Template/Requests/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

<h1>Requests</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
        </ul>

    </div>

<!--     <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><a href="#">Imagine</a></li>
            <li role="presentation"><a href="#">Secondary</a></li>
            <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

    </div> -->

</div>



<!-- Panel -->
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">All Requests</h2>
    </div>

<!-- Table -->
<div class="table-responsive">
    <table>
        <tr>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('person_id', 'Requested By') ?></th>
            <th><?= $this->Paginator->sort('category') ?></th>
            <th><?= $this->Paginator->sort('property_address', 'property') ?></th>
            <th><?= $this->Paginator->sort('created', 'requested') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th>Action</th>
        </tr>

        <!-- Here is where we iterate through our $articles query object, printing out article info -->

        <?php foreach ($elephant as $article): ?>
            <?php if ($article->person_id === $userEntity->person_id OR $user['role'] === 'admin') : ?>
                <tr > 
                    <td>
                        <?= $this->Html->link("", ['action' => 'view', $article->id]) ?>
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
                        <?= $article->created->format('d/m/Y' /*'h:m A'*/) ?>
                    </td>
                    <td>
                        <?= $article->status ?>
                    </td>
                    <td>
                        <?php 
            				if ($article->person_id === $userEntity->person_id OR $user['role'] === 'admin') // If the user owns it, or they are admin, they can see the actions
            				{
            					echo $this->Form->postLink(
                                   'Done',
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

<!-- Clickable Row to View Record -->
<script>
    $("table").on("click", "tr", function(e) {
        if ($(e.target).is("a"))
            return;
        location.href = $(this).find("a").attr("href");
    });
</script>








