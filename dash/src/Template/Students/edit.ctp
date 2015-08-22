<?php
    $this->Html->addCrumb('Internet Plan', array('controller' => 'students', 'action' => 'index'));
    $this->Html->addCrumb('Change Internet plan');

?>



<?php $currentlogged = $this->Session->read('Auth.User'); ?>

<?php if ($currentlogged['role'] === "admin") : ?>


    <div class="students form large-10 medium-9 columns">
        <?= $this->Form->create($student); ?>
        <fieldset>
            <legend><?= __('Edit Student') ?></legend>
            <?php
                echo $this->Form->input('person_id', ['options' => $person]);
                echo $this->Form->input('internet_plan', ['options' => ['Free' => 'Free', 'Basic' => 'Basic', 'Standard' => 'Standard', 'Premium' => 'Premium']]);
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
    <h1>Internet Plan</h1>
    <div class="panel panel-primary">
    <div class="students form large-10 medium-9 columns">
        <?= $this->Form->create($student, array('class' => 'form-group')); ?>
        <fieldset>
            <legend><?= __('Select Plan', array('class' => 'form-control')) ?></legend>
            <?php
            echo $this->Form->input('internet_plan', ['options' => ['Free' => 'Free', 'Basic' => 'Basic', 'Standard' => 'Standard', 'Premium' => 'Premium'], 'class' => 'form-control']);
            ?>
            <br>
        <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-info']) ?>
        <?= $this->Form->end() ?>
        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Students', 'action' => 'index']
        ])?>
        </fieldset>
            </div>
    <div class="panel-heading">
        <h2 class="panel-title">Available Internet Plans</h2>
    </div>  
        
        <table>
            <tr>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;Type</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;Data</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;Price</th>
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

<!--         <?= $this->Form->button(__('Cancel')) ?> -->
			

	</div>

<?php endif; ?>