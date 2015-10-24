<?php
$this->Html->addCrumb('Emergency Contacts', array('controller' => 'Emergencies', 'action' => 'index'));
?>

<h1>Emergency Contacts</h1>

<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <div class="row">

      <div class="col-sm-6 clearfix">

        <div class="button-set">
          <?= $this->Html->link(
            '<i class="glyphicon glyphicon-user"></i> All',
            ['action' => 'index'],
            ['class' => 'button button-pill button-primary active', 'escape' => false]
          ); ?>
        </div>

        <?= $this->Html->link(
          '<i class="fa fa-plus"></i> New Emergency Contact',
          ['action' => 'add'],
          ['class' => 'button button-pill button-action', 'escape' => false]
        ); ?>

      </div>


      <div class="col-sm-6 clearfix">

        <form class="searchbox">
        <input type="search" id="myInputTextField" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
        <input type="submit" class="searchbox-submit" value="Go">
        <span class="searchbox-icon"><i class="fa fa-search"></i></span>
        </form>

      </div>

    </div>

  </div>

</div>


  <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h2 class="panel-title">All Emergency Contacts</h2>
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

            <!-- Tristan's Adorable/Gravatar Avatar Script -->
            <?php
            $email = $emergency->email;
            $emailHash = md5( strtolower( trim( $email ) ) );

            $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
            $defaultImageQuery = urlencode($defaultImageQuery);

            $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;

            $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';

            echo $gravatarImage;
            ?>

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