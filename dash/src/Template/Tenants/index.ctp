<h1>Tenants</h1>

          <panel>
            <?php echo $this->element('panel'); ?>
          </panel>



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
                    <td><?= $person->first_name ?></td>
                    <td><?= $person->last_name ?></td>
                    <td><?= $person->common_name ?></td>
                    <td><?= $person->gender ?></td>
                    <td><?= $person->phone ?></td>
                    <td><?= $person->email ?></td>
                    <td><?= $person->student->internet_plan ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('More Details'), ['controller' => 'tenants', 'action' => 'view', $person->id]) ?>
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