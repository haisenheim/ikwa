<div class="col-lg-12 col-md-12">
    <div class="card">



        <div class="header page-header text-center">
            <h2>GESTION DES CONTRATS</h2>
            <h4 class="title">NOUVEAU CONTRAT</h4>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="content">
                    <form method="post" action="<?= $this->Url->build(['action'=>'add']) ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="fournisseur_id">Fournisseur</label>
                                    <select name="fournisseur_id" id="fournisseur_id" class="form-control border-input">
                                        <option value="0">Veuillez selectionner un fournisseur</option>
                                        <?php foreach($fournisseurs as $frn): ?>
                                            <option value="<?= $frn->id ?>"><?= $frn->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="quality">Lieu de livraison</label>
                                    <input type="text" id="lieu_livraison" class="form-control border-input" name="lieu_livraison" placeholder="Le lieu de livraison   ">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="quality">Marquage</label>
                                    <input type="text" id="marque" class="form-control border-input" name="lieu_livraison" placeholder="Marquage   ">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="pincoterm_id">Incoterm d'achat</label>
                                    <select name="pincoterm_id" id="pincoterm_id" class="form-control border-input">
                                        <option value="0">Veuillez selectionner un incoterm</option>
                                        <?php foreach($pincoterms as $frn): ?>
                                            <option value="<?= $frn->id ?>"><?= $frn->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">

                                <label for="pliste_id">Liste de prix</label>
                                <select name="pliste_id" id="pliste_id" class="form-control border-input">
                                    <option value="0">Choix d'une liste de prix</option>
                                    <?php foreach($plistes as $f): ?>
                                        <option value="<?= $f->id ?>"><?= $f->name ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row" style="border:lightgrey 1px solid; margin:5px; padding: 15px">

                                    <div class="" >
                                        <h6 class="page-header">Conditions de paiement</h6>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="quality">Acompte</label>
                                                <input type="text" id="first_account" class="form-control border-input" name="first_account" placeholder="   ">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="quality">Solde par DP</label>
                                                <input type="text" id="second_account" class="form-control border-input" name="second_account" placeholder="   ">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="quality">Solde contre documents</label>
                                                <input type="text" id="third_account" class="form-control border-input" name="third_account" placeholder=" ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-9">
                                <div class="card" style="padding: 15px; font-size: 12px">

                                    <div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="essence_id">Essence</label>
                                                <select name="essence_id" id="essence_id" class="form-control border-input">
                                                    <option value="0">Choix de l'essence</option>
                                                    <?php foreach($essences as $f): ?>
                                                        <option value="<?= $f->id ?>"><?= $f->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="diameter">Diametre</label>
                                                    <input type="text" class="form-control border-input sale"  style="text-align: right;" name="diameter" id="diameter"/>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="diameter">Regles de mesure</label>
                                                    <input type="text" class="form-control border-input sale" name="rm" id="rm" style="float: left;"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="diameter">Quantite</label>
                                                    <input type="text" class="form-control border-input sale" name="qte" id="qte"/>
                                                </div>
                                            </div>

                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <button style="margin-top: 25px" class="btn btn-info" id="btn-add"><i class="ti-plus"></i> &nbsp;Ajouter </button>
                                                </div>

                                            </div>
                                        </div>
                                        <table class="table table-bordered table-condensed table-hover" id="tab">
                                            <thead>
                                            <tr>
                                                <th>Essence</th>
                                                <th>Diametre</th>
                                                <th>Regle de mesure</th>
                                                <th>Quantite</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>




                        </div>

                        <div class="row">
                            <h5>Conditions additionnelles:</h5>
                            <textarea id="additional_terms" style="min-height: 200px; min-width: 73%; border-radius: 5px;  border: solid 1px lightgrey; padding: 10px">


                            </textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" id="btn-save" class="btn btn-success btn-fill btn-sm"><i class="glyphicon glyphicon-floppy-save"></i>&nbsp;&nbsp;Enregistrer </button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    var saveUrl = "<?= $this->Url->build(['controller' => 'Purchasecontracts', 'action' => 'saveJson']) ?>";
    var redirectUrl = "<?= $this->Url->build(['controller' => 'Purchasecontracts', 'action' => 'view']) ?>";

    $('#btn-save').click(function(e){
        e.preventDefault();
        var frn = $('#fournisseur_id').val();
        var liv = $('#lieu_livraison').val();
        var fa= $('#first_account').val();
        var sa = $('#second_account').val();
        var adterms = $('#additional_terms').val();
        var marque=$('#marque').val();
        var ta = $('#third_account').val();
        var pl = $('#pliste_id').val();
        var ico = $('#pincoterm_id').val();

        var donnees = [];
        if(($('#tab').find('tbody').find('tr').length<1) || frn.length < 1 || ico.length<1){
            alert('Donnees de session invalides !!!');
        }
        else{
            $('#tab').find('tbody').find('tr.ligne').each(function(){
                var elt = {};
                elt.essence_id = $(this).find('td').eq(0).data('id');
                elt.diameter= $(this).find('td').eq(1).text();
                elt.mr= $(this).find('td').eq(2).text();
                elt.quantity= $(this).find('td').eq(3).text();
                donnees.push(elt);
            });
            //console.log(donnees);
            $.ajax({
                url:saveUrl,
                type:"POST",
                dataType:"JSON",
                data:{_csrf:$('#csrf').val(),donnees:donnees,pl:pl, liv:liv,marque:marque,  fa: fa,sa:sa,ta:ta, adt:adterms,pincoterm_id:ico,fournisseur_id:frn},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
                },
                success:function(data){
                    if(data){
                        window.location.replace(redirectUrl+'/'+data.pc.id);
                    }
                }
            });

        }

    });



    var totaltab = 0;
    $('#btn-add').click(function(e){
        e.preventDefault();
        if($('#essence_id').val() < 1 || $('#diameter').val().length<1 || $('#qte').val().length<1 ){
            alert('Les donnees sont incorrectes !!!');
        }else{

            var essenceid = $('#essence_id').val();
            var essence =$('#essence_id option:selected').html();
            var diam = parseFloat($('#diameter').val());
            var mr = $('#rm').val();
            var qt = parseFloat($('#qte').val());

            var tr;


            var tb = $("#tab").find('tbody');
            tr = '<tr class="ligne"><td data-id='+essenceid+'>'+ essence +'</td><td>'+ diam +'</td><td>'+ mr +'</td><td>'+ qt +'</td><td class="remove"><button class="btn btn-danger"><i class="ti-trash"></button></i></td></tr>';

            tb.append(tr);



            $('.sale').val('');


            $('.remove').click(function(e){
                e.preventDefault();
                totaltab = totaltab  -  parseFloat ($(this).parent('tr').find('.totl').text());
                console.log(totaltab);
                console.log(parseFloat ($(this).parent('tr').find('.totl').text()));
                //$('#som').remove();
                $(this).parent('tr').remove();
                // tb.append(trt);
            });

        }
    });



</script>

