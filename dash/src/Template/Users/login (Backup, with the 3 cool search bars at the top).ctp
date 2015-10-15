<!-- <!-- File: src/Template/Users/login.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>


<?php if ($user['role'] === "admin") : ?>

	<h1>Dashboard</h1>

	<div class="container-fluid">
		<div class="row">
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="panel clearfix">
						<h2 class="text-center">Tenants</h2>
						<hr>
						<div class="panel-body">
						<ul class="nav nav-pills pull-left">
							<li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
							<li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
						</ul>

						<form class="navbar-form navbar-left" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Submit</button>
								</span>
							</div><!-- /input-group -->
						</form>
					</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="panel clearfix">
						<h2 class="text-center">Requests</h2>
						<hr>
						<div class="panel-body">
						<ul class="nav nav-pills pull-left">
							<li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
							<li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
						</ul>
						
						<form class="navbar-form navbar-left" role="search">
							<div class="input-group">
								<input name="requestinput" type="text" class="form-control" placeholder="Search" id="myInputTextField">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Submit</button>
								</span>
							</div><!-- /input-group -->
						</form>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="panel clearfix">
						<h2 class="text-center">Properties</h2>
						<hr>
						<div class="panel-body">
						<ul class="nav nav-pills pull-left">
							<li role="presentation" class="active"><?= $this->Html->link('All', ['action' => 'index']) ?></li>
							<li role="presentation"><?= $this->Html->link('New', ['action' => 'add']) ?></li>
						</ul>
						
						<form class="navbar-form navbar-left" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Submit</button>
								</span>
							</div><!-- /input-group -->
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
    <link rel="stylesheet" type="text/css" href="/DataTables-1.10.8/media/css/jquery.dataTables.css">

    <!--experimental angular js-->

    <html ng-app="monish">

        <!-- TABS  -->
        <section ng-controller="TabController as tab">
            <ul class="nav nav-pills">
                <li ng-class="{ active:tab.isSet(1) }">
                    <a href="" ng-click="tab.setTab(1)">Tenants</a>
                </li>
                <li ng-class="{ active:tab.isSet(2) }">
                    <a href="" ng-click="tab.setTab(2)">Requests</a>
                </li>
                <li ng-class="{ active:tab.isSet(3) }">
                    <a href="" ng-click="tab.setTab(3)">Properties</a>
                </li>
            </ul>

            <!--  TAB 1  -->
            <div ng-show="tab.isSet(1)">
                <h4>Do we really need this search page?</h4>
            </div>

            <!--  TAB 2  -->
            <div ng-show="tab.isSet(2)">
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h2 class="panel-title">All Requests</h2>
                    </div>

                    <div class="table-responsive">
                        <table id="requests" class="">
                            <thead>
                            <tr class="wow fadeInDown">
                                <th>Title</th>
                                <th>Requested By</th>
                                <th>Category</th>
                                <th>Property</th>
                                <th>Requested</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($requests as $request): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                                    <?php echo $request->title; ?>
                                </td>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                                    <?php
                                    echo $request->person->first_name;
                                    echo " ".$request->person->last_name;
                                    ?>
                                </td>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                                    <?= $request->category ?>
                                </td>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                                    <?= $request->property_address ?>
                                </td>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                                    <?= $request->created->format('d/m/Y' /*'h:m A'*/) ?>
                                </td>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                                    <?= $request->status ?>
                                </td>
                                <td>
                                    <?= $this->Html->link("", ['controller'=>'requests', 'action' => 'view', $request->id]) ?>
                                    <?php

                                        echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['controller'=>'requests', 'action' => 'edit', $request->id], ['escape' => false]);

                                        echo "\t"; // this puts a space between Delete and Edit button

                                        echo $this->Form->postLink(
                                            '<span class="glyphicon glyphicon-ok"></span>',
                                            ['controller'=>'requests', 'action' => 'delete', $request->id],
                                            ['confirm' => 'Are you sure?', "escape" => false]);

                                    ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                        
            <!--  TAB 3  -->
            <div ng-show="tab.isSet(3)">
                <h4>Do we really need this search page?</h4>
            </div> 
        </section>
    </html>

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

    <!-- DataTables CSS -->
<!--    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">-->

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#requests').DataTable();
        } );
    </script>
    <script>
        oTable = $('#requests').dataTable();
        $('#myInputTextField').keyup(function(){
            oTable.fnFilter($(this).val());
        })
    </script>

<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>


	<h1>Welcome to the tenants dashboard</h1>


	<p>

		You can manage the detail and add request with the buttons on the left:<br>

	</p>

<?php endif; ?>