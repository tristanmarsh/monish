<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<?php if ($currentlogged['role'] === "admin") : ?>


    <div class="students form large-10 medium-9 columns">
        <?= $this->Form->create($student); ?>
        <fieldset>
            <legend><?= __('Edit Student') ?></legend>
            <?php
                echo $this->Form->input('person_id', ['options' => $person]);
                echo $this->Form->input('internet_plan', ['options' => ['FREE' => 'FREE', 'BASIC' => 'BASIC', 'STANDARD' => 'STANDARD', 'PREMIUM' => 'PREMIUM']]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Students', 'action' => 'index']
        ])?>
        <?= $this->Form->button(__('Cancel')) ?>
    </div>

<?php endif; ?>

<?php if ($currentlogged['role'] === "tenant") : ?>

    <div class="students form large-10 medium-9 columns">
        <?= $this->Form->create($student); ?>
        <fieldset>
            <legend><?= __('Edit Student') ?></legend>
            <?php
            echo $this->Form->input('internet_plan', ['options' => ['NONE' => 'NONE', 'BASIC' => 'BASIC', 'STANDARD' => 'STANDARD', 'PREMIUM' => 'PREMIUM']]);
            ?>
        </fieldset>
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
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Students', 'action' => 'index']
        ])?>
        <?= $this->Form->button(__('Cancel')) ?>
			
    </div>
	

<?php endif; ?>