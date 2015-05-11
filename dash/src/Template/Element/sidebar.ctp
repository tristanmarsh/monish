<ul class="nav nav-sidebar">

    <li>
		<span class="glyphicon glyphicon-star"></span>
    	<?= $this->Html->link('Profile', ['controller' => 'profiles', 'action' => 'index']) ?>
    </li>
    
    <li>
		<span class="glyphicon glyphicon-star"></span>
    	<?= $this->Html->link('Messages', ['controller' => 'messages', 'action' => 'index']) ?>
    </li>
	
	<li>
		<span class="glyphicon glyphicon-star"></span>
		<?= $this->Html->link('Internet Plan', ['internetplans' => 'action' => 'index']) ?>
	</li>

</ul>

