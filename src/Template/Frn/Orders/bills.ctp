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

<h3 class="page-header text-center">JOUNAL DE CAISSE</h3>


<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th>COMMANDE</th>
            <th>DATE</th>
            <th>CLIENT</th>
            <th>TOTAL</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order->name ?></td>
                <td><?= $order->date_paie ?></td>
                <td><?=  $order->user?$order->user->name." - ".$order->user->phone:'-' ?></td>
                <td><?= $order->totalcmd  ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->element('pagination'); ?>