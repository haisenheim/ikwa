<div class="header page-header text-center">
    <h3>GESTION DES FOURNISSEURS</h3>
    <h5><?= h($fournisseur->name) ?></h5>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <h5 class="card-header card-title">
                <div style="max-height: 100px; max-width: 100px; display: inline-block">
                    <?= $this->Html->image($fournisseur->imageUri,['fullBase'=>true,'width'=>'98%','height'=>'98%']) ?>
                </div>
                <span class="value" style="display: inline-block"><?= h($fournisseur->name) ?></span>
            </h5>
            <div class="card-body">
                <h6>
                    Tel : <?= $fournisseur->telephone.' - '.$fournisseur->mobile ?>
                </h6>
                <h6>
                    Email : <?= $fournisseur->email ?>
                </h6>
                <h6>
                    Representant : <?= $fournisseur->representant ?>
                </h6>

            </div>
            <div>
                <h5>
                    <?= $fournisseur->secteur?$fournisseur->secteur->name:'-' ?>
                </h5>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <?php if(!empty($fournisseur->segments)):  ?>
            <h6 class="page-header">SEGMENTS DE PRODUITS</h6>
            <div class="row">

                <?php foreach($fournisseur->segments as $segment): ?>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card-header card-title">
                            <div style="max-height: 100px; max-width: 100px; display: inline-block">
                                <?= $this->Html->image($segment->imageUri,['fullBase'=>true,'width'=>'98%','height'=>'98%']) ?>
                            </div>
                            <span class="value" style="display: inline-block; font-size: smaller"> <?= h($segment->name) ?> </span>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>
    </div>
    </div>

    <div class="container">
        <div>

            <?php if(!empty($fournisseur->offres)):  ?>
                <h5 class="page-header">OFFRES</h5>
                <div class="row">
                    <?php foreach($fournisseur->offres as $offre): ?>
                        <div class="col-sm-6 col-md-1 col-lg-1">
                            <div class="card-header card-title">
                                <div style="max-height: 75px; max-width: 75px;">
                                    <?= $this->Html->image($offre->photo,['fullBase'=>true,'width'=>'98%','height'=>'98%']) ?>
                                </div>
                                <span class="value" style="font-size: smaller"> <?= h($segment->name) ?> </span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>
    </div>




      <!--  <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">En ligne</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Historique</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Les  offres en cours</div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Les offres passees</div>
        </div>
-->

