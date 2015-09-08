

<?php
    // $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('Emergency Contacts', array('controller' => 'Emergencies', 'action' => 'index'));
?>
<h1>Emergency Contacts</h1>
<div class="panel panel-default clearfix">
    
    <div class="panel-body">

        <div class="col-sm-6">
            <ul class="nav nav-pills pull-left">
                <li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'Index']) ?></li>
                <li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
            </ul>
            
        </div>

        <div class="col-sm-6">

            <div class="input-group input-lg pull-right">
                <input type="text" class="form-control" placeholder="Search" id="myInputTextField">
                <div class="input-group-btn">
                    
                    <!-- Single button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>

                </div>
            </div>

        </div>

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
    <h2 class="panel-title">All Emergencies</h2>
</div>


  <!-- Table -->
    <div class="table-responsive">
        <table class="datatable">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
<!--             <th class="actions"><?= __('Actions') ?></th> -->
        </tr>
    </thead>
  
    <?php foreach ($query as $emergency): ?>
        <tr>
            <td> 
<!--                 <?= $this->Html->link("", ['controller'=>'emergencies', 'action' => 'view', $emergency->id]) ?> -->
                <span>
                <?= h($emergency->first_name) ?>
            </span>
            </td>
            <td>
<!--                 <?= $this->Html->link("", ['controller'=>'emergencies', 'action' => 'view', $emergency->id]) ?> -->
                <span><?= h($emergency->last_name) ?></span>
                </td>
            <td>
<!--                 <?= $this->Html->link("", ['controller'=>'emergencies', 'action' => 'view', $emergency->id]) ?> -->
                <span><?= h($emergency->phone) ?></span>
                </td>
            <td>
<!--                 <?= $this->Html->link("", ['controller'=>'emergencies', 'action' => 'view', $emergency->id]) ?> -->
                <span><?= h($emergency->email) ?></span>
                </td>
<!--             <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $emergency->id]) ?> -->
<!--                 <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emergency->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emergency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emergency->id)]) ?> -->
<!--             </td> -->
        </tr>


    <?php endforeach; ?>
    </tbody>
    </table>
     <div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>
    </div>
    </div>



        


<!--           <paginator>
            <?php echo $this->element('paginator'); ?>
          </paginator> -->


