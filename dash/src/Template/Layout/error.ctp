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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><?= $this->Html->link($cakeDescription, 'http://cakephp.org') ?></h1>
        </div>
        <div id="content">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <?= $this->Html->link(
                    $this->Html->image('cake.power.gif', ['alt' => $cakeDescription, 'border' => '0']),
                    'http://www.cakephp.org/',
                    ['target' => '_blank', 'escape' => false]
                )
            ?>
        </div>
    </div>
</body>
</html>



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

            <div class="row">
                
                <?php echo $this->element('navbar'); ?>

            </div>

            <div class="main-content">
                

                <div class="content">



                    <div class="container-fluid">

                        <?= $this->Flash->render() ?>


                        <?= $this->fetch('h1') ?>
            

                        <?= $this->fetch('content') ?>

                    </div>

                </div>

                <?php echo $this->element('footer'); ?>

            </div>
        </div>

    </div><!-- /.container -->

<?php endif; ?>
</body>
</html>
