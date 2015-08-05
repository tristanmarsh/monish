<h1>Manage Emergency Contacts</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
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


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h2 class="panel-title">All Emergencies</h2>
</div>


  <!-- Table -->
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('first_name') ?></th>
            <th><?= $this->Paginator->sort('last_name') ?></th>
            <th><?= $this->Paginator->sort('phone') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
<!--             <th class="actions"><?= __('Actions') ?></th> -->
        </tr>
    </thead>
    <tbody>
    <?php foreach ($query as $emergency): ?>
        <tr>
            <td>
                <?= h($emergency->first_name) ?>
            </td>
            <td><?= h($emergency->last_name) ?></td>
            <td><?= h($emergency->phone) ?></td>
            <td><?= h($emergency->email) ?></td>
<!--             <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $emergency->id]) ?> -->
<!--                 <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emergency->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emergency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emergency->id)]) ?> -->
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

    <div class="paginator text-center">
        


          <paginator>
            <?php echo $this->element('paginator'); ?>
          </paginator>


