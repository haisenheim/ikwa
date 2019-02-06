<div class="header page-header text-center" style="margin-bottom: 20px; padding-top: 20px; padding-bottom: 10px; border-bottom: solid 1px #808080">
    <h2>GESTION DES OFFRES</h2>
    <h4>Nouvelle Offre</h4>
</div>

<div class="container">
    <form enctype="multipart/form-data" action="<?= $this->Url->build(['action'=>'add']) ?>" class="form" method="post">
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for=""> Intitule </label>
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Intitule de l'offre"/>

                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label for=""> prix reel </label>
                        <input type="number" class="form-control form-control-sm" name="prix_reel" placeholder="Le prix reel de cette offre ..."/>
                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label for=""> prix negocie </label>
                        <input type="number" class="form-control form-control-sm" name="prix_nego" placeholder="Le prix negocie pour cette offre ..."/>
                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label for=""> prix de vente </label>
                        <input type="number" class="form-control form-control-sm" name="prix_vente" placeholder="Le prix de vente de cette offre ..."/>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for=""> Secteur d'activite
                        <select  class="form-control form-control-sm" name="secteur_id">
                            <option value="0">Choix du secteur</option>
                            <?php foreach($secteurs as $s): ?>
                                <option value="<?= $s->id ?>"><?= $s->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for=""> Categorie de l'offre
                        <select  class="form-control form-control-sm" name="category_id">
                            <option value="0">Choix de la categorie</option>
                            <?php foreach($categories as $s): ?>
                                <option value="<?= $s->id ?>"><?= $s->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for=""> Fournisseurs
                        <select  class="form-control form-control-sm" name="fournisseur_id">
                            <option value="0">Choix du fournisseur</option>
                            <?php foreach($fournisseurs as $s): ?>
                                <option value="<?= $s->id ?>"><?= $s->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for=""> Quota </label>
                        <input type="number" class="form-control form-control-sm" name="quota" placeholder="Quota de personne a atteindre pour cette offre ..."/>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group form-control-label">
                    <label for=""> Duree de validite </label>
                        <input type="number" class="form-control form-control-sm" name="duree" placeholder="Duree de validite pour cette offre ..."/>

                </div>
            </div>

            <div class="col-md-2">
                <div class="form-check form-check-inline">

                    <input type="checkbox" class="checkbox" name="statut" placeholder="Le prix reel de cette offre ..."/>
                    <label class="label label-danger" for=""> Statut </label>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> Photo de l'offre </label>
                        <input type="file" class="form-control-file" name="photo" placeholder="image associee a l'offre ..."/>

                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="description">Description </label>
                        <textarea name="description" id="description" class="form-text form-control form-control-sm" cols="30" rows="10"></textarea>

                </div>
            </div>

            <div class="col-lg-offset-5 col-md-offset-5 col-md-10">
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>

        </div>
    </form>
</div>


