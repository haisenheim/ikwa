<!doctype html>
<html dir="ltr" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo !isset($title_for_layout) ? '' : $title_for_layout ; ?></title>



    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fonts-awesome/css/fontawesome-all.css') ?>
    <?= $this->Html->css('product.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->Html->script('jquery.slim.js') ?>
    <?= $this->Html->script('jquery-3.3.1.slim.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>


</head>
<body>

<div class="page-container">
    <div class="top-header" style="background-color: #ced6e0; height: 25px; margin-top: -1px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <span style="font-size: 10px; font-weight: 800">IKWA - Votre hypermache le plus proche</span>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div style="" class="row">
                        <div class="col-lg-10 col-md-10">
                            <div style="border-right: 2px solid #000000">
                                <span style="font-size: 10px; font-weight: 500">IKWA - TEL: +242 044392998 - EMAIL: info@ikwa.cg</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container top-container">

        <div class="row row-with-vspace site-branding" style="min-height: 120px; padding-top: 30px">
            <div class="col-md-6 site-title">
                <h1 class="site-title-heading">
                </h1>

            </div>
            <div class="col-md-6 page-header-top-right">
                <div class="sr-only">

                </div>

            </div>
        </div><!--.site-branding-->


                    <span style="font-weight: 800; font-size: 10px;">
                       MOBIL ET IMMOBILIER - GRAND DISTRIBUTION - VESTIMENTAIRE - LOISIRS - RESTAURATION - TOUT EST SUR IKWA
                    </span>
    </div>




    <div class="main-navigation header" id="myHeader" style="background-color: #ced6e0">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#"><i class="glyphicon glyphicon-home"></i>&nbsp; ACCUEIL</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="glyphicon glyphicon-list-alt"></i>&nbsp; CATEGORIES</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="glyphicon glyphicon-import"></i>&nbsp; FOURNISSEURS</a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Link1</a>
                                        <a class="dropdown-item" href="#"><i class="glyphicon glyphicon-list-alt"></i>&nbsp; CATEGORIES</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <?php if($this->request->session()->read('Shop')) : ?>
                                    <a href="<?= $this->Url->build(['controller'=>'Offres','action'=>'cart']) ?>" class="btn btn-secondary btn-sm my-2 my-sm-0""><i class="fa fa-cart-plus"></i> &nbsp; Panier (<span id="quantitybutton"><?php echo $this->request->session()->read('Shop.Order.quantity'); ?></span>)</a>
                                <?php endif; ?>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div><!--.main-navigation-->

<div class="main">
    <div class="container">
        <?= $this->Flash->render(); ?>
        <?php echo $this->Html->getCrumbs('&nbsp;/&nbsp;', '', ['class' => 'breadcr1umb']); ?>
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
                CakePHP 3 Shopping Cart
                <br />
            </div>
            <div class="col-sm-4">
                <br />
                <br />
            </div>
            <div class="col-sm-4">
                <div class="pull-right text-right">
                    &copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></small>
                    <br />
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>