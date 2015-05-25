<!-- Doesn't work with the current query - undefined variable -->
<?php $user = $this->Session->read('Auth.User'); ?>
<ul class="nav nav-sidebar">

	<?php if ($user['role'] === "admin") : ?>

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
			<?= $this->Html->link('People', ['controller' => 'people', 'action' => 'index']) ?>
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

	<?php elseif ($user['role'] === "tenant") : ?>

	    <li>
	        <span class="glyphicon glyphicon-star"></span>
	        <?= $this->Html->link('Profile', ['controller' => 'people', 'action' => 'index']) ?>
	    </li>

	    <li>
	        <span class="glyphicon glyphicon-star"></span>
	        <?= $this->Html->link('Requests', ['controller' => 'requests', 'action' => 'index']) ?>
	    </li>
		
		<li>
			<span class="glyphicon glyphicon-star"></span>
			<?= $this->Html->link('Internet Plan', ['controller' => 'students', 'action' => 'index']) ?>
		</li>
  
	<?php endif; ?>

</ul>
