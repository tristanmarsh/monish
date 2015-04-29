<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit This Property'), ['action' => 'edit', $property->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete This Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
        <li><?= $this->Html->link(__('List All Properties'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="properties view large-10 medium-9 columns">
    <h2>Property Details</h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Address') ?></h6>
            <p><?= h($property->address) ?></p>
            <h6 class="subheader"><?= __('Garage') ?></h6>
            <p><?= h($property->garage) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($property->id) ?></p>
            <h6 class="subheader"><?= __('Number Rooms') ?></h6>
            <p><?= $this->Number->format($property->number_rooms) ?></p>
            <h6 class="subheader"><?= __('Bathrooms') ?></h6>
            <p><?= $this->Number->format($property->bathrooms) ?></p>
            <h6 class="subheader"><?= __('Kitchens') ?></h6>
            <p><?= $this->Number->format($property->kitchens) ?></p>
            <h6 class="subheader"><?= __('Storeys') ?></h6>
            <p><?= $this->Number->format($property->storeys) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Rooms') ?></h4>
    <?php if (!empty($property->rooms)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Room Name') ?></th>
            <th><?= __('Vacant') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($property->rooms as $rooms): ?>
        <tr>
            <td><?= h($rooms->room_name) ?></td>
            <td><?= h($rooms->vacant) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Rooms', 'action' => 'view', $rooms->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Rooms', 'action' => 'edit', $rooms->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rooms', 'action' => 'delete', $rooms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rooms->id)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
