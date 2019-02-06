<div class="page-header">
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'SECTEURS D\'ACTIVITE',
        ['controller' => 'Secteurs', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        $secteur->name

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
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <img style="max-width: 200px; max-height: 150px" src="<?= $this->Url->image($secteur->imageUri?$secteur->imageUri:'logo-indefini.png') ?>" class="img-thumbnail" alt=""/>
            </div>
            <div class="col-6">
                <h2 class="card-title"><?= $secteur->name ?>  </h2>
            </div>
        </div>

    </div>
    <div class="card-body">
        <h4 class="page-header">LISTE DES FOURNISSEURS</h4>
        <div class="row">
            <?php foreach($secteur->fournisseurs as $fr): ?>
                <div class="col-3">
                    <div class="card">

                        <div class="card-body">
                            <a href="<?= $this->Url->build(['controller'=>'Fournisseurs','action'=>'view',$fr->id]) ?>">
                                <h6 class="card-title"><?= $fr->name; ?></h6>
                            </a>
                            <?php if(!empty($fr->photo)): ?>
                                <?= $this->Html->image($fr->photo?$fr->photo:'logo-indefini.png',['fullBase'=>true,'class'=>'img-thumbnail']) ?>
                            <?php else: ?>
                                <img class="img-thumbnail" src="<?= $this->Url->image('logo-indefini.png') ?>" alt="Card image cap">
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
