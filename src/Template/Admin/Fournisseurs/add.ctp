
    <h3 class="page-header text-center" style="font-family: cakefont">NOUVEAU FOURNISSEUR</h3>



<div class="container">

   <div class="fiche">
       <div class="fiche-inner">
           <form enctype="multipart/form-data" action="<?= $this->Url->build(['action'=>'add']) ?>" method="post">
               <div class="">
                   <div class="">
                       <div style="border: solid 1px #ccc; padding: 10px; border-radius: 7px">
                           <h6 class="page-header">INFORMATIONS FOURNISSEUR</h6>
                           <div class="row">
                               <div class="col-md-4 col-lg-4 col-sm-12">
                                   <div class="form-group">
                                       <label class="control-label" for="code">CODE</label>
                                       <input type="text" class="form-control" id="code" name="code"/>
                                   </div>
                               </div>
                               <div class="col-md-8 col-lg-8 col-sm-12">
                                   <div class="form-group">
                                       <label class="control-label" for="name">NOM</label>
                                       <input type="text" class="form-control" id="name" name="name"/>
                                   </div>
                               </div>
                               <div class="col-md-12 col-lg-12 col-sm-12">
                                   <div class="form-group">
                                       <label class="control-label" for="adresse">ADRESSE</label>
                                       <input type="text" class="form-control" id="adresse" name="adresse"/>
                                   </div>
                               </div>
                               <div class="col-md-6 col-lg-6 col-sm-12">
                                   <div class="form-group">
                                       <label class="control-label" for="phone">TELEPHONE</label>
                                       <input type="tel" class="form-control" id="phone" name="phone"/>
                                   </div>
                               </div>
                               <div class="col-md-6 col-lg-6 col-sm-12">
                                   <div class="form-group">
                                       <label class="control-label" for="mobile">MOBILE</label>
                                       <input type="tel" class="form-control" id="mobile" name="mobile"/>
                                   </div>
                               </div>
                               <div class="col-md-12 col-lg-12 col-sm-12">
                                   <div class="form-group">
                                       <label class="control-label" for="email">EMAIL</label>
                                       <input type="email" class="form-control" id="email" name="email"/>
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
                                       <label class="control-label" for="cpassword">CONFIRMATION</label>
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

               <div class="form-group" style="margin: 30px auto; max-width: 400px ">
                   <button type="submit" class="btn btn-sm btn-success btn-block"><i class="fa fa-save"></i> &nbsp; ENREGISTRER </button>
               </div>
           </form>
       </div>
   </div>


</div>


