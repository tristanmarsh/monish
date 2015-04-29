<div class="actions columns large-2 medium-3">
    <h3><?= __('Menu') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit This Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete This Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List All Rooms'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="rooms view large-10 medium-9 columns">
    <h2><?= h($room->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Property') ?></h6>
            <p><?= $room->has('property') ? $this->Html->link($room->property->address, ['controller' => 'Properties', 'action' => 'view', $room->property->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($room->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Vacant') ?></h6>
            <?= $this->Text->autoParagraph(h($room->vacant)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Leases') ?></h4>
    <?php if (!empty($room->leases)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Student Id') ?></th>
            <th><?= __('Date Start') ?></th>
            <th><?= __('Date End') ?></th>
            <th><?= __('Lease Status') ?></th>
            <th><?= __('Weekly Price') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($room->leases as $leases): ?>
            <?php foreach ($lion as $lions): ?>
        <tr>
            <td><?= h($lions) ?></td>
            <td><?= h($leases->date_start->format('Y M d')) ?></td>
            <td><?= h($leases->date_end->format('Y M d')) ?></td>
            <td><?= h($leases->lease_status) ?></td>
            <td><?= h($this->Number->currency($leases->weekly_price)) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Leases', 'action' => 'view', $leases->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Leases', 'action' => 'edit', $leases->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leases', 'action' => 'delete', $leases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leases->id)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
