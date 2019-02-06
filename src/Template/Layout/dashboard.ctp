<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ADMIN<?php // echo $title_for_layout; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">


    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('admin.css') ?>
    <?= $this->Html->css('fonts-awesome/css/fontawesome-all.css') ?>
    <?= $this->Html->css('jquery-editable.css') ?>
    <?= $this->Html->css('custom.css') ?>


    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.js') ?>
    <?= $this->Html->script('admin.js') ?>
    <?= $this->Html->script('custom.js') ?>






<!-- <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->



<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>


</head>
<body>

<div style="background:#ccc; color:#FFF; padding:1px;"></div>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="background-color: #000000 !important;">

        <a class="navbar-brand" href="#"> IKWA - ESPACE D'ADMINISTRATION </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav mr-auto">


                <li class="nav-item"><?php echo $this->Html->link('Users', ['controller' => 'users', 'action' => 'index'], ['class' => 'nav-link']); ?></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestions</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <?php echo $this->Html->link('Gestions des categories', array('controller' => 'categories', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                        <?php echo $this->Html->link('Gestions des Offres', array('controller' => 'offres', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                        <?php echo $this->Html->link('Gestions des Fournisseurs', array('controller' => 'fournisseurs', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                        <?php echo $this->Html->link('Gestions des Commandes', array('controller' => 'orders', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                        <?php echo $this->Html->link('Gestions des Segments', array('controller' => 'Segments', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                    </div>
                </li>
                <li class="nav-item"><?php echo $this->Html->link('Points de vente', ['controller' => 'points', 'action' => 'index'], ['class' => 'nav-link']); ?></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parametrage</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <?php echo $this->Html->link('Utilisateurs', array('controller' => 'users', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                        <?php echo $this->Html->link('Secteurs', array('controller' => 'secteurs', 'action' => 'index'), ['class' => 'dropdown-item']); ?>

                    </div>
                </li>
            </ul>

            <div class="my-0 my-lg-0">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" id="dropdown05" data-toggle="dropdown"><i class="fa fa-cog"></i></a>

                        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout']) ?>"><i class="fa fa-fw fa-power-off"></i> Se deconnecter</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">

        <?= $this->Flash->render(); ?>
        <div class="container" style="margin-top: 30px">
            <?php echo $this->fetch('content'); ?>
        </div>

        <?php // echo $this->element('sql_dump'); ?>

        <br />
        <br />

    </div>

<div class="container-fluid bg-dark" style="min-height: 300px; padding: 30px 0; color: white; font-size: 13px; ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div>
                    <h5 class="page-header">CONTACTEZ LA CENTRALE IKWA</h5>
                    <div>
                        <h6>ADRESSE</h6>
                        <p>ROND POINT KASSAI- IMMEUBLE SOCIETE GENERALE </p>
                        <p>TEL: +242 044392998</p>
                        <p>Email: info@ikwa.cg</p>
                        <p>Ouvert tous les jours - 24h/24</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div>
                    <h5 class="page-header">LES POINTS DE VENTE IKWA</h5>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div>
                    <h5 class="page-header">LES SECTEURS</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div id="footer">
            <p>&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
        </div>
    </div>
</div>



</body>
</html>

