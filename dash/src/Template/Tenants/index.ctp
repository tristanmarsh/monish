<?php
    $this->Html->addCrumb('Tenants', '/tenants');
?>

<h1>Tenants</h1>

<div class="panel panel-default clearfix">
    
    <div class="panel-body">
        
        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
            <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
        </ul>

    </div>

<!--     <div class="panel-footer">

        <ul class="nav nav-pills pull-left">
            <li role="presentation" class="active"><a href="#">Imagine</a></li>
            <li role="presentation"><a href="#">Secondary</a></li>
            <li role="presentation"><a href="#">Buttons</a></li>
        </ul>

    </div> -->

</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h2 class="panel-title">All Tenants</h2>
</div>


  <!-- Table -->
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('common_name') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('internet_plan') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person): ?>
                <?php if (!($person->user->role === "admin")) : ?>
                <tr>
                    <td>
                        <?= $person->first_name ?>
                        <?= $this->Html->link("", ['action' => 'view', $person->id]) ?>
                    </td>
                    <td><?= $person->last_name ?></td>
                    <td><?= $person->common_name ?></td>
                    <td><?= $person->gender ?></td>
                    <td><?= $person->phone ?></td>
                    <td><?= $person->email ?></td>
                    <td><?= $person->student->internet_plan ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['controller' => 'tenants', 'action' => 'edit', $person->user->id]) ?>
                    </td>
                <?php endif; ?>
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
