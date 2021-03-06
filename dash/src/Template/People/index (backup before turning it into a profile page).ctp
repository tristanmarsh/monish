<?php
    // $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('Profile', array('controller' => 'People', 'action' => 'index'));
?>

<!-- File: src/Template/People/index.ctp -->
<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<!-- THIS IS WHAT THE ADMINISTRATOR SEES -->
<?php if ($currentlogged['role'] === "admin") : ?>


    <h1>Manage People</h1>
    <?= $this->Html->link('Add Person', ['action' => 'add']) ?>
    <div class="table-responsive">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Common Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->first_name ?></td>
                <td><?= $user->last_name ?></td>
                <td><?= $user->common_name ?></td>
                <td><?= $user->gender ?></td>
                <td><?= $user->phone ?></td>
                <td><?= $user->email ?></td>
                <td>
                    <?php if ($user['id'] == '1') // Admin cannot delete themselves (well they can, but they have to type the url in.)
                    {echo $this->Html->link('Edit', ['action' => 'edit', $user->id]);}
                    else
                    {
                        echo $this->Form->postLink(
                            'Delete',
                            ['action' => 'delete', $user->id],
                            ['confirm' => 'Are you sure?']);
                        echo " "; // this puts a space between Delete and Edit button
                        echo $this->Html->link('Edit', ['action' => 'edit', $user->id]);
                    };
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</div class="content">

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

                <th><?= $this->Paginator->sort('First Name') ?></th>
                <th><?= $this->Paginator->sort('Last Name') ?></th>
                <th><?= $this->Paginator->sort('Common Name') ?></th>
                <th><?= $this->Paginator->sort('Gender') ?></th>
                <th><?= $this->Paginator->sort('Phone') ?></th>
                <th><?= $this->Paginator->sort('Email') ?></th>
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