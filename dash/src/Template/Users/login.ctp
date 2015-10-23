<!-- <!-- File: src/Template/Users/login.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>


<?php if ($user['role'] === "admin") : ?>

  <h1>Dashboard</h1>


  <!-- Expiring Leases -->
  <div class="row">

    <div class="col-md-4">
      <div class="panel panel-primary panel-30-day">

        <div class="panel-heading text-center">

          <?php
          $i=0;
          foreach ($leases as $lease) {

            $now = time(); 
            $your_date = strtotime($lease->date_end);
            $datediff = $your_date - $now;

            if (floor($datediff/(60*60*24)) < 30 && floor($datediff/(60*60*24)) >= 0) {
              $i+=1;
            }

          } ?>

          <h1><?= $i ?></h1>

          <span><?php if($i==1) {echo 'Lease';} else {echo 'Leases';} ?> ending within 1 month</span>

        </div>

        <?php $countthirty = 0; ?>
        <?php foreach ($leases as $lease): ?> 
        <?php
        $now = time(); 
        $your_date = strtotime($lease->date_end);
        $datediff = $your_date - $now;
        ?>
        <?php if (floor($datediff/(60*60*24)) < 30 && floor($datediff/(60*60*24)) >= 0) : ?>

      <?php endif ?>  
    <?php endforeach; ?>

    <div class="table-responsive">

      <table>

        <thead>
          <th>Property</th>
          <th>Room</th>
          <th>Tenant</th> 
          <th>Days</th>
        </thead>

        <tbody>
          <?php foreach ($leases as $lease): ?> 
          <?php
          $now = time(); 
          $your_date = strtotime($lease->date_end);
          $datediff = $your_date - $now;
          ?>
          <?php if (floor($datediff/(60*60*24)) < 30 && floor($datediff/(60*60*24)) >= 0) : ?>
          <tr>
            <td>
              <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
              <?= $lease->property->address ?>
            </td>

            <td>
              <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
              <?= $lease->room->room_name ?>
            </td>

            <td>
              <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
              <?php
              $person = $walrus->get($lease->student->person_id);
              ?>
              <?= $person->first_name ?>
              <?= $person->last_name ?>
            </td>

            <td>
              <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
              <?php
              echo floor($datediff/(60*60*24));
              ?>
            </td>

          </tr> 
        <?php endif ?>  
      <?php endforeach; ?>

    </tbody>

  </table>

</div>

</div>

</div>
<div class="col-md-4">
  <div class="panel panel-primary panel-90-day">
    <div class="panel-heading text-center">

      <?php
      $i=0;
      foreach ($leases as $lease) {
        $now = time(); 
        $your_date = strtotime($lease->date_end);
        $datediff = $your_date - $now;

        if (floor($datediff/(60*60*24)) < 90 && floor($datediff/(60*60*24)) >= 30){
          $i+=1;
        }

      }
      ?> 

      <h1><?= $i ?></h1>

      <span><?php if($i==1) {echo 'Lease';} else {echo 'Leases';} ?> ending within 3 months</span>

    </div>

    <?php $countninety = 0; ?>
    <?php foreach ($leases as $lease): ?> 
    <?php
    $now = time(); 
    $your_date = strtotime($lease->date_end);
    $datediff = $your_date - $now;
    ?>
    <?php if (floor($datediff/(60*60*24)) < 90 && floor($datediff/(60*60*24)) >= 30) : ?>

  <?php endif ?>  
<?php endforeach; ?>

<div class="table-responsive">
  <table>
    <thead>
      <th>Property</th>
      <th>Room</th>
      <th>Tenant</th> 
      <th>Days</th>
    </thead>
    <tbody>
      <?php foreach ($leases as $lease): ?> 
      <?php
      $now = time(); 
      $your_date = strtotime($lease->date_end);
      $datediff = $your_date - $now;
      ?>
      <?php if (floor($datediff/(60*60*24)) < 90 && floor($datediff/(60*60*24)) >= 30) : ?>
      <tr>
        <td>
          <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
          <?= $lease->property->address ?>
        </td>
        <td>
          <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
          <?= $lease->room->room_name ?>
        </td>
        <td>
          <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
          <?php
          $person = $walrus->get($lease->student->person_id);
          ?>
          <?= $person->first_name ?>
          <?= $person->last_name ?>
        </td>
        <td>
          <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
          <?php
          echo floor($datediff/(60*60*24));
          ?>
        </td>
      </tr> 
    <?php endif ?>  
  <?php endforeach; ?>
</tbody>
</table>

</div>


