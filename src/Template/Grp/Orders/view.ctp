<!--<div class="flash" id="flashbar">
    <span class="pull-right" style="float: right" id="close" onclick="$('#flashbar').hide()">X</span>
    <div id="flashmsg"></div>
</div>-->
<h3 class="page-header text-center"> <span class="btn btn-sm <?=$order->status<1?'btn-danger':'btn-success' ?>"><i class="fa fa-flag-checkered"></i> <?= $order->statut ?> </span>
    COMMANDE: <?= $order->name ?>
    <span class="pull-right" style="margin-left: 5%; font-size: smaller"><i class="fa fa-clock"></i> &nbsp; <?= $order->created ?></span>
    <span class="" style="margin-left: 5%; font-size: smaller"> <i class="fa fa-shopping-cart" style="font-size: large"></i> &nbsp; <?=$order->fournisseur? $order->fournisseur->name:'NON DEFINI' ?> </span> </h3>

<div class="row">
    <input type="hidden" id="order_id" value="<?= $order->id ?>"/>
    <input type="hidden" id="payer_id" value="<?= $user['id'] ?>"/>

    <div class="col-md-4 col-sm-12 col-lg-4">
        <div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><?= $order->user?$order->user->name:'-' ?></h5>
                </div>
                <div class="card-body">
                    <div style="height: 100px; width: 100px; display: inline-block" >
                        <?= $this->Html->image($order->user->imageUri?$order->user->imageUri:'avatar.png',['fullBase'=>true, 'class'=>'img img-rounded','width'=>'100%', 'height'=>'100%']) ?>
                    </div>
                    <div class="" style="display: inline-block">
                       NOM : <?= $order->user->last_name ?> <br/>
                        PRENOM : <?= $order->user->first_name ?> <br/>
                        TEL : <?= $order->user->phone ?>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px">
            <div style="margin-left: 30px; font-size: x-small; font-weight: 800">
                <button style="box-shadow: 1px 2px 1px #CCC" class="btn btn-danger btn-sm" id="btn-buy"><i class="fa fa-donate"></i> &nbsp; Encaisser</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-lg-6">
        <div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">TOTAL : <?= $order->totalcmd . " FCFA" ?></h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <?php foreach($order->ordersitems as $item): ?>
                        <tr>
                            <td class="" style="width: 25%">
                                <?= $this->Html->image($item->offre->photo?$item->offre->photo:'banniere.png',['fullBase'=>true, 'class'=>'img img-rounded','width'=>'50px', 'height'=>'50px']) ?>
                            </td>
                            <td>
                                <div class="" style="font-size: 12px">
                                    <span style="font-size: 14px; font-weight: 800"><?= $item->offre->name ?></span>
                                    <br/>
                                    <?= $item->offre->prix_vente . " FCFA" ?> <br/>
                                   <span><?= 'QUANTITE : '. $item->quantity ?></span>  <br/>
                                    <span style="font-size: 14px; font-weight: 800">Sous Total :<?= ($item->offre->prix_vente * $item->quantity) . " FCFA" ?></span>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var buyUrl = "<?= $this->Url->build(['controller'=>'Orders', 'action'=>'buyAjax', 'prefix'=>'api']) ?>";

    $('#btn-buy').click(function(e){
        e.preventDefault();
        $.ajax({
            url:buyUrl,
            type:"POST",
            dataType:"Json",
            data:{id:$('#order_id').val(), payer_id:$('#payer_id').val()},
            success:function(data){
                window.location.reload();
            }
        });
    });


</script>