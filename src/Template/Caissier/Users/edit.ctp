<h3 class="page-header" style="font-family: cakefont">EDITION DE VOTRE PROFIL UTILISATEUR</h3>
<div class="fiche">

    <div class="fiche-inner">
        <div>
            <form enctype="multipart/form-data"  action="<?= $this->Url->build(['action'=>'add']) ?>" class="form" method="post">
                <input name="_csrfToken" type="hidden" value="<?= $token ?>" id="csrf"/>
                <div class="row">

                    <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                        <label for="last_name">Votre nom :</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="<?= $user->last_name ?>"/>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                        <label for="first_name">Votre prenom :</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" value="<?= $user->first_name ?>"/>
                    </div>
                    <div class="col-sm-12 col-lg-3 col-md-3 form-group">
                        <label for="phone">Telephone :</label>
                        <input type="tel" name="phone" class="form-control" id="phone" value="<?= $user->phone ?>"/>
                    </div>

                    <div class="col-sm-12 col-lg-4 col-md-4 form-group">
                        <label for="email">Email </label>
                        <input type="email" name="email" class="form-control" id="email" value="<?= $user->email ?>"/>
                    </div>

                    <div class="col-sm-12 col-lg-3 col-md-3 form-group" style="margin-top: 35px">
                        <label for="gender">Etes-vous une femme ? </label>
                        <input type="checkbox" name="gender" class="checkbox checkbox-inline" id="gender"/>
                    </div>

                    <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" class="form-control" id="password"/>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                        <label for="cpassword">Confirmation du mot de passe :</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword"/>
                    </div>
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <input type="file" name="photo"/>
                    </div>

                </div>
                <hr/>
                <div class="" style="max-width: 400px; margin: 30px auto">
                    <button class="btn btn-success btn-block btn-sm" type="submit"><i class="fa fa-save"></i>
                        ENREGISTRER
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

