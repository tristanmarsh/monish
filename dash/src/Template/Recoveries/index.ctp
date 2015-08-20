<head>
	<?= $this->Html->charset() ?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="favicons/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#88c6ff">

	<title>
		Password Recovery
	</title>

	<!-- <?= $this->Html->meta('icon') ?> -->

	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('custom.css') ?>
	<?= $this->Html->css('animate.min.css') ?>

	<?= $this->Html->script('wow.min.js') ?>
	<?= $this->Html->script('min/custom-min.js') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>

	<script>
		new WOW().init();
	</script>

	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Open+Sans:400italic,400' rel='stylesheet' type='text/css'>


</head>

<div class="container">

	<div class="row">

		<div class="vertical-align">

			<div class="col-sm-6 col-sm-offset-3 panel wow fadeInDown">
				
				<div class="logo text-center">
					<?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House','class' => 'navbar-logo img-responsive text-center','width'=>'200px'])  ?>
					<h1>Monash ISH Dashboard</h1>

				</div>

				<div class="form">

					<div class="users form">
					    <?= $this->Form->create($user) ?>
					    <fieldset>
					        <legend>Input Your Email</legend>
					        <?= $this->Form->input('username', array('class' => 'form-control')) ?>
					    </fieldset>
					    <br>
					    <?= $this->Form->button(__('Submit'), ['class' => 'form-control btn btn-info']); ?>

					</div>
	
				</div>

			</div>
		</div>
	</div>
</div>