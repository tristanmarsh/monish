<?php
$this->Html->addCrumb('Leases', '/leases');
?>
<h1>Archived</h1>

<!-- File: src/Template/Leases/index.ctp -->
<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <div class="row">

      <div class="col-sm-6 clearfix"> 

        <div class="button-group">

          <?= $this->Html->link(
          '<i class="fa fa-home"></i> Current',
          ['action' => 'index'],
          ['class' => 'button button-pill button-primary ', 'escape' => false]
          ); ?>

          <?= $this->Html->link(
          '<i class="fa fa-archive"></i> Archived',
          ['action' => 'archived'],
          ['class' => 'button button-pill button-primary  active', 'escape' => false]
          ); ?>

        </div>
        
        <div class="button-group">
          <?= $this->Html->link(
          '<i class="fa fa-plus"></i> New Lease',
          ['action' => 'add'],
          ['class' => 'button button-pill button-action ', 'escape' => false]
          ); ?>

        </div>
        
      </div>

      
      <div class="col-sm-6 clearfix">
        <div class="input-group input-lg search">
          <input type="text" class="form-control" placeholder="Filter Records" id="myInputTextField">
          <div class="input-group-btn">


          </div>
        </div>
      </div>

    </div>

  </div>

</div>


    <div class="panel panel-primary">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <h2 class="panel-title">Archived Leases</h2>
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


              <?php if($lease->archived === 'YES') : ?>
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
