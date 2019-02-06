<div class="page-header">
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'LISTES DE PRIX',
        ['controller' => 'Listes', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'NOUVELLE LISTE'
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
        <h3 class="page-header text-center">NOUVELLE LISTE DES PRIX</h3>
    </div>

    <div class=" card-body">
        <div class="">
            <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>

            <div class="contents">
                <input type="checkbox" id="select_all"/> Selectionner tout
            </div>


            <hr style="margin: 5px 0"/>

            <div class="row contents">
                <?php foreach($offres as $offre): ?>
                    <div class="col-sm-6 col-md-2" style="font-size: small">
                        <span><input type="checkbox" class="item" data-name="<?= $offre->name ?>"   data-id="<?= $offre->id ?>"/> <?= $offre->name ?></span>
                    </div>
                <?php endforeach ?>
            </div>
            <hr/>
            <a href="" style="" id="edit"><i class="fa fa-pencil-alt"></i>Editer</a>
            <hr/>
            <div class="loader"></div>
            <table id="tab" class=" content table table-bordered table-condensed table-hover table-striped" style="font-size: small">
                <thead>
                <tr>
                    <th></th>
                    <th>ARTICLE</th>
                    <th>PRIX MAGASIN</th>
                    <th>PRIX MINIMUM</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <hr style="margin: 8px 0"/>
            <div>
                <div class="form-group contents" style="max-width: 400px">
                    <label for="">DATE DE LIMITE DE VALIDITE DE LA LISTE</label>
                    <input id="date_limite" type="date" class="form-control" />
                </div>
                <hr/>

                <div class="" style="margin: 30px auto; max-width: 400px">
                    <button id="btn-save" class="btn btn-success btn-block btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                </div>


            </div>
        </div>

    </div>
</div>


<script>
    $('.loader').hide();
    $('#select_all').click(function(){
        if($('#select_all').is(':checked')){
           $('.item').each(function(){
               $(this).prop("checked",true)
           })
        }else{
            $('.item').each(function(){
                $(this).prop("checked",false)
            })
        }
    });

    $('#edit').click(function (e) {
        e.preventDefault();
        $('.item').each(function(){
            if($(this).is(':checked')){
                var tr='<tr class="line" data-id='+ $(this).data("id")+'><td class="remove"><i class="fa fa-trash" style="font-size: small"></i></td><td>'+ $(this).data("name")+'</td><td style="text-align: right" contenteditable="true"></td> <td style="text-align: right" contenteditable="true"></td></tr>';
                $('#tab').find('tbody').append(tr);
                $('.remove').click(function(e){
                    e.preventDefault();
                    $(this).parent('tr').remove();
                });
            }
        });
    });

    var saveUrl="<?= $this->url->build(['controller'=>'listes','action'=>'createJson']) ?>";
    var redirectUrl= "<?= $this->Url->build(['controller'=>'listes','action'=>'view']) ?>";

    $('#btn-save').click(function(e){
        e.preventDefault();
        var date_limite = $('#date_limite').val();
        if(date_limite.length<2){
            alert('Veuillez selectionner une date limite pour vos differentes offres !!!');
        }else{
            var data = [];
            $('.line').each(function(){
                var elt = {};
                elt.id=$(this).data('id');
                if(!$.isNumeric($(this).find('td').eq(2).text())){
                    alert('Certaines informations ne sont pas correctes !!!');
                    $(this).find('td').eq(2).css({
                        'border':'red 1px solid'
                    });

                }else{
                    elt.pm=$(this).find('td').eq(2).text();
                    if(!$.isNumeric($(this).find('td').eq(3).text())){
                        alert('Certaines informations ne sont pas correctes !!!');
                        $(this).find('td').eq(3).css({
                            'border':'red 1px solid'
                        })
                    }else{
                        elt.pp=$(this).find('td').eq(3).text();
                    }
                }
                data.push(elt);
            });

           // console.log(data);


            $.ajax({
               url:saveUrl,
                type:"post",
                dataType:"json",
                data:{offres:data, _csrf:$('#csrf').val(),date_limite:date_limite},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token',$('#_csrf').val())
                    $('.loader').show();
                },
                success:function(data){
                    if(data.id!=null){
                        window.location.replace(redirectUrl+"/"+data.id);
                    }else{
                        $('.loader').hide();
                    }
                },
                Error: function(){
                    $('.loader').hide();
                }
            });

        }
        //alert(date_limite);
    })




</script>