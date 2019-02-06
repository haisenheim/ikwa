
<h3 class="page-header">NOUVEL UTILISATEUR</h3>
<div class="content">

    <div>
        <div>
            <form action="<?= $this->Url->build(['action'=>'add']) ?>" class="form" method="post">
                <input name="_csrfToken" type="hidden" value="<?= $token ?>" id="csrf"/>
                <div class="row">

                    <div class="col-sm-12 col-lg-3 col-md-3 form-group">
                        <label for="last_name">Nom :</label>
                        <input type="text" name="last_name" class="form-control" id="last_name"/>
                    </div>
                    <div class="col-sm-12 col-lg-3 col-md-3 form-group">
                        <label for="first_name">Prenom :</label>
                        <input type="text" name="first_name" class="form-control" id="first_name"/>
                    </div>
                    <div class="col-sm-12 col-lg-3 col-md-3 form-group">
                        <label for="gender">Femme ? </label>
                        <input type="checkbox" name="gender" class="checkbox checkbox-inline" id="gender"/>
                    </div>


                </div>
            </form>
        </div>
    </div>

</div>

