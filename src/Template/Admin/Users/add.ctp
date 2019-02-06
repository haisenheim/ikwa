
<div class="card">
    <div class="card-header">
        <h3 class="page-header">NOUVEL UTILISATEUR</h3>
    </div>
    <div class="card-body">

        <div>
            <div>
                <form action="<?= $this->Url->build(['action'=>'add']) ?>" class="form" method="post">
                    <input name="_csrfToken" type="hidden" value="<?= $token ?>" id="csrf"/>
                    <div class="row">

                        <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                            <label for="last_name">Nom :</label>
                            <input type="text" name="last_name" class="form-control" id="last_name"/>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                            <label for="first_name">Prenom :</label>
                            <input type="text" name="first_name" class="form-control" id="first_name"/>
                        </div>
                        <div class="col-sm-12 col-lg-3 col-md-3 form-group">
                            <label for="phone">Telephone :</label>
                            <input type="tel" name="phone" class="form-control" id="phone"/>
                        </div>

                        <div class="col-sm-12 col-lg-4 col-md-4 form-group">
                            <label for="email">Email </label>
                            <input type="email" name="email" class="form-control" id="email"/>
                        </div>

                        <div class="col-sm-12 col-lg-3 col-md-3 form-group" style="margin-top: 35px">
                            <label for="gender">Femme ? </label>
                            <input type="checkbox" name="gender" class="checkbox checkbox-inline" id="gender"/>
                        </div>

                        <div class="col-sm-12 col-lg-3 col-md-3 form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" class="form-control" id="password"/>
                        </div>
                        <div class="col-sm-12 col-lg-3 col-md-3 form-group">
                            <label for="cpassword">Confirmation du mot de passe :</label>
                            <input type="password" name="cpassword" class="form-control" id="cpassword"/>
                        </div>


                        <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                            <label for="cpasswor">Photo :</label>
                            <input type="file" name="photo" class="form-control" id="cpasswor"/>
                        </div>

                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <button class="btn btn-success btn-sm" type="submit"><i class="glyphicon glyphicon-floppy-save"></i>
                                Enregister
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


