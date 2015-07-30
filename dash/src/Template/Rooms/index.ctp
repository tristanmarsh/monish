
			
			<h3>Manage Rooms</h3>
            <?= $this->Html->link(__('Add New Room'), ['action' => 'add']) ?>
            
            <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('room_name') ?></th>
                    <th><?= $this->Paginator->sort('property_id') ?></th>
                    <th><?= $this->Paginator->sort('Vacant') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?= h($room->room_name) ?></td>
                    <td>
                        <?= $room->has('property') ? $this->Html->link($room->property->address, ['controller' => 'Properties', 'action' => 'view', $room->property->id]) : '' ?>
                    </td>
                    <td><?= h($room->vacant) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $room->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
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
            <p>
                <?php
                echo "Back to ";
                echo $this->Html->link('Dashboard', ['controller' => '', 'action' => 'index']);
                ?>
            </p>
