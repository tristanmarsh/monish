<?php $user = $this->Session->read('Auth.User'); ?>

<!-- Tristan's Adorable/Gravatar Avatar Script -->
<?php
  $email = $user['username'];
  $emailHash = md5( strtolower( trim( $email ) ) );

  $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
  $defaultImageQuery = urlencode($defaultImageQuery);

  $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;
  
  $gravatarImage = '<img height="200px" width="200px" class="img img-rounded gravatar" src="' . $gravatarQuery . '"/>';

?>

<?php
    // $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('Profile', array('controller' => 'People', 'action' => 'index'));
?>

<!-- File: src/Template/People/index.ctp -->
<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<!-- THIS IS WHAT THE ADMINISTRATOR SEES -->
<?php if ($currentlogged['role'] === "admin") : ?>


    <h1>
        <?php 
            $personEntity = $peopleTable->get($user['person_id']);
            echo $personEntity->first_name." ".$personEntity->last_name;
        ?>
    </h1>
    
    <?php 
        echo $gravatarImage;
        echo '<br><br>'."You are an Administrator. That's all we know about you.";
    ?>    
    <?php echo $this->Html->link('Edit Username', ['controller' => 'users', 'action' => 'editusername', $currentlogged['id'], ]); ?>
                <?php echo $this->Html->link('Edit Password', ['controller' => 'users', 'action' => 'editpassword', $currentlogged['id'], ]); ?>

<?php endif; ?>

<!-- THIS IS WHAT THE TENANTS SEES -->
<?php if ($currentlogged['role'] === "tenant") : ?>

    <h1>Profile</h1>
    <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">All Requests</h2>
    </div>
    <div class="table-responsive">

        <table>
            <tr>

                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($users as $user): ?>

            <?php if ($currentlogged['person_id'] === $user->id) : ?>

            <tr>

                <td><?= $user->first_name ?></td>
                <td><?= $user->last_name ?></td>
                <td><?= $user->common_name ?></td>
                <td><?= $user->gender ?></td>
                <td><?= $user->phone ?></td>
                <td><?= $user->email ?></td>
                <td>
                <?php echo $this->Html->link('Edit Phone Number', ['action' => 'edit', $user->id, ]); ?>
                <?php echo $this->Html->link('Edit Username', ['controller' => 'users', 'action' => 'editusername', $currentlogged['id'], ]); ?>
                <?php echo $this->Html->link('Edit Password', ['controller' => 'users', 'action' => 'editpassword', $currentlogged['id'], ]); ?>
            </td>

            </tr>

            <?php endif; ?>

            <?php endforeach; ?>

        </table>
    </div>

    </div>

<?php endif; ?>