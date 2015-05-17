<ul class="nav nav-sidebar">

    <li>
		<span class="glyphicon glyphicon-star"></span>
    	<?= $this->Html->link('Profile', ['controller' => 'profiles', 'action' => 'index']) ?>
    </li>

    <li>
        <span class="glyphicon glyphicon-star"></span>
        <?= $this->Html->link('Profile (Test)', ['controller' => 'people', 'action' => 'index']) ?>
    </li>

    <li>
        <span class="glyphicon glyphicon-star"></span>
        <?= $this->Html->link('Requests', ['controller' => 'requests', 'action' => 'index']) ?>
    </li>
    
    <li>
		<span class="glyphicon glyphicon-star"></span>
    	<?= $this->Html->link('Messages', ['controller' => 'messages', 'action' => 'index']) ?>
    </li>
	
	<li>
		<span class="glyphicon glyphicon-star"></span>
		<?= $this->Html->link('Internet Plan', ['controller' => 'internetplans', 'action' => 'index']) ?>
	</li>

</ul>

