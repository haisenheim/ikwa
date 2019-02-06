<h4 class="page-header text-center">
    FACTURE: <?= $facture->name ?>
    <span class="pull-right" style="margin-left: 5%; font-size: smaller"><i class="fa fa-clock"></i> &nbsp; <?= $facture->created ?></span>
    <span class="pull-right" style="margin-left: 5%; font-size: smaller"><i class="fa fa-money-bill-alt"></i> &nbsp; <?= $facture->point?$facture->point->name:'-' ?></span>
</h4>

<div class="content">

  <h5>LISTE DES COMMANDES</h5>
    <div class="related">

        <?php if (!empty($facture->orders)): ?>
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>

                <th>&numero;</th>
                <th>DATE</th>
                <th>CLIENT</th>
                <th>DATE DE PAIEMENT</th>
                <th>RECEVEUR</th>
                <th>MONTANT</th>
            </tr>
            <?php foreach ($facture->orders as $orders): ?>
            <tr>

                <td><?= $this->Html->link($orders->name,['controller'=>'Orders','action'=>'view',$orders->id]) ?></td>
                <td><?= date_format($orders->created,'d-m-y') ?></td>
                <td><?= $orders->user?$orders->user->name .' - '.$orders->phone:''?></td>

                <td><?= date_format($orders->date_paie,'d-m-y') ?></td>

                <td><?= $orders->payer?$orders->payer->name:'-' ?></td>
                <td><?= $orders->totalcmd ?></td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
