
        <?php if (!empty($fournisseur->offres)): ?>
            <div class="row">
            <?php foreach ($fournisseur->offres as $offre): ?>
                        <div class="col-3">
                            <div class="card">
                                <h6 class="card-title"><?= $offre->name; ?></h6>
                                <?php if(!empty($offre->photo)): ?>
                                    <?= $this->Html->image($offre->photo,['fullBase'=>true,'class'=>'card-img-top']) ?>
                                <?php else: ?>
                                    <img class="card-img-top" src="http://localhost/groupon/webroot/img/city.jpg" alt="Card image cap">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h6>Prix  promotionnel : <?= $offre->prix_vente ?></h6>
                                    <h6>Prix reel : <?= $offre->prix_reel ?></h6>
                                    <h6>Pour les : <?= $offre->quota ?> premiers    <a style="margin-left:30px; " href="<?= $this->Url->build(['controller'=>'Offres','action'=>'show',$offre->id,!empty($user)?$user->id:'']) ?>" class="btn btn-primary btn-xs pull-right">Reserver maintenant</a>
                                    </h6>

                                </div>
                                <div class="card-footer">
                                    <h6 ><a class="btn btn-xs btn-info" href="<?= $this->Url->build(['controller'=>'Categories','action'=>'view',$offre->category_id]) ?>"><?= $offre->category->name ?></a></h6>
                                    <h6><a class="btn btn-xs btn-success" href="<?= $this->Url->build(['controller'=>'Fournisseurs','action'=>'view',$offre->fournisseur_id]) ?>"><?= $offre->fournisseur->name ?></a></h6>

                                </div>
                            </div>
                        </div>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>

