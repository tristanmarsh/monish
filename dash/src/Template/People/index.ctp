<?php $user = $this->Session->read('Auth.User'); ?>

<!-- Tristan's Adorable/Gravatar Avatar Script -->
<?php
  $email = $user['username'];
  $emailHash = md5( strtolower( trim( $email ) ) );

  $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
  $defaultImageQuery = urlencode($defaultImageQuery);

  $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;
  
  $gravatarImage = '<img height="200px" width="200px" class="img img-responsive img-center gravatar" src="' . $gravatarQuery . '"/>';

?>

<?php
    $this->Html->addCrumb('Profile', array('controller' => 'People', 'action' => 'index'));
?>

<!-- File: src/Template/People/index.ctp -->
<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<!-- THIS IS WHAT THE ADMINISTRATOR SEES -->
<?php if ($currentlogged['role'] === "admin") : ?>
    
  <h1>
    <?php $personEntity = $peopleTable->get($user['person_id']);
    echo $personEntity->first_name." ".$personEntity->last_name; ?>
  </h1>
 
  <div class="alert alert-alternative-info alert-dismissible" role="alert">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <span>Your unique avatar has been provided by <a href="http://avatars.adorable.io/">Adorable Avatars</a> from your email address.</span>
    <span>To manage your avatar, create a <a href="https://en.gravatar.com/">Gravatar</a> Account.</span>
  </div>

  <div class="panel panel-default panel-actionbar clearfix">

    <div class="panel-body">

      <?= $this->Html->link(
        '<i class="fa fa-eye"></i> View',
        ['action' => 'index'],
        ['class' => 'button button-pill button-primary active', 'escape' => false]
        ); ?>

      </div>

      <div class="panel-footer">

        <?= $this->Html->link(
          '<i class="fa fa-pencil"></i> Change Username',
          ['controller' => 'users', 'action' => 'editusername', $currentlogged['id']],
          ['class' => 'button button-pill button-primary', 'escape' => false]
          ); ?>

        <?= $this->Html->link(
          '<i class="fa fa-pencil"></i> Change Password',
          ['controller' => 'users', 'action' => 'editpassword', $currentlogged['id']],
          ['class' => 'button button-pill button-primary', 'escape' => false]
          ); ?>

        </div>

      </div>

      <?php 
      echo $gravatarImage;
        // echo '<br><br>'."You are an Administrator. That's all we know about you.";
      ?>    



<?php endif; ?>

<!-- THIS IS WHAT THE TENANTS SEES -->
<?php if ($currentlogged['role'] === "tenant") : ?>
    
    <!-- Here is where we iterate through our $articles query object, printing out article info -->
    <?php foreach ($users as $user): ?>
    <?php if ($currentlogged['person_id'] === $user->id) : ?>


    <h1>Profile</h1>

    <div class="alert alert-alternative-info alert-dismissible" role="alert">
      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span>Your unique avatar has been provided by <a href="http://avatars.adorable.io/">Adorable Avatars</a> from your email address.</span>
      <span>To manage your avatar, create a <a href="https://en.gravatar.com/">Gravatar</a> Account.</span>
    </div> 

    <div class="panel panel-default panel-actionbar clearfix">

      <div class="panel-body">

          <?= $this->Html->link(
          '<i class="fa fa-eye"></i> View',
          ['action' => 'index'],
          ['class' => 'button button-pill button-primary active', 'escape' => false]
          ); ?>

      </div>

      <div class="panel-footer">

        <?= $this->Html->link(
      '<i class="fa fa-phone"></i> Change Phone Number',
      ['action' => 'edit',$user->id ],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Change Username',
       ['controller' => 'users', 'action' => 'editusername', $currentlogged['id']],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Change Password',
      ['controller' => 'users', 'action' => 'editpassword', $currentlogged['id']],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>

      </div>

    </div>


    <div class="row">
      
      <div class="col-sm-3">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">Profile Picture</h2>
          </div>
            <?= $gravatarImage; ?>
        </div>
      </div>

      <div class="col-sm-9">
        
        <div class="panel panel-primary">

          <div class="panel-heading">
            <h2 class="panel-title">Personal Details</h2>
          </div>

          <div class="table-responsive">

            <table>

              <thead>

                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Contact Number</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Email</th>
                </tr>

              </thead>

              <tr>
                <td><?= $user->first_name ?></td>
                <td><?= $user->last_name ?></td>
                <td><?= $user->common_name ?></td>
                <td><?= $user->gender ?></td>
                <td><?= $user->phone ?></td>
                <td><?= $user->email ?></td>
              </tr>

              <?php endif; ?>

              <?php endforeach; ?>

              </table>

            </div>

          </div>

        </div>

      </div>

<?php endif; ?>