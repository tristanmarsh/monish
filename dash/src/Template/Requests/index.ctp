<?php
    $this->Html->addCrumb('Requests', '/requests');
?>

<!-- File: src/Template/Requests/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

<h1>Requests</h1>

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
        <h2 class="panel-title">All Requests</h2>
    </div>
        
    <div class="table-responsive">
        <table class="datatable">
            <thead>
            <tr class=>
                <th>Tenant</th>
                <th>Title</th>
                <th>Category</th>
                <th>Property</th>
                <th>Requested</th>
<!--                 <th>Status</th> -->
                <th>Property Access</th>
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
                                <?= $request->created->format('d/m/Y') ?>
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
                                    ['confirm' => 'Are you sure?', "escape" => false]);
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

