<ul class="nav nav-sidebar">

    <li>
		<span class="glyphicon glyphicon-star"></span>
    	<?= $this->Html->link('Profile', ['controller' => 'profiles', 'action' => 'index']) ?>
    </li>
    
    <li>
		<span class="glyphicon glyphicon-star"></span>
    	<?= $this->Html->link('Messages', ['controller' => 'users', 'action' => 'index']) ?>
    </li>
	
	<li>
		<span class="glyphicon glyphicon-star"></span>
		<?= $this->Html->link('Emergency Contacts', ['controller' => 'emergencies', 'action' => 'index']) ?>
	</li>	
	<li>
		<span class="glyphicon glyphicon-star"></span>
		<?= $this->Html->link('Internet Plan', ['controller' => 'internet_connection', 'action' => 'index']) ?>
	</li>

</ul>

