<?php
    $this->Html->addCrumb('Requests', '/requests');
?>

<!-- File: src/Template/Requests/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

<h1>Requests</h1>

<div class="panel panel-default panel-actionbar clearfix">
    
    <div class="panel-body">

        <div class="row">

            <div class="col-sm-6 clearfix">

                <?= $this->Html->link(
                '<i class="fa fa-flash"></i> Current',
                ['action' => 'index'],
                ['class' => 'button button-pill button-primary button-3d active', 'escape' => false]
                ); ?>

            
                <?= $this->Html->link(
                '<i class="fa fa-plus"></i> New Tenant',
                ['action' => 'add'],
                ['class' => 'button button-pill button-action button-3d', 'escape' => false]
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
        <h2 class="panel-title">All Requests</h2>
    </div>
        
    <div class="table-responsive">
        <table class="datatable">
            <thead>
            <tr >
                <th>Tenant</th>
                <th>Title</th>
                <th>Category</th>
                <th>Property</th>
                <th>Requested</th>
                <th>Access</th>
                <th>Edit</th>
                <th>Close</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($requests as $request): ?>
    			<?php if ($request->person_id === $userEntity->person_id OR $user['role'] === 'admin') : ?>
                    
                    <?php if ($request->status=='Unread'): ?>
                    <tr class="unread">
                        <?php else: ?>
                        <tr>
                    <?php endif ?>

                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>


                            <!-- Tristan's Gravatar Script  - should be replaced with offical PHP API -->
                            <!-- Also this is bad because it does not specify the size of the source image! Should be 2x the displayed image height for retina displays -->

                            <?php
                                $emailHash = md5( strtolower( trim( $request->person->email ) ) );
                                // $defaultImage = urlencode('http://localhost/monish/dash/img/default-profile.jpg');
                                $gravatarQuery = 'http://www.gravatar.com/avatar/' . $emailHash . '?d=mm';
                                $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';
                            ?>

                            <?= $gravatarImage; ?>

                            <span>
                                <?= $request->person->first_name; ?>
                                <?= " ".$request->person->last_name; ?>
                            </span>
                        </td>

                        <td>
                            <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <span>
                                <?= $request->title; ?>
                            </span>
                        </td>
                        <td>
                                <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <span>
                                <?= $request->category ?>
                            </span>
                        </td>
                        <td>
                                <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <span>
                                <?= $request->property_address ?>
                            </span>
                        </td>
                        <td>
                                <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <span>
                                <?= $request->created->format('Y/m/d') ?>
                            </span>
                        </td>
<!--                         <td>
                                <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <span>
                                <?= $request->status ?>
                            </span>
                        </td> -->
                        <td>
                                <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                            <span>
                                <?= $request->entry_time ?>
                            </span>
                        </td>
                        <td class="action action-edit">
                            <?php
                                echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller'=>'requests', 'action' => 'edit', $request->id], ['escape' => false]);

                                ?>
                        </td>
                        <td class="action action-close">
                            <?php
                                echo $this->Form->postLink(
                                    '<span class="glyphicon glyphicon-ok"></span>',
                                    ['controller'=>'requests', 'action' => 'delete', $request->id],
                                    ['confirm' => 'Close ' . $request->title .' Request from '. $request->person->first_name . " " . $request->person->last_name . '?' , "escape" => false]);
                            ?>
                        </td>
                    </tr>
    			<?php endif ?>
            <?php endforeach; ?>
            </tbody>

        </table>

        
        <div class="panel-footer"><!-- Panel Footer Doesn't actually do anything here apart from  adding a border --></div>

    </div>

</div>

