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
            <li><input type="text" class="form-control" placeholder="Search" id="myInputTextField"></li>
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

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">All Requests</h2>
    </div>

    <div class="table-responsive">
        <table id="requests" class="">
            <thead>
            <tr class="wow fadeInDown">
                <th>Title</th>
                <th>Requested By</th>
                <th>Category</th>
                <th>Property</th>
                <th>Requested</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($requests as $request): ?>
    			<?php if ($request->person_id === $userEntity->person_id OR $user['role'] === 'admin') : ?>
                    <tr>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <?php echo $request->title; ?>
                        </td>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <?php
                            echo $request->person->first_name;
                            echo " ".$request->person->last_name;
                            ?>
                        </td>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <?= $request->category ?>
                        </td>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <?= $request->property_address ?>
                        </td>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <?= $request->created->format('d/m/Y') ?>
                        </td>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <?= $request->status ?>
                        </td>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <?php

                                echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller'=>'requests', 'action' => 'edit', $request->id], ['escape' => false]);

                                echo "\t"; // this puts a space between Delete and Edit button

                                echo $this->Form->postLink(
                                    '<span class="glyphicon glyphicon-ok"></span>',
                                    ['controller'=>'requests', 'action' => 'delete', $request->id],
                                    ['confirm' => 'Are you sure?', "escape" => false]);
                            ?>
                        </td>
                    </tr>
    			<?php endif ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

    <!-- Clickable Row to View Record -->
    <script>
        $("table").on("click", "td", function(e) {
            window.console.log("click");
            window.console.log(e.target);
            if ($(e.target).is("a"))
                return;
            if ($(e.target).is("input")) {
                window.console.log(e.target);
            }
            else {
                location.href = $(this).find("a").attr("href");
            }
        });
    </script>

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#requests').DataTable();
        } );
    </script>

    <script>
        oTable = $('#requests').dataTable();
        $('#myInputTextField').keyup(function(){
            oTable.fnFilter($(this).val());
        })
    </script>