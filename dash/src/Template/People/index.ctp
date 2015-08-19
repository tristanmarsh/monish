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

    <h1>Manage Personal Details</h1>
    
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

            <?php if ($currentlogged['person_id'] === $user->id) : ?>

            <tr>

                <td><?= $user->first_name ?></td>
                <td><?= $user->last_name ?></td>
                <td><?= $user->common_name ?></td>
                <td><?= $user->gender ?></td>
                <td><?= $user->phone ?></td>
                <td><?= $user->email ?></td>
                <td>
                <?php echo $this->Html->link('Edit Phone Number', ['action' => 'edit', $user->id, ]); ?><br>
                <?php echo $this->Html->link('Edit Login Details', ['controller' => 'users', 'action' => 'edit', $currentlogged['id'], ]); ?>
            </td>

            </tr>

            <?php endif; ?>

            <?php endforeach; ?>

        </table>

    </div>

<?php endif; ?>