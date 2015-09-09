<?php
$this->Html->addCrumb('Leases', '/leases');
?>
<h1>Leases</h1>

<!-- File: src/Template/Leases/index.ctp -->
<div class="panel panel-default clearfix">

  <div class="panel-body">

    <div class="col-sm-6"> 
    <ul class="nav nav-pills pull-left">
      <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
      <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>

        </div>
      <div class="col-sm-6">

        <div class="input-group input-lg pull-right">
          <input type="text" class="form-control" placeholder="Search" id="myInputTextField">
          <div class="input-group-btn">

            <!-- Single button -->
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Search</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </div>

          </div>
        </div>


      </div>
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
        <h2 class="panel-title">All Leases</h2>
      </div>


      <!-- Table -->
      <div class="table-responsive">
        <table class="datatable">
        <table id="leases" cellpadding="0" cellspacing="0" class="">
          <thead>
            <tr>
             <th>Tenant</th>
              <th>Property</th>
              <th>Room</th>
 
              <th>Date Start</th>
              <th>Date End</th>
              <th>Weekly Price</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($leases as $lease): ?>

            <tr>
                            <td>   
                                            <?php
                $person = $walrus->get($lease->student->person_id);
                ?>                         
                              <?php
                                $emailHash = md5( strtolower( trim( $person->email ) ) );
                                // $defaultImage = urlencode('http://localhost/monish/dash/img/default-profile.jpg');
                                $gravatarQuery = 'http://www.gravatar.com/avatar/' . $emailHash . '?d=mm';
                                $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';
                            ?>

                            <?= $gravatarImage; ?>

                              <span>

                <?= $person->first_name ?>
                <?= $person->last_name ?>
              </span></td>
              <td><span>
                <?= $lease->property->address ?>
              </span></td>
              <td><span>  
                <?= $lease->room->room_name ?>
              </span></td>

              <td><span>
                <?= h($lease->date_start->format('d/m/Y')) ?>
              </span></td>
              <td><span>
                <?= h($lease->date_end->format('d/m/Y')) ?>
              </span></td>
              <td><span>
                <?= $this->Number->currency($lease->weekly_price) ?>
              </span></td>
              <td class="actions"><span>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lease->id)]) ?>
              </span></td>
            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
              <div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>
    </div>

  </div>

  <!-- Clickable Row to View Record -->


  <!-- jQuery -->
  <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

  <!-- DataTables -->
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

  <script>
  $(document).ready( function () {
    $('#leases').DataTable();
  } );
  </script>

  <script>
  oTable = $('#leases').dataTable();
  $('#myInputTextField').keyup(function(){
    oTable.fnFilter($(this).val());
  })
  </script>