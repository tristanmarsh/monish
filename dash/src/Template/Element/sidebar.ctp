<?php $user = $this->Session->read('Auth.User'); ?>

<ul class="nav nav-sidebar">

	<?php if ($user['role'] === "admin") : ?>

	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-envelope"></span>
		<span class="menu-item-label hidden-sm">Requests</span>',
		array('controller' => 'Requests', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>

	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-user"></span>
		<span class="menu-item-label hidden-sm">Tenants</span>',
		array('controller' => 'tenants', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>
    
	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-list-alt"></span>
		<span class="menu-item-label hidden-sm">Leases</span>',
		array('controller' => 'leases', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>

	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-home"></span>
		<span class="menu-item-label hidden-sm">Properties</span>',
		array('controller' => 'properties', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>
    
	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-home"></span>
		<span class="menu-item-label hidden-sm">Rooms</span>',
		array('controller' => 'rooms', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>

	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-star"></span>
		<span class="menu-item-label hidden-sm">Tests</span>',
		array('controller' => 'tests', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>


	<?php elseif ($user['role'] === "tenant") : ?>


	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-user"></span>
		<span class="menu-item-label hidden-sm">Profile</span>',
		array('controller' => 'people', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>

	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-user"></span>
		<span class="menu-item-label hidden-sm">Emergency Contacts</span>',
		array('controller' => 'emergencies', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>

	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-envelope"></span>
		<span class="menu-item-label hidden-sm">Requests</span>',
		array('controller' => 'requests', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>

   	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-th-list"></span>
		<span class="menu-item-label hidden-sm">MAC Addresses</span>',
		array('controller' => 'macaddresses', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>

   	<li>
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-globe"></span>
		<span class="menu-item-label hidden-sm">Internet Plan</span>',
		array('controller' => 'students', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
    </li>

	<?php endif; ?>

</ul>

<!-- Script to highlight current location -->
<script>
    $(document).ready(function() {
        var path = this.location.pathname;
        var count = (path.match(/\//g) || []).length;
        if (count > 3) {
            index = path.indexOf("/");
            for (var i = 0; i < 2; i++)
                index = path.indexOf("/", parseInt(index+1));
           path = path.substr(0, index);
        }
        $('a[href="' + path + '"]').addClass('active');
        console.log('found' + path);
    });
</script>
