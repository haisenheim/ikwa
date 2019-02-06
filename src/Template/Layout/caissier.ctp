<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IKWA<?php // echo $title_for_layout; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />



    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('admin.css') ?>
    <?= $this->Html->css('datatables.min.css') ?>
    <?= $this->Html->css('fonts-awesome/css/fontawesome-all.css') ?>
    <?= $this->Html->css('jquery-editable.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('loader.css') ?>


    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.js') ?>
    <?= $this->Html->script('bootstrap-confirm.js') ?>
    <?= $this->Html->script('custom.js') ?>
    <?= $this->Html->script('datatables.js') ?>
    <?= $this->Html->script('Chart.min.js') ?>






<!-- <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->

<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>



</head>
<body>
<div class="image-fond"></div>

<div class="contenu">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="background-color: #000000 !important;">
        <a class="navbar-brand" href="#"> IKWA - <i class="fa fa-map-marker-alt"></i> <?= $frn->name ?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav mr-auto">

             </ul>

            <div class="my-0 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" style="font-size: 11px; font-weight: 600; margin-top: 15px">

                        <div>
                            <div style="display: inline-block; max-height: 30px; max-width: 40px">
                                <?php if(!empty($usr['imageUri'])): ?>
                                    <?= $this->Html->image($usr['imageUri'],['fullBase'=>true,'width'=>'98%','height'=>'30px']) ?>
                                <?php else: ?>
                                    <?= $this->Html->image('avatar',['fullBase'=>true,'width'=>'98%','height'=>'98%']) ?>
                                <?php endif; ?>
                            </div>
                            <span style="display: inline-block; font-weight: 700; color: white"><?= $usr['name'] ?></span>
                        </div>
                    </li>
                    <li class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" id="dropdown05" data-toggle="dropdown"><i class="fa fa-cog"></i></a>

                        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'profile','prefix'=>'caissier']) ?>"><i class="fa fa-fw fa-user-cog"></i> MON PROFILE</a>
                            <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout','prefix'=>false]) ?>"><i class="fa fa-fw fa-power-off"></i> Se deconnecter</a>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <div class="content" style="margin-top: 30px">

        <?= $this->Flash->render(); ?>
        <div class="container">
            <div class="page-header" style="background-color: #4caf50; margin: 0 -15px; padding: 5px 0">
                <h5><?= $this->Html->image($frn->imageUri?$frn->imageUri:'logo-indefini.png',['fullBase'=>true,'style'=>'max-width:50px; min-height:50px; margin:-35px 3px']) ?> <span style="margin-left:30px "><span class="" style="text-shadow: 1px 1px 2px black; color: white; font-weight: 800"><?= $frn->name ?></span> <span style="font-weight: 600; color: white; text-shadow: 1px 1px 1px; font-size: smaller">&nbsp; &nbsp;<?= $frn->address ?> &nbsp;&nbsp;<?= $frn->phone ?></span></span> <span class="page-title pull-right" style="margin-right: 30px; color: white; font-weight: 700"><?= !empty($title)?$title:'' ?></span> </h5>
            </div>
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

    <div id="footer">
        <p>&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
    </div>
</div>

<div style="background:#ccc; color:#FFF; padding:1px;"></div>



</body>
</html>

