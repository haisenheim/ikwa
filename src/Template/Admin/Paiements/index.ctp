<div class="page-header">
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );

    $this->Breadcrumbs->add(
        'JOURNAL DES PAIEMENTS'

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
    <div style="margin-top: 20px" class="card-header">
        <h3 class="page-header text-center"><i class="fa fa-donate"></i> JOURNAL DES PAIEMENTS</h3>
        <form style="float: right" action="<?= $this->Url->build(['action'=>'index']) ?>" class=" form-inline" method="post">
            <div class="form-group">
                <label for="debut" class="control-label">PERIODE : &nbsp;</label>
                <input type="date" class="form-control" id="debut" name="debut"/>
            </div>
            <div class="form-group">
                <label for="fin">
                    <input type="date" class="form-control" id="fin" name="fin"/>
                </label>
            </div>

            <div class="form-group">
                <label for="fin"> FOURNISSEUR
                    <select class="form-control" name="fournisseur_id" id="">
                        <option value="0">CHOIX DUN FOURNISSEUR</option>
                        <?php foreach($fournisseurs as $frn): ?>
                        <option value="<?= $frn->id ?>"><?= $frn->name ?></option>
                        <?php endforeach  ?>

                    </select>
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-danger btn-sm"><i class="fa fa-search-minus"></i>&nbsp; Rechercher</button>
            </div>
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                <thead>
                <tr>
                    <th>DATE</th>
                    <th>CODE</th>
                    <th>COMMANDE</th>
                    <th>CLIENT</th>
                    <th>FOURNISSEUR</th>
                    <td>OPERATEUR</td>
                    <th>MONTANT </th>
                    <th>MONTANT FOURNISSEUR</th>
                    <th>MARGE IKWA</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($paiements as $paiement): ?>
                    <tr>
                        <td><?= date_format($paiement->created,'d/m/Y H:i:s') ?></td>
                        <td><?= $paiement->name ?></td>
                        <td><?= $paiement->order ? $this->Html->link($paiement->order->name, ['controller' => 'Orders', 'action' => 'view', $paiement->order->id]) : '' ?></td>
                        <td><?= $paiement->order ? $paiement->order->user->name : '-' ?></td>
                        <td><?= $paiement->fournisseur->name ?></td>
                        <td><?= $paiement->has('user') ? $paiement->user->name : '' ?></td>
                        <td><?= $paiement->total . " FCFA" ?></td>
                        <th><?= $paiement->total_fournisseur. " FCFA" ?></th>
                        <td><?= $paiement->marge_ikwa. "FCFA" ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/buttons.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/select.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/fixedHeader.bootstrap4.css') ?>


<?= $this->Html->script('../assets_concept_template/vendor/jquery/jquery-3.3.1.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/bootstrap/js/bootstrap.bundle.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/slimscroll/jquery.slimscroll.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/multi-select/js/jquery.multi-select.js') ?>
<?= $this->Html->script('../assets_concept_template/libs/js/main-js.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/jquery.dataTables.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.buttons.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/data-table.js') ?>

<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/jszip.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/pdfmake.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/vfs_fonts.js') ?>

<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.html5.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.print.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.colVis.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.rowGroup.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.select.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.fixedHeader.min.js') ?>

