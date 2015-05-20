<!-- File: src/Template/People/index.ctp -->
<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<?php if ($currentlogged['role'] === "admin") : ?>

    </div><!-- /.escape row -->
    </div><!-- /.escape content -->
    </div><!-- /.escape container -->
    <div class="col-sm-3 sidebar">

        <?php echo $this->element('admin-sidebar'); ?>

    </div>
    <div class="col-sm-9">

        <div class="content">
        <h1>Manage People</h1>
    <?= $this->Html->link('Add Person', ['action' => 'add']) ?>
    <span style="float:right"><?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <!-- Here is where we iterate through our $articles query object, printing out article info -->

        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?= $user->first_name ?>
                </td>
                <td>
                    <?= $user->last_name ?>
                </td>
                <td>
                    <?= $user->gender ?>
                </td>
                <td>
                    <?= $user->phone ?>
                </td>
                <td>
                    <?= $user->email ?>
                </td>
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

    <p>
        <?php
            echo "Back to ";
            echo $this->Html->link('Dashboard', ['controller' => '', 'action' => 'index']);
        ?>
    </p>
            </div class="content">

<?php endif; ?>

<?php if ($currentlogged['role'] === "tenant") : ?>

    </div><!-- /.escape row -->
    </div><!-- /.escape content -->
    </div><!-- /.escape container -->

    <div class="col-sm-3 sidebar">

        <?php echo $this->element('tenant-sidebar'); ?>

    </div>

    <div class="col-sm-9">

        <div class="content">

            <h3>Manage Personal Details</h3>

        </div>

    </div>

    <div class="col-sm-9">

    <div class="content">

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <!-- Here is where we iterate through our $articles query object, printing out article info -->

        <?php foreach ($users as $user): ?>
            <?php if ($currentlogged['person_id'] === $user->id) : ?>
                <tr>
                    <td>
                        <?= $user->first_name ?>
                    </td>
                    <td>
                        <?= $user->last_name ?>
                    </td>
                    <td>
                        <?= $user->gender ?>
                    </td>
                    <td>
                        <?= $user->phone ?>
                    </td>
                    <td>
                        <?= $user->email ?>
                    </td>
                    <td>
                        <?php if ($user['role'] === 'admin') // Admin cannot delete themselves (well they can, but they have to type the url in.)
                        {echo $this->Html->link('Edit', ['action' => 'edit', $user->id]);}
                        else
                        {
                            echo $this->Html->link('View', ['action' => 'view', $user->id]);
                            echo " "; // this puts a space between Edit and View button
                            echo $this->Html->link('Edit', ['action' => 'edit', $user->id]);
                        };
                        ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>

<?php endif; ?>