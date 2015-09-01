
<!-- <! src/Template/Users/reset_password.ctp -->
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
<body>
    <?php echo $this->element('changepassword'); ?>

</body>

<h1>Reset Password</h1>

<div class="panel panel-default clearfix">
    <div class="panel-body">
        
        <div class="users form">
            <?= $this->Form->create($user, ['novalidate' => true]) ?>
            <fieldset>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->Form->button('Submit', ['type' => 'submit', 'class' => 'btn btn-lg btn-info btn-block']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </fieldset>
        </div>
    </div>
</div>
>>>>>>> origin/develop
