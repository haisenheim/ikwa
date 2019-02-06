<div>
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'GRILLES',
        ['controller' => 'Grilles', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'NOUVELLE GRILLE'
    );

    ?>
    <div class="page-breadcrumb page-header">
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
        <h3 class="page-header text-center">NOUVELLE GRILLE DE FACTURATION</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Borne inferieure</label>
                    <input type="number" id="min" class="form-control"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Borne superieure</label>
                    <input type="number" id="max" class="form-control"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Pourcentage(%) </label>
                    <input type="number" id="coef" class="form-control"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group" style="margin-top: 35px">
                    <button id="btn-add" class="btn-primary btn btn-sm"><i class="fa fa-plus-circle"></i></button>
                </div>
            </div>
        </div>
        <hr/>
        <div>
            <table id="tab" class="table table-bordered">
                <thead>
                    <tr>
                        <th>DE</th>
                        <th>A</th>
                        <th>POURCENTAGE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
    <div style="margin: 30px auto; max-width: 400px">
        <button id="btn-save" class="btn-sm btn-block btn-success btn-rounded btn"><i class="fa fa-save"></i> ENREGISTERER</button>
    </div>
</div>


<script>
    $('#btn-add').click(function (e) {
        e.preventDefault();
        if(($('#min').val()<1)|| ($('#max').val().length<1) || ($('#coef').val().length<1) ){
            alert('Donnees invalides !!!');
        } else{
            var min= $('#min').val();

            var max = $('#max').val();
            var coef =$('#coef').val();
            var tr='<tr  class="item" data-min='+ min +' data-max='+ max + ' data-coef='+ coef+'><td>'+ min+'</td><td>'+ max+'</td><td>'+ coef+'</td><td class="remove"><i class="fa fa-trash"></i></td></tr>';
            $('#tab').find('tbody').append(tr);
        }
    });

    var saveUrl="<?= $this->url->build(['controller'=>'Grilles','action'=>'saveJson']) ?>";
    var redirectUrl= "<?= $this->Url->build(['controller'=>'Grilles','action'=>'view']) ?>";

    $('#btn-save').click(function(e){
        e.preventDefault();

            var data = [];
            $('.item').each(function(){
                var elt = {};
                elt.id=$(this).data('id');

                    elt.min=$(this).find('td').eq(0).text();

                    elt.max=$(this).find('td').eq(1).text();
                     elt.coef=$(this).find('td').eq(2).text();


                data.push(elt);
            });

            // console.log(data);


            $.ajax({
                url:saveUrl,
                type:"post",
                dataType:"json",
                data:{items:data, _csrf:$('#csrf').val()},
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


        //alert(date_limite);
    })




</script>