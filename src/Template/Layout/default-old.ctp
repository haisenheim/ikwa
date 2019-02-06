<!doctype html>
<html dir="ltr" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo !isset($title_for_layout) ? '' : $title_for_layout ; ?></title>
    <meta name="description" content="<?php echo empty($description) ? '' : $description ; ?>" />
    <meta name="keywords" content="<?php echo empty($keywords) ? '' : $keywords ; ?>" />
    <meta property="og:title" content="<?php echo !isset($title_for_layout) ? '' : $title_for_layout ; ?>">
    <meta property="og:description" content="<?php echo !isset($description) ? '' : $description ; ?>">
    <meta property="og:url" content="<?php //echo Router::url( $this->here, true ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>


    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fonts-awesome/css/fontawesome-all.css') ?>

    <?= $this->Html->script('jquery.slim.js') ?>
    <?= $this->Html->script('jquery-3.3.1.slim.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>


</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark1" style="background-color: #333;">
    <div class="container">
        <a class="navbar-brand" href="#">IKWA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">


        </div>
    </div>
</nav>

<div class="main">
    <div class="container">
        <?= $this->Flash->render(); ?>

        <?php echo $this->fetch('content'); ?>
        <br />
        <br />
    </div>
</div>

<div class="red py-1">
    <div class="container">
        <div class="whitetext">
            <small>Plateforme de diffusion des Soldes</small>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                IKWA - Diffusion des soldes
                <br />
            </div>
            <div class="col-sm-4">
                <br />
                <br />
            </div>
            <div class="col-sm-4">
                <div class="pull-right text-right">
                    &copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?>
                    <br />
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>