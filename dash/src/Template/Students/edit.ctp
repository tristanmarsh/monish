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

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

    <?= $this->Html->link(
        '<i class="glyphicon glyphicon-globe"></i> Current',
        ['action' => 'index'],
        ['class' => 'button button-pill button-primary', 'escape' => false]
    ); ?>

  </div>

  <div class="panel-footer">
    <?= $this->Html->link(
      '<i class="fa fa-arrow-up"></i> Change Internet Plan',
      ['controller'=>'students', 'action' => 'edit', $student->id],
      ['class' => 'button button-pill button-action', 'escape' => false]
    ); ?>
  </div>

</div>


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title">Select Internet Plan</h2>

                      </div>
    <div class="students form large-10 medium-9 columns">
        <div class="panel-body">
        <?= $this->Form->create($student, array('class' => 'form-group')); ?>
        <fieldset>
            <?php
            echo $this->Form->input('internet_plan', ['options' => ['Free' => 'Free', 'Basic' => 'Basic', 'Standard' => 'Standard', 'Premium' => 'Premium'], 'class' => 'form-control']);
            ?>
            <br>
        <?= $this->Form->button('<i class="fa fa-arrow-up"></i> Change Internet Plan', ['class' => 'form-control button button-action button-3d']); ?>
        <?= $this->Form->end() ?>
        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Students', 'action' => 'index']
        ])?>
        </fieldset>
            </div>
        </div>
    </div>
            <div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title">Available Internet Plans</h2>
    </div>  
        
        <table>
            <thead>
            <tr>
                <th>Type</th>
                <th>Data</th>
                <th>Price</th>
            </tr>
        </thead>
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