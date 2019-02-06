<div class="header page-header text-center">
    <h4>LISTE DES FOURNISSEURS</h4>

</div>

<div>



    <div class="row">

        <?php foreach ($fournisseurs as $fournisseur): ?>
            <div class="col-md-2 col-lg-2 col-sm-12 btn" style="font-size-adjust: inherit; box-shadow: #cccccc 4px 2px 1px">
                <div class="card" style="box-shadow: #cccccc 2px 4px 8px">
                    <div class="card-header">
                        <h6 class="card-title" style="font-size: 13px;"><?= $this->Html->link($fournisseur->name, ['controller'=>'Fournisseurs','action'=>'view', $fournisseur->id]); ?></h6>
                    </div>
                    <div class="card-body" style="font-size: 11px">
                        <?= $fournisseur->email ?><br/>
                        <?= $fournisseur->telephone ?>
                    </div>
                    <div class="card-footer">
                        <?= $fournisseur->secteur? $fournisseur->secteur->name:'-' ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
