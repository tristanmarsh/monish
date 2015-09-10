<?php
    $this->Html->addCrumb('Internet Plan', array('controller' => 'students', 'action' => 'index'));

?>

<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<?php if ($currentlogged['role'] === "admin") : ?>


            <?php
                $this->Html->addCrumb('Students', 'students');
            ?>

            <h1>Manage Students</h1>
            <?= $this->Html->link('Add Student', ['action' => 'add']) ?>
            
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
						<?= $student->has('person') ? $this->Html->link($student->person->last_name, ['controller' => 'People', 'action' => 'view', $student->person->id]) : '' ?>
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
            <div class="paginator text-center">
                


<ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>

<?php endif; ?>

<?php if ($currentlogged['role'] === "tenant") : ?>





        <h1>Internet Plan</h1>

    <div class="panel panel-primary">
            <div class="panel-heading">
        <h2 class="panel-title">Current Plan</h2>
    </div>
    <!-- Default panel contents -->




            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Internet Plan</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php foreach ($students as $student): ?>

                <?php if ($student->person_id === $currentlogged['person_id']) : ?>
                    <tr>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'students', 'action' => 'edit', $student->id]) ?>
                            <span>
                            <?= $student->person->first_name ?>
							<?= $student->person->last_name ?>
                        </span>
                        </td>
                        <td>
                            <?= $this->Html->link("", ['controller'=>'students', 'action' => 'edit', $student->id]) ?>
                            <span>
                            <?= $student->internet_plan ?>
                        </span>
                        </td>
                        <td class="action action-edit">
                            <?php
                                echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', [ 'action' => 'edit', $student->id], ['escape' => false]);

                                ?>


                        </td>
                    </tr>
                <?php endif; ?>

            <?php endforeach; ?>

		</table>
    </div>
        <div class="panel panel-primary">
	    <div class="panel-heading">
        <h2 class="panel-title">Available Internet Plans</h2>
    </div>	
		
		<table >
            <thead>
			<tr>
				<th>Type</th>
				<th>Data</th>
				<th>Price</th>
			</tr>
        </thead>
        <tbody>
			<tr>				
				<td> <span>Free</span> </td>
				<td> <span>1 Gigabyte / Month/</span> </td>
				<td> <span>Free (Speed is limited)</span> </td>
			</tr>
			<tr>				
				<td> <span>Basic</span> </td>
				<td> <span>50 Gigabyte / Month</span> </td>
				<td> <span>$30 / Month</span> </td>
			</tr>
			<tr>				
				<td> <span>Standard</span> </td>
				<td> <span>80 Gigabyte / Month</span> </td>
				<td> <span> $55 / Month</span></td>
			</tr>
			<tr>				
				<td> <span>Premium</span> </td>
				<td> <span> 120 Gigabyte / Month</span></td>
				<td> <span>$120 / Month</span> </td>
			</tr>
        </tbody>    
		</table>




<?php endif; ?>
</div>

