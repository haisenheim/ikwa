<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IKWA<?php // echo $title_for_layout; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('datatables.min.css') ?>
    <?= $this->Html->css('fonts-awesome/css/fontawesome-all.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('loader.css') ?>


    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.js') ?>
    <?= $this->Html->script('custom.js') ?>
    <?= $this->Html->script('datatables.js') ?>
    <?= $this->Html->script('Chart.min.js') ?>


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
                <li class="nav-item"><a href="<?= $this->Url->build(['controller'=>'Front','action'=>'index']) ?>" class="nav-link"><i style="font-size: larger" class="fa fa-home"></i></a></li>
                <li class="nav-item"><a href="<?= $this->Url->build(['controller'=>'Fournisseurs','action'=>'index']) ?>" class="nav-link"><i class="fa fa-shopping-cart"></i> FOURNISSEURS </a></li>
                <li class="nav-item"><a href="<?= $this->Url->build(['controller'=>'Groupes','action'=>'index']) ?>" class="nav-link"><i class="fa fa-building"></i> GROUPES </a></li>
                <li class="nav-item"><a href="<?= $this->Url->build(['controller'=>'Villes','action'=>'index']) ?>" class="nav-link"><i class="fa fa-clipboard-list"></i> VILLES </a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-donate"></i> FINANCES</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a href="<?= $this->Url->build(['controller'=>'Paiements','action'=>'index']) ?>" class="dropdown-item"><i class="fa fa-list"></i> JOURNAL DES ENTREES</a>
                        <a href="<?= $this->Url->build(['controller'=>'Paiements','action'=>'viewed']) ?>" class="dropdown-item"><i class="fa fa-list-alt"></i> JOURNAL DES RATES</a>
                        <a href="<?= $this->Url->build(['controller'=>'Paiements','action'=>'cancelled']) ?>" class="dropdown-item"><i class="fa fa-trash"></i> COMMANDES ANNULEES</a>

                    </div>
                </li>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> PARAMETRES</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a href="<?= $this->Url->build(['controller'=>'Grilles','action'=>'index']) ?>" class="dropdown-item"><i class="fa fa-tasks"></i> GRILLES TARIFAIRES</a>
                        <a href="<?= $this->Url->build(['controller'=>'Secteurs','action'=>'index']) ?>" class="dropdown-item"><i class="fa fa-random"></i> SECTEURS</a>
                        <a href="<?= $this->Url->build(['controller'=>'Users','action'=>'index']) ?>" class="dropdown-item"><i class="fa fa-user-friends"></i> UTILISATEURS</a>



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

        <div class="container">
            <?= $this->Flash->render(); ?>
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

