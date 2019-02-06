<h2 class="page-header text-center"><i class="fa fa-money-bill-alt"></i> &nbsp; POINTS DE VENTE</h2>



<div>



    <div class="row">

        <?php foreach ($points as $fournisseur): ?>
            <div class="col-md-2 col-lg-2 col-sm-12 btn" style="font-size-adjust: inherit; box-shadow: #cccccc 4px 2px 1px">
                <div class="card" style="box-shadow: #cccccc 2px 4px 8px">
                    <div class="card-header">
                        <h6 class="card-title" style="font-size: 13px;"><?= $this->Html->link($fournisseur->name, ['controller'=>'Points','action'=>'view', $fournisseur->id]); ?></h6>
                    </div>
                    <div class="card-body" style="font-size: 10px">
                        <?= $fournisseur->adresse ?><br/>
                        <i class="fa fa-phone"></i><?= $fournisseur->phone ?>
                    </div>
                    <div class="card-footer" style="font-size: 12px">
                        <i class="fa fa-user"></i> <?=  $fournisseur->responsable ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>


