<ul class="nav nav-sidebar">
			    <li>
					<span class="glyphicon glyphicon-star"></span>
			    	<?= $this->Html->link('Requests', ['controller' => 'Requests', 'action' => 'index']) ?>
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

