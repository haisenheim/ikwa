


<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <p>COMMANDE: <?= $order->name ?></p>
                <p>DATE: <?= date_format($order->created,'d/m/Y H:i:s') ?></p>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="">
            <div>
                <div class="card">
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

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
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
    var buyUrl = "<?= $this->Url->build(['controller'=>'Orders', 'action'=>'serveAjax', 'prefix'=>'api']) ?>";

    $('#btn-serve').click(function(e){
        e.preventDefault();
        $.ajax({
            url:buyUrl,
            type:"POST",
            dataType:"Json",
            data:{id:$('#order_id').val(), server_id:$('#payer_id').val()},
            success:function(data){
                window.location.reload();
            }
        });
    });


</script>