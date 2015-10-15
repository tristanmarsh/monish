<?php
$this->Html->addCrumb('Leases', '/leases');
?>
<h1>Leases</h1>

<!-- File: src/Template/Leases/index.ctp -->
<div class="panel panel-default clearfix">

  <div class="panel-body">

    <div class="col-sm-6"> 
      <ul class="nav nav-pills pull-left">
        <li role="presentation" class="active"><?= $this->Html->link('Current', ['action' => 'index']) ?></li>
        <li role="presentation"><?= $this->Html->link('Archived', ['action' => 'archived']) ?></li>
        <li role="presentation"><?= $this->Html->link('New Lease', ['action' => 'add']) ?></li>

      </div>
      <div class="col-sm-6">
        <div class="input-group input-lg search">
          <input type="text" class="form-control" placeholder="Filter Results" id="myInputTextField">
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
          <thead>
            <tr>
              <th>Tenant</th>
              <th>Property</th>
              <th>Room</th>
              <th>Date Start</th>
              <th>Date End</th>
              <th>Weekly Price</th>
              <th style="text-align:center;">Delete</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($leases as $lease): ?>
            <?php if($lease->archived === 'NO') : ?>
            <tr>
              <td> 
                <?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?>  
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
                <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>
                  <?= $lease->property->address ?>
                </span></td>
                <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>  
                  <?= $lease->room->room_name ?>
                </span></td>

                <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>
                  <?= h($lease->date_start->format('Y/m/d')) ?>
                </span></td>
                <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>
                  <?= h($lease->date_end->format('Y/m/d')) ?>
                </span></td>
                <td><?= $this->Html->link("", ['controller'=>'leases', 'action' => 'view', $lease->id]) ?> <span>
                  <?= $this->Number->currency($lease->weekly_price) ?>
                </span></td>
                <td class="action action-remove" >
                  <?php echo $this->form->postlink('<span class="glyphicon glyphicon-remove"></span>', ['controller' => 'Leases', 'action' => 'delete', $lease->id], ['confirm' => 'Delete ' . '?' , "escape" => false]); ?>
                </span></td>

              </span></td>
            </tr>
          <?php endif ?>
        <?php endforeach; ?>

      </tbody>
    </table>
    <div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>
  </div>

</div>
