<!-- File: src/Template/Users/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>
</div><!-- /.escape row -->
</div><!-- /.escape content -->
</div><!-- /.escape container -->

<div class="col-sm-3 sidebar">

    <?php echo $this->element('admin-sidebar'); ?>
        
</div>
<div class="col-sm-9">

    <div class="content">
        <h3>Manage Users</h3>
        <?= $this->Html->link('Add User', ['action' => 'add']) ?>
        <span style="float:right"><?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
        <table>
            <tr>
        		<th>Username</th>
                <th>Role</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Action</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($users as $user): ?>
                <tr>
        			<td>
                        <?= $user->username ?>
                    </td>
                    <td>
                        <?= $user->role ?>
                    </td>
                    <td>
                        <?= $user->created//->format(DATE_RFC850) ?>
                    </td>
                    <td>
                        <?= $user->modified//->format(DATE_RFC850) ?>
                    </td>
                    <td>
        				<?php if ($user['role'] === 'admin') // Admin cannot delete themselves (well they can, but they have to type the url in.)
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

           </div>

    </div>

