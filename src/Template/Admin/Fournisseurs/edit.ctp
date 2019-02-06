<div class="page-header text-center">
    <h2 class="page-header"><i class="fa fa-edit"></i> EDITION DE <?= $fournisseur->name ?></h2>

</div>


<div class="container">

    <div class="fiche">
        <div class="fiche-inner">
            <form enctype="multipart/form-data" action="<?= $this->Url->build(['action'=>'edit',$fournisseur->id]) ?>" method="post">
                <div class="">
                    <div class="">
                        <div style="border: solid 1px #ccc; padding: 10px; border-radius: 7px">
                            <h6 class="page-header">INFORMATIONS FOURNISSEUR</h6>
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $fournisseur->id ?>"/>
                                <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="code">CODE</label>
                                        <input type="text" class="form-control" id="code" name="code" value="<?= $fournisseur->code ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-8 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">NOM</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $fournisseur->name ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="adresse">ADRESSE</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $fournisseur->adresse ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="phone">TELEPHONE</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= $fournisseur->telephone ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="mobile">MOBILE</label>
                                        <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= $fournisseur->mobile ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="email">EMAIL</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $fournisseur->email ?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="ville_id">GROUPE</label>
                                        <select name="ville_id" id="ville_id" class="form-control">
                                            <option value="0">Selectionner un groupe</option>
                                            <?php foreach($groupes as $v): ?>
                                                <option value="<?= $v->id ?>"><?= $v->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="ville_id">VILLE</label>
                                        <select name="ville_id" id="ville_id" class="form-control">
                                            <option value="0">Selectionner une Ville</option>
                                            <?php foreach($villes as $v): ?>
                                                <option value="<?= $v->id ?>"><?= $v->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
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

                </div>

                <div class="form-group" style="margin: 30px auto; max-width: 400px ">
                    <button type="submit" class="btn btn-sm btn-success btn-block"><i class="fa fa-save"></i> &nbsp; ENREGISTRER </button>
                </div>
            </form>
        </div>
    </div>


</div>