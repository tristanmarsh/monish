<?php $user = $this->Session->read('Auth.User'); ?>

<!-- Tristan's Gravatar Script  - should be replaced with offical PHP API -->
<?php
  $emailHash = md5( strtolower( trim( $user['username'] ) ) );
  // $defaultImage = urlencode('http://localhost/monish/dash/img/default-profile.jpg');
  $gravatarQuery = 'http://www.gravatar.com/avatar/' . $emailHash . '?d=mm';
  $gravatarImage = '<img height="40px" width="40px" class="img img-circle gravatar" src="' . $gravatarQuery . '"/>';
?>

<?php
  $currentauthid = $user['id'];
  $currentuserEntity = $userEntityy->get($currentauthid);
  $currentpersonEntity = $personEntityy->get($currentuserEntity->person_id);
?>

<ul class="nav nav-sidebar">

  <?php if ($user['role'] === "admin") : ?>

  <!-- Admin Sidebar -->

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

  <li data-toggle="tooltip" data-placement="right" title="Log Out">
    <?= $this->Html->link(
    '<span class="glyphicon glyphicon-log-out"></span>
    <div class="menu-item-label">Log Out</div>',
    array('controller' => 'users', 'action' => 'logout'),
    array('class' => 'menu-item-link', 'escape' => false)
    ); ?>
  </li>

  <?php elseif ($user['role'] === "tenant") : ?>

  <!-- Tentant Sidebar -->

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

  <li data-toggle="tooltip" data-placement="right" title="Log Out">
    <?= $this->Html->link(
    '<span class="glyphicon glyphicon-log-out"></span>
    <div class="menu-item-label">Log Out</div>',
    array('controller' => 'users', 'action' => 'logout'),
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

<!-- Sidebar Toggle -->
<script>
  $(document).ready(function() {
    $('#navigation-toggle').on("click", function(e) {
      $('body').toggleClass('navigation-active');
    });
  });
</script>

<!-- Active menu button Toggle -->
<script>
  $(document).ready(function() {
    $('a').on("click", function(e) {
      window.console.log('hey');
      $(e).toggleClass('active');
    });
  });
</script>

<!-- Relative location of sidebar hover tooltip -->
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip( {
      container: '.main-content'
    });
  })
</script>
