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
        'EDITION DU SECTEUR'

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
        <h3 class="card-title">EDITION DU SECTEUR</h3>
    </div>
    <div class="card-body">
        <form action="<?= $this->Url->build(['action'=>'edit', $secteur->id]) ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">NOM </label>
                        <input type="text" class="form-control form-control-sm" name="name" value="<?= $secteur->name ?>"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">PHOTO </label>
                        <input type="file" class="form-control-file" name="photo" placeholder="image associee au secteur ..."/>
                    </div>
                </div>
            </div>
            <div style="max-width: 400px; margin: 30px auto">
                <button type="submit" class="btn btn-rounded btn-sm btn-success btn-block"><i class="fa fa-save"></i> ENREGISTRER</button>
            </div>
        </form>
    </div>
</div>

