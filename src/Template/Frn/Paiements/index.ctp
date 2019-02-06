<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paiement[]|\Cake\Collection\CollectionInterface $paiements
 */
?>

<div>
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'JOURNAL DE CAISSE',
        ['controller' => 'Paiements', 'action' => 'index']
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
        <h3 class="card-title page-header">JOURNAL DES PAIEMENTS</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="dataTable table table-bordered table-striped">
                <thead>
                <tr>
                    <th>DATE</th>
                    <th>CODE</th>
                    <th>COMMANDE</th>
                    <th>CLIENT</th>
                    <th>OPERATEUR</th>
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
