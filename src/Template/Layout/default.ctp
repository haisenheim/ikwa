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


    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper" style="margin-left: 0; min-height: 500px">
        <div class="dashboard-ecommerce">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row" style="background-color: #00796b">
                <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h1 style="padding: 10px 0 0 0" class="pageheader-title text-center"><span style="color: #FFFFFF; font-family: cakefont; font-weight: 900; text-shadow: 1px 2px 1px #000">ESPACE D'AUTHENTIFICATION</span> </h1>
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
                        &copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?>. All rights reserved.
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