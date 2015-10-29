<!-- File: src/Template/Element/navbar.ctp -->

<?php $user = $this->Session->read('Auth.User'); ?>

<header class="navbar navbar-fixed-top">

  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <?= $this->Html->link(
      '<span class="icon-monish" id="icon-monish-home">',
      array('controller' => 'Users', 'action' => 'login'),
      array('class' => 'button button-inverse button-medium', 'id' => 'home-logo', 'escape' => false)
      ); ?>

      <div class="navbar-image navbar-brand">
        <h2>Dash</h2>
      </div>

      <button class="button button-inverse button-medium" id="navigation-toggle"><i class="fa fa-bars"></i></button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">

      </ul>

    </div><!-- /.collapse -->

  </div><!-- /.container-fluid -->

  <ol class="breadcrumb">
    <?php echo $this->Html->getCrumbs(' > ', 'Home') ?>
    <?php echo $this->Html->getCrumbList(); ?>
  </ol>
  
</header>