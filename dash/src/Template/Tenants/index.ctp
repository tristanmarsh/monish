<?php
    $this->Html->addCrumb('Tenants', '/tenants');
?>

<h1>Tenants</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">

        <div class="col-sm-6">
            <ul class="nav nav-pills pull-left">
                <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
                <li role="presentation"><?= $this->Html->link('New Tenant', ['action' => 'add']) ?></li>
            </ul>
            
        </div>

        <div class="col-sm-6">

        <div class="input-group input-lg pull-right search">
          <input type="text" class="form-control" placeholder="Filter Results" id="myInputTextField">
          <div class="input-group-btn">
                    
                    <!-- Single button -->
                     <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>

                </div>
            </div>

        </div>

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
        <table  class="datatable">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Common Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Internet Plan</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person): ?>
                <?php if (!($person->user->role === "admin")) : ?>
                <tr>
                    <td>
                        <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>

                            <?php
                                $emailHash = md5( strtolower( trim( $person->email ) ) );
                                // $defaultImage = urlencode('http://localhost/monish/dash/img/default-profile.jpg');
                                $gravatarQuery = 'http://www.gravatar.com/avatar/' . $emailHash . '?d=mm';
                                $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';
                            ?>

                            <?= $gravatarImage; ?>

                        <span>
                        <?= $person->first_name ?>
                    </span>
                </td>
                    <td>
                        <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
                        <span>
                        <?= $person->last_name ?>
                    </span>
                </td>
                    <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                        <?= $person->common_name ?>
                    </span></td>
                    <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                        <?= $person->gender ?>
                    </span></td>
                    <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                        <?= $person->phone ?>
                    </span></td>
                    <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                        <?= $person->email ?>
                    </span></td>
                    <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                        <?= $person->student->internet_plan ?>
                    </span></td>
                    <td class="action action-edit">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller' => 'tenants', 'action' => 'edit', $person->user->id], ['escape' => false]); ?>
                    </span></td>
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
