<?php
    $this->Html->addCrumb('Leases', '/leases');
?>
<h1>Leases</h1>

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
    <h2 class="panel-title">All Leases</h2>
</div>


  <!-- Table -->
    <div class="table-responsive">
        <table id="leases" cellpadding="0" cellspacing="0" class="">
    <thead>
      <tr>
        <th>Property</th>
        <th>Room</th>
        <th>Tenant</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th>Weekly Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($leases as $lease): ?>

      <tr>
        <td>
          <?= $lease->property->address ?>
        </td>
        <td>
          <?= $lease->room->room_name ?>
        </td>
        <td>
          <?php
          $person = $walrus->get($lease->student->person_id);
          ?>
          <?= $person->first_name ?>
          <?= $person->last_name ?>
        </td>
        <td>
          <?= h($lease->date_start->format('d/m/Y')) ?>
        </td>
        <td>
          <?= h($lease->date_end->format('d/m/Y')) ?>
        </td>
        <td>
          <?= $this->Number->currency($lease->weekly_price) ?>
        </td>
        <td class="actions">
          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lease->id)]) ?>
        </td>
      </tr>

      <?php endforeach; ?>
      
    </tbody>
  </table>
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