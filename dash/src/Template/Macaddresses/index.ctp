<?php
    $this->Html->addCrumb('Mac Address', array('controller' => 'Macaddresses', 'action' => 'index'));

?>



<!-- File: src/Template/Requests/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

<!-- START OF WHAT ADMINISTRATORS SEES -->
<?php if ($user['role'] === "admin") : ?>


<!-- START OF WHAT TENANTS SEES -->
<?php elseif ($user['role'] === "tenant") : ?>

    <h1>Registered Devices</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active">
                <?= $this->Html->link('All', ['action' => 'index']) ?>
            </li>
            <li role="presentation">
                <?= $this->Html->link('Update Devices', ['action' => 'edit', $personEntity->macaddress->id]) ?>
            </li>
            <li role="presentation">
                <a class="btn float-right" href="http://www.wikihow.com/Find-the-MAC-Address-of-Your-Computer">Help me find my MAC Address</a>
            </li>
        </ul>

    </div>

    <div class="panel-body">
        MAC address or Physical address, Looks like 34:45:56:ed:34:23 or 34-45-56-ed-34-23
    </div>

</div>

    

<div class="panel panel-primary">
    <div class="table-responsive">
        <table >
            <thead>
            <tr>
                <th>#</th>
                <th>Device Name</th>
                <th>Mac Address</th>
            </tr>
        </head>
            <!-- ONE -->
            <tbody>
            <tr>
                <td><strong>1</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_one === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_one ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_one === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_one ?>
                </td>
            </tr>
            <!-- TWO -->
            <tr>
                <td><strong>2</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_two === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_two ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_two === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_two ?>
                </td>
            </tr>
            <!-- THREE -->
            <tr>
                <td><strong>3</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_three === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_three ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_three === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_three ?>
                </td>
            </tr>
            <!-- FOUR -->
            <tr>
                <td><strong>4</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_four === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_four ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_four === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_four ?>
                </td>
            </tr>
            <!-- FIVE -->
            <tr>
                <td><strong>5</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_five === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_five ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_five === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_five ?>
                </td>
            </tr>
            <!-- SIX -->
            <tr>
                <td><strong>6</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_six === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_six ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_six === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_six ?>
                </td>
            </tr>
            <!-- SEVEN -->
            <tr>
                <td><strong>7</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_seven === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_seven ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_seven === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_seven ?>
                </td>
            </tr>
            <!-- EIGHT -->
            <tr>
                <td><strong>8</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_eight === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_eight ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_eight === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_eight ?>
                </td>
            </tr>
            <!-- NINE -->
            <tr>
                <td><strong>9</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_nine === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_nine ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_nine === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_nine ?>
                </td>
            </tr>
            <!-- TEN -->
            <tr>
                <td><strong>10</strong></td>
                <td>
                    <?php if ($personEntity->macaddress->device_name_ten === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->device_name_ten ?>
                </td>
                <td>
                    <?php if ($personEntity->macaddress->mac_address_ten === "") : ?>
                    <?php endif; ?>
                    <?= $personEntity->macaddress->mac_address_ten ?>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</div>

<?php endif; ?>