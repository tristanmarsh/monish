<h3>Tenant Details</h3>

<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Common Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Internet Plan</th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $person->first_name ?></td>
            <td><?= $person->last_name ?></td>
            <td><?= $person->common_name ?></td>
            <td><?= $person->gender ?></td>
            <td><?= $person->phone ?></td>
            <td><?= $person->email ?></td>
            <td><?= $person->student->internet_plan ?></td>
            <td class="actions"> 
                <?= $this->Html->link(__('Edit'), ['controller' => 'tenants', 'action' => 'edit', $person->user->id]) ?>
            </td>
        </tr>
    </tbody>
</table>

<div class="related row">
    <div class="column large-12">
        <h4 class="subheader"><?= __('Related Leases') ?></h4>
        <?php if (!empty($student->leases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Property') ?></th>
                <th><?= __('Room') ?></th>
                <th><?= __('Date Start') ?></th>
                <th><?= __('Date End') ?></th>
                <th><?= __('Weekly Price') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($query as $leases): ?>
            <tr>
                <td><?= $leases->property->address ?></td>
                <td><?= $leases->room->room_name ?></td>
                <td><?= h($leases->date_start->format('Y M d')) ?></td>
                <td><?= h($leases->date_end->format('Y M d')) ?></td>
                <td><?= h($this->Number->currency($leases->weekly_price)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Leases', 'action' => 'edit', $leases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leases', 'action' => 'delete', $leases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leases->id)]) ?>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<div class="related row">
    <div class="column large-12">
        <h4 class="subheader"><?= __('Related Emergency Contacts') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($emergencyQuery as $emergency): ?>
                <tr>
                    <td><?= $emergency->first_name ?></td>
                    <td><?= $emergency->last_name ?></td>
                    <td><?= $emergency->phone ?></td>
                    <td><?= $emergency->email ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Emergencies', 'action' => 'edit', $emergency->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Emergencies', 'action' => 'delete', $emergency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leases->id)]) ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="related row">
<h4 class="subheader">Registered Devices</h4>
<table>
    <tr>
        <th>#</th>
        <th>Device Name</th>
        <th>Mac Address</th>
    </tr>
    <!-- ONE -->
    <tr>
        <td><strong>1</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_one === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_one ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_one === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_one ?>
        </td>
    </tr>
    <!-- TWO -->
    <tr>
        <td><strong>2</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_two === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_two ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_two === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_two ?>
        </td>
    </tr>
    <!-- THREE -->
    <tr>
        <td><strong>3</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_three === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_three ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_three === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_three ?>
        </td>
    </tr>
    <!-- FOUR -->
    <tr>
        <td><strong>4</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_four === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_four ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_four === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_four ?>
        </td>
    </tr>
    <!-- FIVE -->
    <tr>
        <td><strong>5</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_five === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_five ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_five === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_five ?>
        </td>
    </tr>
    <!-- SIX -->
    <tr>
        <td><strong>6</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_six === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_six ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_six === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_six ?>
        </td>
    </tr>
    <!-- SEVEN -->
    <tr>
        <td><strong>7</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_seven === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_seven ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_seven === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_seven ?>
        </td>
    </tr>
    <!-- EIGHT -->
    <tr>
        <td><strong>8</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_eight === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_eight ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_eight === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_eight ?>
        </td>
    </tr>
    <!-- NINE -->
    <tr>
        <td><strong>9</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_nine === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_nine ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_nine === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_nine ?>
        </td>
    </tr>
    <!-- TEN -->
    <tr>
        <td><strong>10</strong></td>
        <td>
            <?php if ($person->macaddress->device_name_ten === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->device_name_ten ?>
        </td>
        <td>
            <?php if ($person->macaddress->mac_address_ten === "") : ?>
            <?php endif; ?>
            <?= $person->macaddress->mac_address_ten ?>
        </td>
    </tr>
</table>
</div>

<a href="javascript: window.history.back()">Go Back</a>