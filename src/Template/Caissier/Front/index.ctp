<h2 style="font-family: cakefont" class="page-header text-center">CAISSE IKWA</h2>
<div>

    <div class="row">
        <div class="col-md-5">
            <form action="<?= $this->Url->build(['action' => 'index']) ?>" method="post">
            <div class="card-body" style="padding: 20px">


                <div class="form-group">
                    <label class="control-label" for="">CODE DE COMMANDE</label>
                    <input type="text" name="order_name" class="form-control" id="order_id"/>
                </div>
                <div class="" style="max-width: 400px; margin: 30px auto">
                    <button type="submit" id="btn-search" class="btn btn-block btn-danger"><i class="fa fa-search"></i> CHARGER</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-7 card">

            <?php if(isset($order)): ?>
                <h3 class="page-header text-center" style="font-weight: 900; font-family: cakefont"><?= $order->name ?></h3>
                <div class="row">
                    <div class="col-md-8">
                        <h5 id="user_name" class="page-header"> <?= $order->user->imageUri?$this->Html->image($order->user->imageUri,['style'=>'max-width:150px; max-height:100px']):$this->Html->image('avatar.png',['style'=>'max-width:150px; max-height:100px']) ?> <?= $order->user->name ?></h5>
                    </div>
                    <div class="col-md-4">
                        <p><?= $order->created?date_format($order->created,'d/m/Y H:i'):'-' ?></p>
                    </div>
                </div>
            <div id="order_content">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th></th>
                            <th>DESIGNATION</th>
                            <th>QUANTITE</th>
                            <th>PRIX UNITAIRE</th>
                            <th>TOTAL LIGNE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($order->ordersitems as $items): ?>
                            <tr>
                                <td><?= $items->offre->photo?$this->Html->image($items->offre->photo,['style'=>'max-width:75px; max-height:75px']):$this->Html->image('logo-indefini.png',['style'=>'max-width:75px; max-height:75px']) ?></td>
                                <td><?= $items->offre->name ?></td>
                                <td><?= $items->quantity ?></td>
                                <td><?= $items->prix ?></td>
                                <td style="text-align: right"><?= $items->total ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th colspan="4">TOTAL :</th>
                            <th id="total" style="text-align: right; font-weight: 900">7894049</th>
                        </tr>
                    </tbody>
                </table>
            </div>
                <hr/>

            <form action="<?= $this->Url->build(['action' => 'payer']) ?>" method="post">
            <div style="margin-bottom: 20px" class="row" id="">
                <input type="hidden" name="order_id" value="<?= $order->id ?>"/>
                <input type="hidden" name="total" value="<?= $order->total ?>"/>
                <div class="col-md-4">
                    <label for="" class="control-label">MONTANT PERCU</label>
                    <input type="number" name="percu" id="percu" class="form-control"/>
                </div>
                <div class="col-md-4">
                    <label for="" class="control-label">REMBOURSEMENT</label>
                    <input type="number" name="reste" id="reste" class="form-control" disabled/>
                </div>
                <div class="col-md-4">
                    <button data-toggle="confirm" data-title="ATTENTION!" data-message="CONFIRMEZ - VOUS CETTE OPERATION?" data-type="danger" style="margin-top: 35px" class="btn-danger btn btn-block btn-sm"><i class="fa fa-donate"></i> ENCAISSER </button>
                </div>
            </div>
            </form>
                <hr/>

            <?php endif; ?>
        </div>
    </div>

</div>

<script>
    $('#percu').keyup(function () {
        var val = $('#percu').val();
        if(val.length>2){
            var percu = parseInt(val);
            var total = parseInt($('#total').text());
            $('#reste').val(percu - total);
        }
    });

</script>