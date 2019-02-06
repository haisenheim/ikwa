<div class="page-header">
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'ARTICLES',
        ['controller' => 'Offres', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'DETAIL DE L\'ARTICLE: ' . $offre->name

    );

    ?>
    <div class="page-breadcrumb">
        <?php
        $this->Breadcrumbs->setTemplates([
            'wrapper' => '<nav class="breadcrumb"><ol{{attrs}}>{{content}}</ol></nav>',
        ]);
        echo $this->Breadcrumbs->render(
            ['class' => 'breadcrumb'],
            ['separator' => '&nbsp; <i class="fa fa-angle-right"></i> &nbsp;']
        );
        ?>

    </div>

</div>

<div class="container">
    <div>
        <h3 style="color: white; background-color: darkcyan; font-weight: 700; text-align: center; padding: 10px;"><?= $offre->name ?></h3>
    </div>
    <div class="row show">
        <div class="col-4">
            <div style="border-right: 1px solid #808080">
                <?php if(!empty($offre->photo)): ?>
                    <?= $this->Html->image($offre->photo,['fullBase'=>true,'class'=>'img-thumbnail']) ?>
                <?php else: ?>
                    <img class="card-img-top" src="http://localhost/groupon/webroot/img/city.jpg" alt="Card image cap">
                <?php endif; ?>
            </div>

        </div>

        <div class="col-8 col-md-8 col-lg-8 col-sm-6">
            <div style="background-color: #f5f5f5; padding: 15px">
                <h5 class="panel-title"><?= $offre->name ?></h5>
                <h6>Chez: <span style="color: darkcyan; font-weight: bold"><?= $offre->fournisseur?$offre->fournisseur->name:'-' ?></span></h6>
                <h6>Prix promo: <span style="color: darkcyan; font-weight: bold"> <?= $offre->prix_vente ?>FCFA </span></h6>
                <h6 style="font-size: 14px; text-decoration:line-through; font-weight: bold; color: #ff0000">Prix reel: <?= $offre->prix_reel ?>FCFA</h6>
            </div>
            <div style="background-color: #f5f5f5; text-align: justify; margin-top: 10px; padding: 15px;">
                <p><?= $offre->description ?></p>
            </div>

        </div>

    </div>


    <?php if(!empty($offre->categories)): ?>

        <div class="panel panel-default" style="background-color: #f5f5f5">

            <div class="row">


            </div>
        </div>

    <?php endif; ?>
</div>
