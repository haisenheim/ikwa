

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
            <div style="display: inline-block;  margin-top: 10px">
                <h6>A partir de <span style="color: darkcyan; font-weight: 700"><?= $offre->quota ?> Clients</span> </h6>
            </div>

            <div style="margin-top: 15px">
                <a style="margin-left:30px; " href="<?= $this->Url->build(['controller'=>'Offres','action'=>'book',$offre->id,!empty($user)?$user->id:'']) ?>" class="btn btn-danger btn-sm">RESERVER DES MAINTENANT</a>
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


    <?php if(!empty($offre->category)): ?>

    <div class="panel panel-default" style="background-color: #f5f5f5">
        <h5 class="page-header" style="color: white; background-color: darkcyan; padding: 5px; font-weight: bolder ">CES OFFRES PEUVENT VOUS INTERESSER</h5>
        <div class="row">

            <?php for($i=0 ; $i<4; $i++): ?>
                <?php if($i<count($offre->category->offres)): ?>
                <?php  if($offre->category->offres[$i]->id!=$offre->id): ?>
                        <div class="col-md-3 col-3 col-lg-3">
                            <div class="card to-zoom">
                                <a href="<?= $this->Url->build(['controller'=>'Offres','action'=>'show',$offre->category->offres[$i]->id]) ?>">
                                    <h6 class="card-title"><?= $offre->category->offres[$i]->name; ?></h6>
                                </a>
                                <?php if(!empty($offre->category->offres[$i]->photo)): ?>
                                    <?= $this->Html->image($offre->category->offres[$i]->photo,['fullBase'=>true,'class'=>'card-img-top']) ?>
                                <?php else: ?>
                                    <img class="card-img-top" src="http://localhost/groupon/webroot/img/city.jpg" alt="Card image cap">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h6><?= $offre->category->offres[$i]->prix_vente ?> FCFA</h6>
                                    <h6 style="font-size: 14px; text-decoration:line-through; color: #ff0000; font-weight: bold "><?= $offre->category->offres[$i]->prix_reel ?> FCFA</h6>
                                    <h6> <?= $offre->category->offres[$i]->quota ?> Clients
                                    </h6>

                                </div>
                            </div>
                        </div>
                <?php endif; ?>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>

    <?php endif; ?>
</div>
