<?php
    $this->Html->addCrumb('Leases', '/leases');
?>
<h1>Leases</h1>

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
    <h2 class="panel-title">All Leases</h2>
</div>


  <!-- Table -->
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="">
    <thead>
      <tr>
        <th><?= $this->Paginator->sort('property_id') ?></th>
        <th><?= $this->Paginator->sort('room_id') ?></th>
        <th><?= $this->Paginator->sort('student_id') ?></th>
        <th><?= $this->Paginator->sort('date_start') ?></th>
        <th><?= $this->Paginator->sort('date_end') ?></th>
        <th><?= $this->Paginator->sort('weekly_price') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($leases as $lease): ?>

      <tr>
        <td>
          <?= $lease->property->address ?>
          <?= $this->Html->link("", ['action' => 'view', $lease->id]) ?>

        </td>
        <td>
          <?= $lease->room->room_name ?>
        </td>
        <td>
          <?php
          $person = $walrus->get($lease->student->person_id);
          ?>
          <?= $person->first_name ?>
          <?= $person->last_name ?>
        </td>
        <td><?= h($lease->date_start->format('Y M d')) ?></td>
        <td><?= h($lease->date_end->format('Y M d')) ?></td>
        <td><?= $this->Number->currency($lease->weekly_price) ?></td>
        <td class="actions">
          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lease->id]) ?>
          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lease->id)]) ?>
        </td>
      </tr>

      <?php endforeach; ?>
      
    </tbody>
  </table>
</div>

</div>


          <paginator>
            <?php echo $this->element('paginator'); ?>
          </paginator>

  <script>
    $("table").on("click", "tr", function(e) {
        if ($(e.target).is("a,input")) // anything else you don't want to trigger the click
            return;
        location.href = $(this).find("a").attr("href");
    });
</script>