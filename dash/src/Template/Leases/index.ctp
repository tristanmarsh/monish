

            <h3>Manage Leases</h3>
            <?= $this->Html->link(__('Add New Lease'), ['action' => 'add']) ?>
            
            <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('property_id') ?></th>
					<th><?= $this->Paginator->sort('room_id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('date_start') ?></th>
                    <th><?= $this->Paginator->sort('date_end') ?></th>
                    <th><?= $this->Paginator->sort('weekly_price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($leases as $lease): ?>
                <tr>
                    <td>
                        <?= $lease->has('room') ? $this->Html->link($lease->property->address, ['controller' => 'Properties', 'action' => 'view', $lease->property->id]) : '' ?>
                    </td>
					<td>
                        <?= $lease->has('room') ? $this->Html->link($lease->room->room_name, ['controller' => 'Rooms', 'action' => 'view', $lease->room->id]) : '' ?>
                    </td>
                    <td>
                        <?= $lease->has('student') ? $this->Html->link($lease->student->id, ['controller' => 'Students', 'action' => 'view', $lease->student->id]) : '' ?>
                    </td>
                    <td><?= h($lease->date_start->format('Y M d')) ?></td>
                    <td><?= h($lease->date_end->format('Y M d')) ?></td>
                    <td><?= $this->Number->currency($lease->weekly_price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lease->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lease->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lease->id)]) ?>
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
 