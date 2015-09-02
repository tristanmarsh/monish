<?php
    $this->Html->addCrumb('Tenants', '/tenants');
?>

<h1>Tenants</h1>

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
    <h2 class="panel-title">All Tenants</h2>
</div>


  <!-- Table -->
    <div class="table-responsive">
        <table id="requests" class="">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Common Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Internet Plan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person): ?>
                <?php if (!($person->user->role === "admin")) : ?>
                <tr>
                    <td>
                        <?= $person->first_name ?>
                        <?= $this->Html->link("", ['action' => 'view', $person->id]) ?>
                    </td>
                    <td>
                        <?= $person->last_name ?>
                        <?= $this->Html->link("", ['action' => 'view', $person->id]) ?>
                    </td>
                    <td>
                        <?= $person->common_name ?>
                        <?= $this->Html->link("", ['action' => 'view', $person->id]) ?>
                    </td>
                    <td>
                        <?= $person->gender ?>
                        <?= $this->Html->link("", ['action' => 'view', $person->id]) ?>
                    </td>
                    <td>
                        <?= $person->phone ?>
                        <?= $this->Html->link("", ['action' => 'view', $person->id]) ?>
                    </td>
                    <td>
                        <?= $person->email ?>
                        <?= $this->Html->link("", ['action' => 'view', $person->id]) ?>
                    </td>
                    <td>
                        <?= $person->student->internet_plan ?>
                        <?= $this->Html->link("", ['action' => 'view', $person->id]) ?>
                    </td>
                    <td class="action action-edit" style="padding-top:20px;padding-bottom:20px;">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller' => 'tenants', 'action' => 'edit', $person->user->id], ['escape' => false]); ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>
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
