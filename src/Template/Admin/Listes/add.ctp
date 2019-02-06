
<div class="">
    <div>
        <h3 class="page-header text-center">NOUVELLE LISTE DES PRIX</h3>
    </div>

    <div class="fiche">
        <div class="fiche-inner">

            <form action="">
                <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
                <div class="form-group" style="max-width: 400px">
                    <label for="">DATE DE LIMITE DE VALIDITE DE LA LISTE</label>
                    <input type="date" class="form-control" />
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <label for="">OFFRE</label>
                        <select class="form-control" name="" id="offre_id">
                            <option value="0">SELECTIONNER UN ARTICLE</option>
                            <?php foreach($offres as $offre): ?>
                                <option value="<?= $offre->id ?>"><?= $offre->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <label for="">PRIX EN MAGASIN</label>
                        <input type="number" class="form-control" id="prix_magasin"/>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <label for="">PRIX PLANCHER</label>
                        <input type="number" class="form-control" id="prix_plancher"/>
                    </div>
                    <div class="col-sm-12 col-md-1">
                        <button id="btn-add" style="margin-top: 30px" class="form-control btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                    </div>
                </div>
                <hr/>
                <div>
                    <table id="tab" class="table table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>ARTICLE</th>
                                <th>PRIX MAGASIN</th>
                                <th>PRIX PLANCHER</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="" style="margin: 30px auto; max-width: 400px">
                        <button class="btn btn-success btn-block btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>


<script>
    $('#btn-add').click(function (e) {
        e.preventDefault();
       if(($('#offre_id').val()==0)|| ($('#prix_magasin').val().length<2) || ($('#prix_plancher').val().length<0) ){
           alert('Donnees invalides !!!');
       } else{
           var offre_id= $('#offre_id').val();
           var offre = $('#offre_id option:selected').text();
           var pm = $('#prix_magasin').val();
           var pp=$('#prix_plancher').val();
           var tr='<tr class="item" data-id='+ offre_id +' data-pp='+ pp + ' data-pm='+ pm+'><td>'+ offre+'</td></tr>';
            $('#tab').find('tbody').append(tr);
       }
    });
</script>