</div>
</div>
<div class="col-md-4">
  <div class="panel panel-primary panel-180-day">
    <div class="panel-heading text-center">

      <?php
      $i=0;
      foreach ($leases as $lease) {

        $now = time(); 
        $your_date = strtotime($lease->date_end);
        $datediff = $your_date - $now;

        if (floor($datediff/(60*60*24)) < 180 && floor($datediff/(60*60*24)) >= 90) {
          $i+=1;
        }
      }
      ?> 

      <h1><?= $i ?></h1>

      <span><?php if($i==1) {echo 'Lease';} else {echo 'Leases';} ?> ending within 6 months</span>
    </div>

    <?php $countonehundredandeighty = 0; ?>
    <?php foreach ($leases as $lease): ?> 
    <?php
    $now = time(); 
    $your_date = strtotime($lease->date_end);
    $datediff = $your_date - $now;
    ?>
    <?php if (floor($datediff/(60*60*24)) < 180 && floor($datediff/(60*60*24)) >= 90) : ?>

  <?php endif ?>  
<?php endforeach; ?>

<div class="table-responsive">
  <table>
    <thead>
      <th>Property</th>
      <th>Room</th>
      <th>Tenant</th> 
      <th>Days</th>
    </thead>
    <tbody>
      <?php foreach ($leases as $lease): ?> 
      <?php
      $now = time(); 
      $your_date = strtotime($lease->date_end);
      $datediff = $your_date - $now;
      ?>
      <?php if (floor($datediff/(60*60*24)) < 180 && floor($datediff/(60*60*24)) >= 90) : ?>
      <tr>
        <td>
          <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
          <?= $lease->property->address ?>
        </td>
        <td>
          <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
          <?= $lease->room->room_name ?>
        </td>
        <td>
          <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
          <?php
          $person = $walrus->get($lease->student->person_id);
          ?>
          <?= $person->first_name ?>
          <?= $person->last_name ?>
        </td>
        <td>
          <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
          <?php
          echo floor($datediff/(60*60*24));
          ?>
        </td>
      </tr> 
    <?php endif ?>  
  <?php endforeach; ?>
</tbody>
</table>

</div>


</div>
</div>
</div>

<!-- Unread Requests -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title">Unread Requests</h2>
  </div>

  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th>Tenant</th>
          <th>Title</th>
          <th>Property</th>

        </tr>
      </thead>

      <tbody>

        <?php foreach ($requests as $request): ?>
        
        <?php if ($request->status=='Unread'): ?>
        
        <tr class="unread">
          <td>
            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>

            <!-- Tristan's Adorable/Gravatar Avatar Script -->
            <?php
              $email = $request->person->email;
              $emailHash = md5( strtolower( trim( $email ) ) );

              $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
              $defaultImageQuery = urlencode($defaultImageQuery);

              $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;
              
              $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';

              echo $gravatarImage;
            ?>

            <span>
              <?= $request->person->first_name; ?>
              <?= " ".$request->person->last_name; ?>
            </span>

          </td>

          <td>
            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
            <span>
              <?= $request->title; ?>
            </span>
          </td>

          <td>
            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
            <span>
              <?= $request->property_address ?>
            </span>
          </td>
        </tr>

      <?php endif; ?>

    <?php endforeach; ?>
  </tbody>
</table>
</div>

</div>


<!-- Google Analytics Widget -->
<div class="panel panel-primary">

  <div class="panel-heading">
    <h2 class="panel-title">Google Analytics</h2>
  </div>
  
  <div class="panel-body">

    <!-- Step 1: Create the containing elements. -->

    <section id="auth-button"></section>
    <section id="view-selector"></section>
    <section id="timeline"></section>

    <!-- Step 2: Load the library. -->

    <script>
    (function(w,d,s,g,js,fjs){
      g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
      js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
      js.src='https://apis.google.com/js/platform.js';
      fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
    }(window,document,'script'));
    </script>

    <script>
    gapi.analytics.ready(function() {

      // Step 3: Authorize the user.

      var CLIENT_ID = 'UA-66079921-1';

      gapi.analytics.auth.authorize({
        container: 'auth-button',
        clientid: CLIENT_ID,
      });

      // Step 4: Create the view selector.

      var viewSelector = new gapi.analytics.ViewSelector({
        container: 'view-selector'
      });

      // Step 5: Create the timeline chart.

      var timeline = new gapi.analytics.googleCharts.DataChart({
        reportType: 'ga',
        query: {
          'dimensions': 'ga:date',
          'metrics': 'ga:sessions',
          'start-date': '30daysAgo',
          'end-date': 'yesterday',
        },
        chart: {
          type: 'LINE',
          container: 'timeline'
        }
      });

      // Step 6: Hook up the components to work together.

      gapi.analytics.auth.on('success', function(response) {
        viewSelector.execute();
      });

      viewSelector.on('change', function(ids) {
        var newIds = {
          query: {
            ids: ids
          }
        }
        timeline.set(newIds).execute();
      });
    });
</script>

</div>

</div>


<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>

  <h1>Welcome to the tenants dashboard</h1>

  <p>

    You can manage the detail and add request with the buttons on the left:<br>

  </p>

<?php endif; ?>