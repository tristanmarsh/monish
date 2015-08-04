<!-- Doesn't work with the current query - undefined variable -->
<?php $user = $this->Session->read('Auth.User'); ?>
<ul class="nav nav-sidebar">

	<?php if ($user['role'] === "admin") : ?>

	    <li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-envelope"></span>
				<?= $this->Html->link('Requests', ['controller' => 'Requests', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>
	    	
	    </li>
	    
<!-- 	    <li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-user"></span>
		    	<?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>

	    </li>
		
		<li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-user"></span>
				<?= $this->Html->link('People', ['controller' => 'people', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>

		</li>
	    
	    <li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-user"></span>
		    	<?= $this->Html->link('Students', ['controller' => 'students', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>

	    </li> -->

	    <li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-user"></span>
		    	<?= $this->Html->link('Tenants', ['controller' => 'tenants', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>

	    </li>

        <li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-list-alt"></span>
		    	<?= $this->Html->link('Leases', ['controller' => 'leases', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>
	    </li>
	    
	    <li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-home"></span>
				<?= $this->Html->link('Properties', ['controller' => 'properties', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>
	    	
	    </li>
	    
	    <li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-home"></span>
				<?= $this->Html->link('Rooms', ['controller' => 'rooms', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>
	    	
	    </li>

	    <li>
	        <a class="menu-item-link" href="#insertcorrectlinkhere">
		        <span class="glyphicon glyphicon-star"></span>
		        <?= $this->Html->link('Tests', ['controller' => 'tests', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
		    </a>
	        
	   </li>	    
	    

	<?php elseif ($user['role'] === "tenant") : ?>

	    <li>
	    	<a class="menu-item-link" href="#insertcorrectlinkhere">
		        <span class="glyphicon glyphicon-user"></span>
		        <?= $this->Html->link('Profile', ['controller' => 'people', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
		    </a>
	    </li>

        <li>
            <a class="menu-item-link" href="#insertcorrectlinkhere">
                <span class="glyphicon glyphicon-user"></span>
                <?= $this->Html->link('Emergency Contacts', ['controller' => 'emergencies', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
            </a>
        </li>

	    <li>
            <a class="menu-item-link" href="#insertcorrectlinkhere">
                <span class="glyphicon glyphicon-envelope"></span>
                <?= $this->Html->link('Requests', ['controller' => 'requests', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
            </a>
        </li>

        <li>
            <a class="menu-item-link" href="#insertcorrectlinkhere">
                <span class="glyphicon glyphicon-th-list"></span>
                <?= $this->Html->link('MAC Addresses', ['controller' => 'macaddresses', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
            </a>
        </li>
		
		<li>
			<a class="menu-item-link" href="#insertcorrectlinkhere">
				<span class="glyphicon glyphicon-globe"></span>
				<?= $this->Html->link('Internet Plan', ['controller' => 'students', 'action' => 'index'], ['class' => 'menu-item-label hidden-sm']) ?>
			</a>
		</li>
  
	<?php endif; ?>

</ul>
