<h3 class="page-header text-center">Factures pendantes</h3>
<table class="table table-bordered table-striped table-condensed">
    <thead>
    <tr>
        <th>&numero;</th>
        <th>Point de Collecte</th>
        <th>Date</th>
        <th>Montant</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($factures as $facture): ?>
    <tr>
        <td><?= $this->Html->link($facture->name,['action'=>'view',$facture->id]) ?></td>
        <td><?= $facture->point?$facture->point->name:'-' ?></td>
        <td><?= date_format($facture->created,'d-m-Y') ?></td>
        <td><?= $facture->montant ?></td>
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
        <p><?= $this->Paginator->counter() ?></p>
    </div>
