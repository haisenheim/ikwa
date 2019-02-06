<div>
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'GROUPES',
        ['controller' => 'Groupes', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'EDITION DU GROUPE'
    );

    ?>
    <div class="page-breadcrumb page-header">
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
    <div class="page-header card-header">
        <h3 class="page-header">MODIFICATION DU GROUPE</h3>
    </div>
    <div class="card-body">

        <div class="fiche">
            <div class="fiche-inner">
                <form enctype="multipart/form-data" action="<?= $this->Url->build(['action'=>'edit', $groupe->id]) ?>" method="post">
                    <div class="">
                        <div class="">
                            <div style="border: solid 1px #ccc; padding: 10px; border-radius: 7px">

                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">NOM</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $groupe->name ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="address">ADRESSE</label>
                                            <input type="text" class="form-control" id="address" name="address" value="<?= $groupe->address ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="phone">TELEPHONE</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" value="<?= $groupe->phone ?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="email">EMAIL</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $groupe->email ?>"/>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="photo">PHOTO</label>
                                            <input type="file" class="" id="photo" name="photo"/>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-group" style="margin: 30px auto; max-width: 400px">
                        <button type="submit" class="btn btn-sm btn-success btn-block"><i class="fa fa-save"></i> &nbsp; ENREGISTRER </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>

