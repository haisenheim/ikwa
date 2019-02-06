<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?= $this->Html->css('../assets_concept_template/vendor/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('../assets_concept_template/vendor/fonts/circular-std/style.css') ?>
    <?= $this->Html->css('../assets_concept_template/libs/css/style.css') ?>
    <?= $this->Html->css('../assets_concept_template/vendor/fonts/fontawesome/css/fontawesome-all.css') ?>
    <?= $this->Html->css('../assets_concept_template/vendor/charts/chartist-bundle/chartist.css') ?>
    <?= $this->Html->css('../assets_concept_template/vendor/charts/morris-bundle/morris.css') ?>
    <?= $this->Html->css('../assets_concept_template/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') ?>
    <?= $this->Html->css('../assets_concept_template/vendor/charts/c3charts/c3.css') ?>
    <?= $this->Html->css('../assets_concept_template/vendor/fonts/flag-icon-css/flag-icon.min.css') ?>

    <?= $this->Html->script('../assets_concept_template/vendor/jquery/jquery-3.3.1.min.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/bootstrap/js/bootstrap.bundle.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/slimscroll/jquery.slimscroll.js') ?>
    <?= $this->Html->script('../assets_concept_template/libs/js/main-js.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/charts/chartist-bundle/chartist.min.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/charts/sparkline/jquery.sparkline.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/charts/morris-bundle/raphael.min.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/charts/morris-bundle/morris.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/charts/c3charts/c3.min.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/charts/c3charts/d3-5.4.0.min.js') ?>
    <?= $this->Html->script('../assets_concept_template/vendor/charts/c3charts/C3chartjs.js') ?>
    <?= $this->Html->script('../assets_concept_template/libs/js/dashboard-ecommerce.js') ?>

    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>

    <title>IKWA</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">

                <a class="navbar-brand" style="padding: 5px 10px" href="#"><span style=""><?= $this->Html->image('logo.png',['style'=>'max-width: 70px; max-height: 50px; margin:-15px 0']) ?></span><span style="color: #004c40; font-size: 18px; font-weight: 900; font-family: cakefont">&nbsp;&nbsp; PLATEFORME DE DESTOCKAGE</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" disabled placeholder="Rechercher..">
                            </div>
                        </li>

                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <?php foreach($frns as $ctg): ?>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                                <a href="<?= $this->Url->build(['controller'=>'Fournisseurs','action'=>'view',$ctg->id]) ?>" class="connection-item"><img src="<?= $this->Url->image($ctg->imageUri?$ctg->imageUri:'logo-indefini.png') ?>" alt="" > <span style="font-size: 11px"><?= $ctg->name ?></span></a>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $this->Url->image('avatar-1.jpg') ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?= $usr['name'] ?> </h5>
                                    <span class="status"></span><span class="ml-2">DISPONIBLE</span>
                                </div>
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'Users','action'=>'profile']) ?>"><i class="fas fa-user mr-2"></i>PROFIL</a>
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'Users','action'=>'logout', 'prefix'=>false]) ?>"><i class="fas fa-power-off mr-2"></i>SE DECONNECTER</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->

        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">IKWA</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                               <span style="font-family: cakefont; font-size: large; color: #FFFFFF">IKWA</span>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link <?= $this->request->getParam('controller')=='Front'?'active':'' ?>" href="<?= $this->Url->build(['controller'=>'Front','action'=>'index']) ?>"><i class="fa fa-fw fa-chart-pie"></i>TABLEAU DE BORD</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?= $this->request->getParam('controller')=='Paiements'?'active':'' ?>" href="<?= $this->Url->build(['controller'=>'Paiements','action'=>'index']) ?>"><i class="fa fa-fw fa-piggy-bank"></i>FINANCES</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?= $this->request->getParam('controller')=='Fournisseurs'?'active':'' ?>" href="<?= $this->Url->build(['controller'=>'Fournisseurs','action'=>'index']) ?>"><i class="fa fa-fw fa-shopping-cart"></i>FOURNISSEURS</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?= $this->request->getParam('controller')=='Groupes'?'active':'' ?>" href="<?= $this->Url->build(['controller'=>'Groupes','action'=>'index']) ?>"><i class="fa fa-fw fa-shopping-cart"></i>GROUPES</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?= $this->request->getParam('controller')=='Grilles'?'active':'' ?>" href="<?= $this->Url->build(['controller'=>'Grilles','action'=>'index']) ?>"><i class="fa fa-fw fa-list-alt"></i>GRILLES DES PRIX</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= in_array($this->request->getParam('controller'), ['Villes','Secteurs','Users'])?'active':'' ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-cogs"></i>PARAMETRES</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Secteurs','action'=>'index']) ?>"><i class="fa fa-fw fa-tasks"></i>SECTEURS</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Villes','action'=>'index']) ?>"><i class="fa fa-fw fa-list-ul"></i>VILLES</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Users','action'=>'index']) ?>"><i class="fa fa-fw fa-users"></i>UTILISATEURS</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row" style="background-color: #00796b">
                    <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h1 style="padding: 10px 0 0 0" class="pageheader-title text-center"><span style="color: #FFFFFF; font-family: cakefont; font-weight: 900; text-shadow: 1px 2px 1px #000">ESPACE D'ADMINISTRATION</span> </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div>
                        <?= $this->Flash->render(); ?>
                    </div>
                    <div>
                       <?php echo $this->fetch('content'); ?>
                   </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 IKWA. All rights reserved.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">A PROPOS</a>
                                <a href="javascript: void(0);">SUPPORT</a>
                                <a href="javascript: void(0);">CONTACTEZ NOUS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->

</body>
 
</html>