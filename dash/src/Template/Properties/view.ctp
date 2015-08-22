<?php
    $this->Html->addCrumb('Properties', '/properties');
    $this->Html->addCrumb('View Property');
?>
<h2>Property Details</h2>

    <div class="panel panel-default clearfix">
        
        <div class="panel-body">
            
            <ul class="nav nav-pills pull-left">
                <li role="presentation" class="active"><a href="#">Do Something With this Property</a></li>
                <li role="presentation"><a href="#">Do Something Else</a></li>
            </ul>

        </div>

        <div class="panel-footer">

            <ul class="nav nav-pills pull-left">
                <li role="presentation" class="active"><a href="#">Imagine</a></li>
                <li role="presentation"><a href="#">Secondary</a></li>
                <li role="presentation"><a href="#">Buttons</a></li>
            </ul>

        </div>

    </div>


<div class="panel panel-main">

    <table>

            <h6 class="subheader"><?= __('Address') ?></h6>
            <p><?= h($property->address) ?></p>
            <h6 class="subheader"><?= __('Garage') ?></h6>
            <p><?= h($property->garage) ?></p>

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

    </table>

        <h4>Related Rooms</h4>
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
        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Properties', 'action' => 'index']
        ])?>
        <?= $this->Form->button(__('Cancel')) ?>

</div>
