<div class="page-header">
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );

    $this->Breadcrumbs->add(
        'PROFIL UTILISATEUR'

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
        <h3 class="card-title">EDITION DE MON PROFIL</h3>
    </div>
    <div class="card-body">

        <form enctype="multipart/form-data" action="<?= $this->Url->build(['controller'=>'Users','action'=>'profile']) ?>" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">PRENOM</label>
                        <input id="first_name" type="text" class="form-control" name="first_name" value="<?= $user->first_name ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name" class="col-form-label">NOM</label>
                        <input id="last_name" type="text" class="form-control" name="last_name" value="<?= $user->last_name ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="address" class="col-form-label">ADRESSE</label>
                        <input id="address" type="text" class="form-control" name="address" value="<?= $user->address ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="phone" class="col-form-label">TELEPHONE</label>
                        <input id="phone" type="text" class="form-control" name="phone" value="<?= $user->phone ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="email" class="col-form-label">EMAIL</label>
                        <input id="email" type="email" class="form-control" name="email" value="<?= $user->email ?>">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="password" class="col-form-label">MOT DE PASSE</label>
                        <input id="password" type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="cpassword" class="col-form-label">CONFIRMATION MOT DE PASSE</label>
                        <input id="cpassword" type="password" class="form-control" name="cpassword">
                    </div>
                </div>
                <div class="col-4">
                    <label for="imageUri" class="col-form-label">CONFIRMATION MOT DE PASSE</label>
                    <input type="file" id="imageUri" name="imageUri" class="form-control"/>
                </div>

                <div class="col-4">
                    <label class="custom-control custom-radio ">
                        <input type="radio" name="gender" checked="" value="0" class="custom-control-input"><span class="custom-control-label">HOMME</span>
                    </label>
                    <label class="custom-control custom-radio ">
                        <input type="radio" name="gender" value="1" class="custom-control-input"><span class="custom-control-label">FEMME</span>
                    </label>
                </div>
                <div class="col-4">
                    <label for="ville_id" class="col-form-label">VILLE ACTUELLE</label>
                    <select class="form-control"  name="ville_id" id="ville_id">
                        <option value="0">CHOIX D'UNE VILLE</option>
                        <?php foreach($villes as $ville): ?>
                            <option value="<?= $ville->id ?>"><?= $ville->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div style="max-width: 400px; margin: 10px auto" class="card-footer">
                <button type="submit" class="btn-sm btn btn-block btn-success"><i class="fa fa-save"></i> ENREGISTRER</button>
            </div>
        </form>

    </div>

</div>
<?= $this->Html->script('../assets_concept_template/libs/js/main-js.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/inputmask/js/jquery.inputmask.bundle.js') ?>
<script>

    $(function (e) {
       "use strict";
        $(".phone").inputmask("999-99-99")
    });

</script>

