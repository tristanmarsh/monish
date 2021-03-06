<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Monish Dashboard';
?>
<?php $user = $this->Session->read('Auth.User'); ?>
<!DOCTYPE html>
<html>
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
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
	</title>

	<!-- <?= $this->Html->meta('icon') ?> -->

	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('animate.min.css') ?>
	<?= $this->Html->css('custom.css') ?>

	<!-- Scripts -->
	<?= $this->Html->script('wow.min.js') ?>
	<?= $this->Html->script('min/nprogress-min.js') ?>
	<?= $this->Html->script('min/custom-min.js') ?>
	
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>

	<!-- Bootstrap Date Picker -->
	<!-- <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script> -->

	<!-- <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script> -->

	<!-- // <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
	<!-- // <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script> -->
	<!-- <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" /> -->
	<!-- <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" /> -->

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Raleway|Open+Sans:400italic,400' rel='stylesheet' type='text/css'>
	
	
	<script>
		new WOW().init();
	</script>

	<script>
		NProgress.start();

		jQuery(window).load(function($) {
			NProgress.done();
		});
	</script>

	<!-- Font Awesome Used in Buttons -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet">

</head>

<body>

	<!-- User not logged in -->
	<?php if (!$this->Session->read('Auth.User')) : ?>

	<?php echo $this->element('login'); ?>

	<?php else : ?>

	<div class="container-fluid">

		<div class="row">

			<!-- Retrieve correct sidebar -->
			<div class="sidebar">

				<?php echo $this->element('sidebar'); ?>

			</div>
					
			<?php echo $this->element('navbar'); ?>

			<div class="main-content">

				<div class="content">

					<div class="container-fluid">

						<?= $this->Flash->render() ?>

						<?= $this->fetch('content') ?>

					</div>

				</div>

				<?php echo $this->element('footer'); ?>

			</div>
		</div>

	</div><!-- /.container -->

<?php endif; ?>
</body>

<footer>

    <!-- Clickable Row to View Record -->
    <script>
        $("table").on("click", "td", function(e) {
			if ( $(this).find("a").length ) {
                location.href = $(this).find("a").attr("href");
			}            
        });

        //This puts a cursor pointer in all table rows with a link
        $('td>a').parent().css("cursor","pointer")
    </script>

	<!-- Initialize DataTable and update search bar -->
    <script>
	    $(document).ready( function() {
	    	oTable = $('.datatable').dataTable();
	        $('#myInputTextField').keyup(function(){
	            oTable.fnFilter($(this).val());
	        })
	    })
    </script>

</footer>

</html>


