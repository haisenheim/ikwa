
<h3 class="page-header">NOUVEAU CAISSIER</h3>
<div class="content">

    <div class="fiche">
        <div class="fiche-inner">
            <form action="<?= $this->Url->build(['action'=>'add']) ?>" class="form" method="post">
                <input name="_csrfToken" type="hidden" value="<?= $token ?>" id="csrf"/>
                <div class="row">

                    <div class="col-sm-12 col-lg-4 col-md-4 form-group">
                        <label for="last_name">Nom :</label>
                        <input type="text" name="last_name" class="form-control" id="last_name"/>
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label for="first_name">Prenom :</label>
                        <input type="text" name="first_name" class="form-control" id="first_name"/>
                    </div>
                    <div class="col-sm-12 col-md-3 form-group" style="margin-top: 30px">
                        <label for="gender">Femme ? </label>
                        <input type="checkbox" name="gender" class="checkbox checkbox-inline" id="gender"/>
                    </div>

                    <div class="col-sm-12 col-md-4 ">
                        <label for="address">Adresse :</label>
                        <input type="text" name="address" class="form-control" id="address"/>
                    </div>


                    <div class="col-sm-12 col-md-3 ">
                        <label for="phone">TELEPHONE :</label>
                        <input type="text" name="phone" class="form-control" id="phone"/>
                    </div>

                    <div class="col-sm-12 col-md-5 ">
                        <label for="email">EMAIL :</label>
                        <input type="email" name="email" class="form-control" id="email"/>
                    </div>

                    <div class="col-sm-12 col-md-6 form-group">
                        <label for="password">MOT DE PASSE :</label>
                        <input type="password" name="password" class="form-control" id="password"/>
                    </div>
                    <div class="col-sm-12  col-md-6 form-group col-md-offset-2">
                        <label for="cpassword">CONFIRMATION MOT DE PASSE :</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword"/>
                    </div>

                </div>

                <div class="" style="max-width: 400px; margin: 30px auto">
                    <button class="btn btn-block btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>

</div>

