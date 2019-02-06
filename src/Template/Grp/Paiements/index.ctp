
<h3 class="page-header text-center">JOURNAL DES VERSEMENTS</h3>

<div class="paiements index large-9 medium-8 columns content">

    <table cellpadding="0" cellspacing="0" class="table table-striped table-condensed table-bordered">
        <thead>
            <tr>

                <th>CODE DU VERSEMENT</th>
                <th>DATE</th>
                <th>FOURNISSEUR</th>
                <th>MONTANT</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paiements as $paiement): ?>
            <tr>

                <td><?= h($paiement->name) ?></td>
                <td><?= h($paiement->created) ?></td>
                <td><?= $paiement->fournisseur? $paiement->fournisseur->name: '' ?></td>
                <td><?= $paiement->montant ?></td>


                <td class="actions">
                    <ul class="list-inline">
                        <li class="btn btn-xs btn-info">
                            <a title="Afficher" href="<?= $this->Url->build(['controller' => 'Paiements', 'action' => 'view', $paiement->id]) ?>"> <i class="glyphicon glyphicon-list"></i></a>
                        </li>

                        <li class="btn btn-xs btn-success">
                            <a title="Imprimer" href="<?= $this->Url->build(['controller' => 'Paiements', 'action' => 'printit', $paiement->id,'_ext'=>'pdf']) ?>"> <i class="glyphicon glyphicon-print"></i></a>
                        </li>
                    </ul>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>
