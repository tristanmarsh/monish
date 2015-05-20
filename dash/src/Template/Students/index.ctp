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
            <?php
                $this->Html->addCrumb('Users', '/users');
                $this->Html->addCrumb('Add User', array('controller' => 'users', 'action' => 'add'));
            ?>

            <h1>Manage Students</h1>
            <?= $this->Html->link('Add Student', ['action' => 'add']) ?>
            <span style="float:right"><?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
            <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <!--<th><?= $this->Paginator->sort('id') ?></th>-->
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('internet_plan') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <!--<td><?= $this->Number->format($student->id) ?></td>-->
                    <td>
                        <?= $student->has('person') ? $this->Html->link($student->person->first_name, ['controller' => 'People', 'action' => 'view', $student->person->id]) : '' ?>
                    </td>
                    <td>
                        <?= $student->internet_plan ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
            <p>
                <?php
                echo "Back to ";
                echo $this->Html->link('Dashboard', ['controller' => '', 'action' => 'index']);
                ?>
            </p>
                 </div>

    </div>

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

        </div>

    </div>

    <div class="col-sm-9">

    <div class="content">

        <h1>Manage Internet Plan</h1>

        <table cellpadding="0" cellspacing="0">

            <table>
                <tr>
                    <th>Name</th>
                    <th>Internet Plan</th>
                    <th>Action</th>
                </tr>

            <?php foreach ($students as $student): ?>

                <?php if ($student->person_id === $currentlogged['person_id']) : ?>
                    <tr>
                        <td>
                            <?= $student->has('person') ? $this->Html->link($student->person->first_name, ['controller' => 'People', 'action' => 'view', $student->person->id]) : '' ?>
                        </td>
                        <td>
                            <?= $student->internet_plan ?>
                        </td>
                        <td>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                        </td>
                    </tr>
                <?php endif; ?>

            <?php endforeach; ?>

		</table>
		
		Available Internet Plans
		<table>
			<tr>
				<th>Type</th>
				<th>Data</th>
				<th>Price</th>
			</tr>
			<tr>				
				<td>Free</td>
				<td>1 Gigabyte / Month</td>
				<td>Free (Speed is limited)</td>
			</tr>
			<tr>				
				<td>Basic</td>
				<td>50 Gigabyte / Month</td>
				<td>$30 / Month</td>
			</tr>
			<tr>				
				<td>Standard</td>
				<td>80 Gigabyte / Month</td>
				<td>$55 / Month</td>
			</tr>
			<tr>				
				<td>Premium</td>
				<td>120 Gigabyte / Month</td>
				<td>$120 / Month</td>
			</tr>
		</table>

    </div>

    </div>

<?php endif; ?>

