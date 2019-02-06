

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header" style="margin-top: 30px">
                <div class="row">
                    <div class="col-4">
                        <img src="<?= $this->Url->image($fournisseur->imageUri?$fournisseur->imageUri:'logo-indefini.png') ?>" class="img-thumbnail" alt=""/>
                    </div>
                    <div class="col-8">
                        <h3><?= h($fournisseur->name) ?></h3>
                    </div>
                </div>

            </div>
            <div class="card-body">

                <h6>Tel : <?= $fournisseur->telephone.' - '.$fournisseur->mobile ?></h6>
                <h6>Email : <?= $fournisseur->email ?></h6>
                <h6>Representant : <?= $fournisseur->representant ?></h6>
            </div>


            <div class="card-footer">
                <ul class="list-inline list-unstyled arrow">
                    <?php foreach($fournisseur->secteurs as $secteur): ?>
                        <li class="list-inline-item "><?= $secteur->name ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block">
            <h5 class="section-title">ELEMENTS FOURNISSEURS</h5>
        </div>
        <div class="tab-vertical">
            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="ordres" aria-selected="true">COMMANDES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-vertical-tab" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="offres" aria-selected="false">OFFRES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab" href="#contact-vertical" role="tab" aria-controls="listes" aria-selected="false">LISTES DE PRIX</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-vertical-tab" data-toggle="tab" href="#users-vertical" role="tab" aria-controls="users" aria-selected="false">UTILISATEURS</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent3">
                <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="orders-vertical-tab">

                    <h3>LISTE DES COMMANDES</h3>
                    <p class="lead"> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
                    <p>Phasellus non ante gravida, ultricies neque a, fermentum leo. Etiam ornare enim arcu, at venenatis odio mollis quis. Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiasse platea dictumst. Pellentesque sed justo aliquet, posuere sem nec, elementum ante.</p>
                    <a href="#" class="btn btn-secondary">Go somewhere</a>
                </div>
                <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">
                    <h3>LISTE DES OFFRES</h3>
                    <table id="example" class="table table-bordered table-hover table-striped table-condensed" >
                        <thead>
                        <tr>

                            <th>Intitule</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($fournisseur->offres as $offre): ?>
                            <tr>
                                <td><?= h($offre->name) ?></td>
                                <td><?= date_format($offre->created, 'd-m-Y') ?></td>

                                <td><?= $offre->statut?'<span class="text-success">actif</span>':'<span class="text-danger">inactif</span>' ?></td>
                                <td class="actions">
                                    <ul class="list-inline" style="margin-bottom: 0">
                                        <li class="list-inline-item" title="afficher" >
                                            <a class="btn btn-xs btn-info" href="<?= $this->Url->build(['controller'=>'Offres','action'=>'view', $offre->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                                        </li>

                                        <?php if($offre->statut): ?>

                                            <li class="list-inline-item" title="desactiver">
                                                <a class="btn-danger btn-xs btn" href="<?= $this->Url->build(['controller'=>'Offres','action'=>'disable', $offre->id]) ?>" ><i class="fa  fa-lock"></i></a>
                                            </li>
                                        <?php else: ?>
                                            <li class="list-inline-item" title="mettre en ligne">
                                                <a class="btn btn-success btn-xs" href="<?= $this->Url->build(['controller'=>'Offres','action'=>'enable', $offre->id]) ?>" ><i class="fa fa-unlock"></i></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="contact-vertical" role="tabpanel" aria-labelledby="contact-vertical-tab">
                    <h3>LISTES DES PRIX</h3>
                    <table  class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>NUMERO DE LISTE</th>
                            <th>DATE DE CREATION</th>
                            <th>STATUT</th>
                            <th>EN COURS ?</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($fournisseur->listes as $liste): ?>
                            <tr>
                                <td><?= h($liste->name) ?></td>
                                <td><?= $liste->created?date_format($liste->created, 'd/m/Y'):'-' ?></td>
                                <td><?= $liste->active?'ACTIVE':'DESACTIVEE' ?></td>
                                <td><?= $liste->actuel?'<span style="color: #008000; font-weight: 900"> OUI</span>':'<span style="color: red; font-weight: 900"> NON</span>' ?></td>

                                <td class="">
                                    <ul class="list-inline" style="margin-bottom: 0">
                                        <li class="list-inline-item"><a title="Afficher" href="<?= $this->Url->build(['controller'=>'Listes','action'=>'view',$liste->id]) ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye-slash"></i></a></li>

                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="users-vertical" role="tabpanel" aria-labelledby="contact-vertical-tab">
                    <h3>UTILISATEURS</h3>
                    <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu. Fusce lobortis, libero ac cursus feugiat, nibh ex ultricies tortor, id dictum massa nisl ac nisi. Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                    <p> Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                </div>
            </div>
        </div>
    </div>

</div>





