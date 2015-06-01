
<div class="leases form large-10 medium-9 columns">
    <?= $this->Form->create($lease); ?>
    <fieldset>
        <legend><?= __('Edit Lease') ?></legend>
        <?php
            echo $this->Form->input('room_id', ['options' => $rooms]);
            echo $this->Form->input('student_id', ['options' => $students]);
            echo $this->Form->input('date_start');
            echo $this->Form->input('date_end');
            echo $this->Form->input('lease_status');
            echo $this->Form->input('weekly_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Leases', 'action' => 'index']
    ])?>
    <?= $this->Form->button(__('Cancel')) ?>
</div>
