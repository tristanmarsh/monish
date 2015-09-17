<!-- <!-- File: src/Template/Users/login.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>


<?php if ($user['role'] === "admin") : ?>





	<h1>Dashboard</h1>

	<h2>Notifications</h3>
	    <div class="panel panel-primary">

        <div class="panel-body">


		<?php $count = 0; ?>

		<?php foreach ($requests as $request): ?>
			<?php 
				if ($request->status == 'Unread') {
					$count = $count + 1;
				}
			?>
		<?php endforeach; ?>
		<table>
			<tbody>
		<tr><td style="background-color : white;cursor: pointer;">
			<?= $this->Html->link("", ['controller'=>'Requests', 'action' => 'index']) ?>
		<?php
			if ($count == 0){
				echo "You have no unread requests.";
			}
			else {
				echo "You have ".$count." unread requests."; 
			}
		?>
	</td>
		</tr>
	</tbody>
		</table>

	</div>

	</div>
        <div class="panel panel-primary">




		<!-- Start of 30 days table -->
<!-- 		<br><br> -->
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
		<div class="panel-body">
		<?php 
			if ($countthirty == 0) {
				echo "You have no leases that expire in less than 30 days.";
			}
			else {
				echo "You have ".$countthirty." lease(s) that expires in less than 30 days.";
			}
		?>
	</div>
		<?php if ($countthirty > 0) : ?>

			<table>
				<thead>
					<th>Property</th>
			        <th>Room</th>
			        <th>Tenant</th>	
					<th>Days Remaining</th>
				</thead>
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
			</table>
		<?php endif ?>	
	</div>




		<!-- Start of 90 days table -->
        <div class="panel panel-primary">
		<?php $countninety = 0; ?>
		<?php foreach ($leases as $lease): ?>	
			<?php
			    $now = time(); 
			    $your_date = strtotime($lease->date_end);
			    $datediff = $your_date - $now;
			?>
			<?php if (floor($datediff/(60*60*24)) < 90 && floor($datediff/(60*60*24)) >= 30) : ?>
				<?php $countninety = $countninety + 1 ?>
			<?php endif ?>	
		<?php endforeach; ?>
		<div class="panel-body">
		<?php 
			if ($countninety == 0) {
				echo "You have no leases that expire in less than 90 days.";
			}
			else {
				echo "You have ".$countninety." lease(s) that expires in less than 90 days.";
			}
		?>
	</div>
		<?php if ($countninety > 0) : ?>
			<table>
				<thead>
					<th>Property</th>
			        <th>Room</th>
			        <th>Tenant</th>	
					<th>Days Remaining</th>
				</thead>
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
			</table>
		<?php endif ?>	
	</div>

		<!-- Start of 180 days table -->
<!-- 		<br><br> -->
        <div class="panel panel-primary">
		<?php $countoneeighty = 0; ?>
		<?php foreach ($leases as $lease): ?>	
			<?php
			    $now = time(); 
			    $your_date = strtotime($lease->date_end);
			    $datediff = $your_date - $now;
			?>
			<?php if (floor($datediff/(60*60*24)) < 180 && floor($datediff/(60*60*24)) >= 90) : ?>
				<?php $countoneeighty = $countoneeighty + 1 ?>
			<?php endif ?>	
		<?php endforeach; ?>
				<div class="panel-body">
		<?php 
			if ($countoneeighty == 0) {
				echo "You have no leases that expire in less than 180 days.";
			}
			else {
				echo "You have ".$countoneeighty." lease(s) that expires in less than 180 days.";
			}
		?>
	</div>
		<?php if ($countoneeighty > 0) : ?>
			<table>
				<thead>
					<th>Property</th>
			        <th>Room</th>
			        <th>Tenant</th>	
					<th>Days Remaining</th>
				</thead>
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
			</table>
		<?php endif ?>	
	</div>


<?php endif; ?>

<?php if ($user['role'] === "tenant") : ?>

	<h1>Welcome to the tenants dashboard</h1>

	<p>

		You can manage the detail and add request with the buttons on the left:<br>

	</p>

<?php endif; ?>