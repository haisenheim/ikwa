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
        'NOUVEAU GROUPE'
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
        <h3 class="page-header">NOUVEAU GROUPE DE FOURNISSEURS</h3>
    </div>
    <div class="card-body">

        <div class="fiche">
            <div class="fiche-inner">
                <form enctype="multipart/form-data" action="<?= $this->Url->build(['action'=>'add']) ?>" method="post">
                    <div class="">
                        <div class="">
                            <div style="border: solid 1px #ccc; padding: 10px; border-radius: 7px">
                                <h6 class="page-header">INFORMATIONS </h6>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">NOM</label>
                                            <input type="text" class="form-control" id="name" name="name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="address">ADRESSE</label>
                                            <input type="text" class="form-control" id="address" name="address"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="phone">TELEPHONE</label>
                                            <input type="tel" class="form-control" id="phone" name="phone"/>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="email">EMAIL</label>
                                            <input type="email" class="form-control" id="email" name="email"/>
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
                        <hr/>
                        <div class="">
                            <div style="border-radius: 7px; border:1px solid #cccccc; padding: 10px">
                                <h6 class="page-header">INFORMATIONS ADMINISTRATEUR DU COMPTE</h6>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="last_name">NOM</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="first_name">PRENOM</label>
                                            <input type="tel" class="form-control" id="first_name" name="first_name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="user_phone">TELEPHONE</label>
                                            <input type="tel" class="form-control" id="user_phone" name="user_phone"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="user_email">EMAIL</label>
                                            <input type="email" class="form-control" id="user_email" name="user_email"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="password">MOT DE PASSE</label>
                                            <input type="password" class="form-control" id="password" name="password"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="cpassword">CONFIRMATION</label>
                                            <input type="password" class="form-control" id="cpassword" name="cpassword"/>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="user_photo">PHOTO</label>
                                            <input type="file" class="" id="user_photo" name="user_photo"/>
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






