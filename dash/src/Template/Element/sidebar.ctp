<?php $user = $this->Session->read('Auth.User'); ?>

<!-- Tristan's Gravatar Script  - should be replaced with offical PHP API -->
<?php
	$emailHash = md5( strtolower( trim( $user['username'] ) ) );
	// $defaultImage = urlencode('http://localhost/monish/dash/img/default-profile.jpg');
	$gravatarQuery = 'http://www.gravatar.com/avatar/' . $emailHash . '?d=mm';
	$gravatarImage = '<img height="40px" class="img img-circle gravatar" src="' . $gravatarQuery . '"/>';
?>

<?php
	$currentauthid = $user['id'];
	$currentuserEntity = $userEntityy->get($currentauthid);
	$currentpersonEntity = $personEntityy->get($currentuserEntity->person_id);
?>

<ul class="nav nav-sidebar">

	<?php if ($user['role'] === "admin") : ?>

	<!-- Experimental Collapsible Sidebar -->

<!-- 	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		
		/* Requests */
		<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				<span class="glyphicon glyphicon-envelope"></span>
				<span class="menu-item-label">Requests</span>
			</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
			
			<ul>
				<li>
					<?= $this->Html->link('All Requests',
					array('controller' => 'Requests', 'action' => 'index'),
					array('class' => 'menu-item-link')
					); ?>
				</li>
			</ul>

			</div>
		</div>
		</div>

		/* Tenants */
		<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingTwo">
			<h4 class="panel-title">
			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				<span class="glyphicon glyphicon-user"></span>
				<span class="menu-item-label">Tenants</span>
			</a>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			<div class="panel-body">
			
			<ul>
				<li>
					<?= $this->Html->link('All Tenants',
					array('controller' => 'tenants', 'action' => 'index'),
					array('class' => 'menu-item-link')
					); ?>
				</li>
				<li>
					<?= $this->Html->link('New Tenant',
					array('controller' => 'tenants', 'action' => 'add'),
					array('class' => 'menu-item-link')
					); ?>
				</li>
			</ul>

			</div>
		</div>
		</div>
		
		/* Leases */
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingThree">
				<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					<span class="glyphicon glyphicon-list-alt"></span>
					<span class="menu-item-label">Leases</span>
				</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				<div class="panel-body">
				
					<ul>
						<li>
							<?= $this->Html->link('All Leases',
							array('controller' => 'leases', 'action' => 'index'),
							array('class' => 'menu-item-link')
							); ?>
						</li>
					</ul>

				</div>
			</div>
		</div>

	</div> -->

	<!-- Traditional Sidebar -->

	<li data-toggle="tooltip" data-placement="right" title="Home">
		<?= $this->Html->link(
		'<span class="icon-monish" id="icon-monish-home"></span>
		<span class="menu-item-label">Home</span>',
		array('controller' => 'Users', 'action' => 'login'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="<?php echo ($currentpersonEntity->first_name.' '.$currentpersonEntity->last_name); ?>">
		<?= $this->Html->link(
		'<span>'. $gravatarImage .'</span>
		<span class="menu-item-label">'.
			 $currentpersonEntity->first_name.' '.$currentpersonEntity->last_name
		.'</span>',
		array('controller' => 'people', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="Requests">
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-envelope"></span>
		<span class="menu-item-label">Requests</span>',
		array('controller' => 'Requests', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="Tenants">
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-user"></span>
		<span class="menu-item-label">Tenants</span>',
		array('controller' => 'tenants', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>
	
	<li data-toggle="tooltip" data-placement="right" title="Leases">
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-list-alt"></span>
		<span class="menu-item-label">Leases</span>',
		array('controller' => 'leases', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="Properties">
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-home"></span>
		<span class="menu-item-label">Properties</span>',
		array('controller' => 'properties', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>
	
<!-- 	<li data-toggle="tooltip" data-placement="right" title="Rooms">
		<?= $this->Html->link(
		//'<span class="glyphicon glyphicon-home"></span>
		//<span class="menu-item-label">Rooms</span>',
		//array('controller' => 'rooms', 'action' => 'index'),
		//array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li> -->

<!-- 	<li data-toggle="tooltip" data-placement="right" title="Tests">
		// <?= $this->Html->link(
		// '<span class="glyphicon glyphicon-star"></span>
		// <span class="menu-item-label">Tests</span>',
		// array('controller' => 'tests', 'action' => 'index'),
		// array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li> -->

	<?php elseif ($user['role'] === "tenant") : ?>


	<li data-toggle="tooltip" data-placement="right" title="Home">
		<?= $this->Html->link(
		'<span class="icon-monish" id="icon-monish-home"></span>
		<div class="menu-item-label">Home</div>',
		array('controller' => 'Users', 'action' => 'login'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="<?php echo ($currentpersonEntity->first_name.' '.$currentpersonEntity->last_name); ?>">
		<?= $this->Html->link(
		'<span>'. $gravatarImage .'</span>
		<span class="menu-item-label">'.
			 $currentpersonEntity->first_name.' '.$currentpersonEntity->last_name
		.'</span>',
		array('controller' => 'people', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="Emergency Contacts">
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-user"></span>
		<div class="menu-item-label">Emergency Contacts</div>',
		array('controller' => 'emergencies', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="Requests">
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-envelope"></span>
		<div class="menu-item-label">Requests</div>',
		array('controller' => 'requests', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="MAC Addresses">
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-th-list"></span>
		<div class="menu-item-label">MAC Addresses</div>',
		array('controller' => 'macaddresses', 'action' => 'index'),
		array('class' => 'menu-item-link', 'escape' => false)
		); ?>
	</li>

	<li data-toggle="tooltip" data-placement="right" title="Internet Plan">
		<?= $this->Html->link(
		'<span class="glyphicon glyphicon-globe"></span>
		<div class="menu-item-label">Internet Plan</div>',
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

<script>
	$(document).ready(function() {
	
		$('#navigation-toggle').on("click", function(e) {
			$('body').toggleClass('navigation-active');

		});
	});

</script>

<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip( {
			container: '.main-content'
		});
	})
</script>
