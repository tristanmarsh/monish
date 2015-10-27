<?php
  $this->Html->addCrumb('Tenants', '/tenants');
?>

<h1>Tenants</h1>

<div class="panel panel-default panel-actionbar clearfix">
  
  <div class="panel-body">

    <div class="row">

      <div class="col-sm-6 clearfix">
        
        <div class="button-group">

          <?= $this->Html->link(
          '<i class="fa fa-flash"></i> Current',
          ['action' => 'index'],
          ['class' => 'button button-pill button-primary active', 'escape' => false]
          ); ?>

          <?= $this->Html->link(
          '<i class="fa fa-archive"></i> Archived',
          ['action' => 'archived'],
          ['class' => 'button button-pill button-primary', 'escape' => false]
          ); ?>

        </div>
        
        <div class="button-group">
          <?= $this->Html->link(
          '<i class="fa fa-plus"></i> New Tenant',
          ['action' => 'add'],
          ['class' => 'button button-pill button-pill-override button-action', 'escape' => false]
          ); ?>
        </div>                
        
      </div>

      <div class="col-sm-6 clearfix">

        <form class="searchbox">
        <input type="search" id="myInputTextField" placeholder="Search..." name="search" class="searchbox-input" onkeyup="buttonUp();" required>
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
  <h2 class="panel-title">Current Tenants</h2>
</div>


  <!-- Table -->
  <div class="table-responsive">
    <table class="datatable">
      <thead>
        <tr>
          <th class="hidden-xs">First&nbsp;Name</th>
          <th class="hidden-xs">Last&nbsp;Name</th>
          <th class="visible-xs">Name</th>
          <th class="hidden-xs">Preferred&nbsp;Name</th>
          <th class="hidden-xs">Gender</th>
          <th class="hidden-xs">Phone</th>
          <th class="hidden-xs">Email</th>
          <th class="hidden-xs">Internet&nbsp;Plan</th>
          <th class="hidden-xs">Edit</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($people as $person): ?>
      <?php if (!($person->user->role === "admin") && ($person->student->archived === "NO")) : ?>

      <!-- Tristan's Adorable/Gravatar Avatar Script -->
      <?php
        $email = $person->email;
        $emailHash = md5( strtolower( trim( $email ) ) );

        $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
        $defaultImageQuery = urlencode($defaultImageQuery);

        $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;

        $gravatarImage = '<img height="80px" width="80px" class="img gravatar" src="' . $gravatarQuery . '"/>';
      ?>
      
      <tr>

        <td class="hidden-xs">
          <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>

        <?= $gravatarImage; ?>

        <span>
          <?= $person->first_name ?>
        </span>

        </td>

        <td class="hidden-xs">
          <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
            <span>
            <?= $person->last_name ?>
          </span>
        </td>

        <td class="visible-xs">
          <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>

          <?= $gravatarImage; ?>

          <span>
            <?= $person->first_name .'&nbsp;' . $person->last_name; ?>
          </span>

        </td>

        <td class="hidden-xs">
          <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
          <span>
            <?= $person->common_name ?>
          </span>
        </td>

        <td class="hidden-xs">
          <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
          <span>
            <?= $person->gender ?>
          </span>
        </td>

        <td class="hidden-xs">
          <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
          <span>
            <?= $person->phone ?>
          </span>
        </td>

        <td class="hidden-xs">
          <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
          <span>
            <?= $person->email ?>
          </span>
        </td>

        <td class="hidden-xs">
          <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
          <span>
            <?= $person->student->internet_plan ?>
          </span>
        </td>

        <td class="action action-edit hidden-xs">
          <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller' => 'tenants', 'action' => 'edit', $person->user->id], ['escape' => false]); ?>
      </td>

      </tr>

    <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>
  </div>

</div>