<ul class="nav nav-sidebar">

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

</ul>

