<!-- <!-- File: src/Template/Users/login.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>


<?php if ($user['role'] === "admin") : ?>

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-primary">
					<div class="panel-heading">
			<h2 class="panel-title">Unread Request</h2>
		</div>

			<div class="table-responsive">
            	<table class="datatable">
            		<thead>
                        <tr>
                            <th>Tenant</th>
                            <th>Title</th>
                            <th>Property</th>

                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($requests as $request): ?>
                    	<?php if ($request->status=='Unread'): ?>
                    	<tr class="unread">
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
                                <?= $request->property_address ?>
                            </span>
                    		</td>
                    		</tr>
                		<?php endif ?>
                		<?php endforeach; ?>
</tbody>
</table>
</div>



			
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-primary">
					<div class="panel-heading">
			<h2 class="panel-title">Google Site Track thing</h2>
		</div>
		<div class="panel-body">
			body
		</div>
		<div class="panel-footer">
			footer
		</div>

			
		</div>
	</div>
	
	</div>


<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-primary panel-30-day">
					<div class="panel-heading">
			<h2 class="panel-title">Leases that expire in less than 30 days.</h2>
		</div>

		<?php $countthirty = 0; ?>
		<?php foreach ($leases as $lease): ?>	
		<?php
			    $now = time(); 
			    $your_date = strtotime($lease->date_end);
			    $datediff = $your_date - $now;
		?>
		<?php if (floor($datediff/(60*60*24)) < 30 && floor($datediff/(60*60*24)) >= 0) : ?>
		<?php $countthirty = $countthirty + 1 ?>
		<?php endif ?>	
		<?php endforeach; ?>

		<div class="table-responsive">
    	<table class="datatable">
    		<thead>
					<th>Property</th>
			        <th>Room</th>
			        <th>Tenant</th>	
					<th>Days Remaining</th>
			</thead>
			<tbody>
				<?php foreach ($leases as $lease): ?>	
					<?php
					     $now = time(); 
					     $your_date = strtotime($lease->date_end);
					     $datediff = $your_date - $now;
					?>
					<?php if (floor($datediff/(60*60*24)) < 30 && floor($datediff/(60*60*24)) >= 0) : ?>
						<tr>
							<td>
								<?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>	
						        <?= $lease->property->address ?>
					        </td>
					        <td>
						        <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
						        <?= $lease->room->room_name ?>
					        </td>
					        <td>
						        <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
						        <?php
						        	$person = $walrus->get($lease->student->person_id);
						        ?>
						        <?= $person->first_name ?>
						        <?= $person->last_name ?>
					        </td>
							<td>
								<?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
								<?php
								    echo floor($datediff/(60*60*24));
								?>
							</td>
						</tr>	
					<?php endif ?>	
				<?php endforeach; ?>
			</tbody>
			</table>

		</div>

			
		</div>
	</div>
	<div class="col-sm-4">
		<div class="panel panel-primary panel-90-day">
					<div class="panel-heading">
			<h2 class="panel-title">Leases that expire in less than 90 days.</h2>
		</div>
		<?php $countthirty = 0; ?>
		<?php foreach ($leases as $lease): ?>	
			<?php
			    $now = time(); 
			    $your_date = strtotime($lease->date_end);
			    $datediff = $your_date - $now;
			?>
			<?php if (floor($datediff/(60*60*24)) < 90 && floor($datediff/(60*60*24)) >= 30) : ?>
				<?php $countthirty = $countthirty + 1 ?>
			<?php endif ?>	
		<?php endforeach; ?>

		<div class="table-responsive">
    	<table class="datatable">
    		<thead>
					<th>Property</th>
			        <th>Room</th>
			        <th>Tenant</th>	
					<th>Days Remaining</th>
			</thead>
			<tbody>
				<?php foreach ($leases as $lease): ?>	
					<?php
					     $now = time(); 
					     $your_date = strtotime($lease->date_end);
					     $datediff = $your_date - $now;
					?>
					<?php if (floor($datediff/(60*60*24)) < 90 && floor($datediff/(60*60*24)) >= 30) : ?>
						<tr>
							<td>
								<?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>	
						        <?= $lease->property->address ?>
					        </td>
					        <td>
						        <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
						        <?= $lease->room->room_name ?>
					        </td>
					        <td>
						        <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
						        <?php
						        	$person = $walrus->get($lease->student->person_id);
						        ?>
						        <?= $person->first_name ?>
						        <?= $person->last_name ?>
					        </td>
							<td>
								<?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
								<?php
								    echo floor($datediff/(60*60*24));
								?>
							</td>
						</tr>	
					<?php endif ?>	
				<?php endforeach; ?>
			</tbody>
			</table>

		</div>

			
		</div>
	</div>
	<div class="col-sm-4">
		<div class="panel panel-primary panel-180-day">
					<div class="panel-heading">
			<h2 class="panel-title">Leases that expire in less than 180 days.</h2>
		</div>
		<?php $countthirty = 0; ?>
		<?php foreach ($leases as $lease): ?>	
			<?php
			    $now = time(); 
			    $your_date = strtotime($lease->date_end);
			    $datediff = $your_date - $now;
			?>
			<?php if (floor($datediff/(60*60*24)) < 180 && floor($datediff/(60*60*24)) >= 90) : ?>
				<?php $countthirty = $countthirty + 1 ?>
			<?php endif ?>	
		<?php endforeach; ?>

		<div class="table-responsive">
    	<table class="datatable">
    		<thead>
					<th>Property</th>
			        <th>Room</th>
			        <th>Tenant</th>	
					<th>Days Remaining</th>
			</thead>
			<tbody>
				<?php foreach ($leases as $lease): ?>	
					<?php
					     $now = time(); 
					     $your_date = strtotime($lease->date_end);
					     $datediff = $your_date - $now;
					?>
					<?php if (floor($datediff/(60*60*24)) < 180 && floor($datediff/(60*60*24)) >= 90) : ?>
						<tr>
							<td>
								<?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>	
						        <?= $lease->property->address ?>
					        </td>
					        <td>
						        <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
						        <?= $lease->room->room_name ?>
					        </td>
					        <td>
						        <?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>  
						        <?php
						        	$person = $walrus->get($lease->student->person_id);
						        ?>
						        <?= $person->first_name ?>
						        <?= $person->last_name ?>
					        </td>
							<td>
								<?= $this->Html->link("", ['controller'=>'Leases', 'action' => 'view', $lease->id]) ?>
								<?php
								    echo floor($datediff/(60*60*24));
								?>
							</td>
						</tr>	
					<?php endif ?>	
				<?php endforeach; ?>
			</tbody>
			</table>

		</div>

			
		</div>
	</div>
	</div>



























<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>

	<h1>Welcome to the tenants dashboard</h1>

	<p>

		You can manage the detail and add request with the buttons on the left:<br>

	</p>

<?php endif; ?>