<?php
    $this->Html->addCrumb('Archived tenants', '/tenants/archived');
?>

<h1>Archived Tenants</h1>

<div class="panel panel-default panel-actionbar clearfix">
    
    <div class="panel-body">

        <div class="row">

            <div class="col-sm-6 clearfix">

                <div class="button-group">

                    <?= $this->Html->link(
                    '<i class="fa fa-flash"></i> Current',
                    ['action' => 'index'],
                    ['class' => 'button button-pill button-primary button-3d', 'escape' => false]
                    ); ?>

                    <?= $this->Html->link(
                    '<i class="fa fa-archive"></i> Archived',
                    ['action' => 'archived'],
                    ['class' => 'button button-pill button-primary button-3d active', 'escape' => false]
                    ); ?>

                </div>
                
                <div class="button-group">
                    <?= $this->Html->link(
                    '<i class="fa fa-plus"></i> New Tenant',
                    ['action' => 'add'],
                    ['class' => 'button button-pill button-action button-3d', 'escape' => false]
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
    <h2 class="panel-title">Archived Tenants</h2>
</div>


  <!-- Table -->
    <div class="table-responsive">
        <table  class="datatable">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Common Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Internet Plan</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person): ?>
                    <?php if (!($person->user->role === "admin")) : ?>
                        <?php if ($person->student->archived === "YES") : ?>
                        
                            <tr>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
                                        
                                        <!-- Tristan's Adorable/Gravatar Avatar Script -->
                                        <?php
                                          $email = $person->email;
                                          $emailHash = md5( strtolower( trim( $email ) ) );

                                          $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
                                          $defaultImageQuery = urlencode($defaultImageQuery);

                                          $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;
                                          
                                          $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';

                                          echo $gravatarImage;
                                        ?>

                                    <span>
                                    <?= $person->first_name ?>
                                </span>
                            </td>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?>
                                    <span>
                                    <?= $person->last_name ?>
                                </span>
                            </td>
                                <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                                    <?= $person->common_name ?>
                                </span></td>
                                <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                                    <?= $person->gender ?>
                                </span></td>
                                <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                                    <?= $person->phone ?>
                                </span></td>
                                <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                                    <?= $person->email ?>
                                </span></td>
                                <td><?= $this->Html->link("", ['controller'=>'tenants', 'action' => 'view', $person ->id]) ?><span>
                                    <?= $person->student->internet_plan ?>
                                </span></td>
                                <td class="action action-edit">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller' => 'tenants', 'action' => 'edit', $person->user->id], ['escape' => false]); ?>
                                </span></td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>
    </div>

</div>

<!-- Clickable Row to View Record -->
<script>
    $("table").on("click", "td", function(e) {
        window.console.log("click");
        window.console.log(e.target);
        if ($(e.target).is("a"))
            return;
        if ($(e.target).is("input")) {
            window.console.log(e.target);
        }
        else {
            location.href = $(this).find("a").attr("href");
        }
    });
</script>
