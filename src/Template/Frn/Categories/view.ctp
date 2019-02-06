<div class="card">

    <div class="card-header">
        <h2><?= $category->name ?></h2>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach($category->offres as $offre): ?>
                                <div class="col-3">

                                        <a href="<?= $this->Url->build(['controller'=>'Offres','action'=>'show',$offre->id]) ?>">
                                            <h6 class="card-title"><?= $offre->name; ?></h6>
                                        </a>
                                        <?php if(!empty($offre->photo)): ?>
                                            <?= $this->Html->image($offre->photo,['fullBase'=>true,'class'=>'card-img-top']) ?>
                                        <?php else: ?>
                                            <img class="card-img-top" src="http://localhost/groupon/webroot/img/city.jpg" alt="Card image cap">
                                        <?php endif; ?>

                                        <div class="card-footer">
                                            <h6 ><a class="btn btn-xs btn-info" href="<?= $this->Url->build(['controller'=>'Secteurs','action'=>'view',$offre->secteur_id]) ?>"><?= $offre->secteur->name ?></a></h6>

                                        </div>

                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

