<div class="card">
    <div class="card-header">
        <h3 class="page-header text-center">NOUVELLE CATEGORIE</h3>
    </div>
    <div class="card-body">

        <div class="fiche-inner">

            <form enctype="multipart/form-data" action="<?= $this->Url->build(['action' => 'add']) ?>" method="post">
                <fieldset>
                    <input name="_csrfToken" type="hidden" value="<?= $token ?>" id="csrf"/>
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="form-group">
                                <label for="name" class="control-label">NOM DE LA CATEGORIE</label>
                                <input type="text" name="name" id="name" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="form-group">
                                <label for="photo" class="control-label">IMAGE SYMBOLIQUE</label><br/>
                                <input type="file" name="photo" id="photo" class=""/>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="" style="max-width: 400px; margin: 30px auto">
                    <button class="btn btn-success btn-block btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                </div>
            </form>

        </div>

    </div>
</div>

