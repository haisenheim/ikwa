<script>

$(document).ready(function() {

    $('.note').editable({
        type: 'textarea',
        name: 'note',
        url: '/admin/orders/editable',
        title: 'note',
        placement: 'left'
    });

});

</script>

<h3 class="page-header">Liste des commandes</h3>


<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th>NUMERO</th>
            <th>DATE</th>
            <th>CLIENT</th>
            <th>TOTAL</th>
            <th>ETAT</th>
            <th>Point de vente</th>
            <th>Operateur</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order->name ?></td>
                <td><?= $order->created ?></td>
                <td><?= $order->user?$order->user->name:'-' ?></td>
                <td><?= $order->totalcmd  ?></td>
                <td><?= $order->statut ?></td>
                <td><?= $order->payer?$order->payer->point->name:'-' ?></td>
                <td><?= $order->payer?$order->payer->name:'-' ?></td>
                <td class="actions">

                    <ul class="list-inline" style="margin-bottom: 0; text-align: center">
                        <li class="" style="" title="afficher" >
                            <a class="btn btn-sm btn-dark" style="padding: 2px" href="<?= $this->Url->build(['action'=>'view', $order->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->element('pagination'); ?>