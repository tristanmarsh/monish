
</div><!-- /.escape row -->
</div><!-- /.escape content -->
</div><!-- /.escape container -->

	<div class="col-sm-3 sidebar">
			
			<ul class="nav nav-sidebar">
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Maintenance Requests', ['controller' => 'maintenances', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'index']) ?>
			    </li>
				
				<li>
					<span class="glyphicon glyphicon-star"></span>
					<?= $this->Html->link('Emergency Contacts', ['controller' => 'emergencies', 'action' => 'index']) ?>
				</li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Students', ['controller' => 'students', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Leases', ['controller' => 'leases', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Properties', ['controller' => 'properties', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Rooms', ['controller' => 'rooms', 'action' => 'index']) ?>
			    </li>
			    
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<span style="float:right"><?= $this->html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
			    </li>

			</ul>

	</div>

	<div class="col-sm-9">

		<div class="content">

			<h3>Welcome to the administrator dashboard</h3>

		</div>

	</div>
<p>

You can manage the database with the buttons on the left:<br>



</p>








