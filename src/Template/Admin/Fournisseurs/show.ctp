<div class="card">
    <div class="card-header">
        <h3><?= h($fournisseur->name) ?></h3>
    </div>
    <div class="card-body">

    </div>
</div>



<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m_plan"><i class="fa fa-link"></i> LIER DES SECTEURS</button>
<a style="float: right" class="btn btn-success btn-sm pull-right" href="<?= $this->Url->build(['action'=>'edit',$fournisseur->id]) ?>" ><i class="fa fa-edit"></i> MODIFIER</a>
<hr/>
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



<div class="modal fade" id="m_plan" tabindex="-1" role="dialog" aria-labelledby="PLAN_TARIFAIRE" style="z-index: 9999; margin: 120px auto">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                </button>

            </div>
            <div class="modal-body">
                <h5 class="modal-title page-header">SECTEURS D'ACTIVITE</h5>
                <div class="row">
                    <?php foreach($secteurs as $secteur): ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="">
                                <label for="" class="control-label"><?= $secteur->name ?></label>
                                <input type="checkbox" data-id="<?= $secteur->id ?>"/>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div style="margin: 20px">
                    <button id="btn-save" class="btn btn-block btn-success"><i class="fa fa-check"></i> VALIDER</button>
                </div>
            </div>



        </div>

    </div>
</div>


<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
    <div class="section-block">
        <h5 class="section-title">Vertical tabs</h5>
        <p>Takes the basic nav from above and adds the .nav-tabs class to generate a tabbed interface..</p>
    </div>
    <div class="tab-vertical">
        <ul class="nav nav-tabs" id="myTab3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">Tab Vertical #1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-vertical-tab" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile" aria-selected="false">Tab Vertical #2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-vertical-tab" data-toggle="tab" href="#contact-vertical" role="tab" aria-controls="contact" aria-selected="false">Tab Vertical #3</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent3">
            <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="home-vertical-tab">
                <p class="lead"> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
                <p>Phasellus non ante gravida, ultricies neque a, fermentum leo. Etiam ornare enim arcu, at venenatis odio mollis quis. Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiasse platea dictumst. Pellentesque sed justo aliquet, posuere sem nec, elementum ante.</p>
                <a href="#" class="btn btn-secondary">Go somewhere</a>
            </div>
            <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">
                <h3>Tab Heading Vertical Title</h3>
                <p>Nullam et tellus ac ligula condimentum sodales. Aenean tincidunt viverra suscipit. Maecenas id molestie est, a commodo nisi. Quisque fringilla turpis nec elit eleifend vestibulum. Aliquam sed purus in odio ullamcorper congue consectetur in neque. Aenean sem ex, tempor et auctor sed, congue id neque. </p>
                <p> Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
            </div>
            <div class="tab-pane fade" id="contact-vertical" role="tabpanel" aria-labelledby="contact-vertical-tab">
                <h3>Tab Heading Vertical Title</h3>
                <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu. Fusce lobortis, libero ac cursus feugiat, nibh ex ultricies tortor, id dictum massa nisl ac nisi. Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                <p> Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
            </div>
        </div>
    </div>
</div>

