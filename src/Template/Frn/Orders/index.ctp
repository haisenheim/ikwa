
<div class="page-header">
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'COMMANDES'
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

    <div class="card-header">
        <h3 >&nbsp;LISTE DES COMMANDES CLIENTS</h3>

        <form action="<?= $this->Url->build(['action'=>'index']) ?>" class=" form-inline pull-right" method="post">
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
                <button class="btn btn-danger btn-sm"><i class="fa fa-search-minus"></i>&nbsp; Rechercher</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered table-hover second">
            <thead>
            <tr>
                <th>NUMERO</th>
                <th>DATE</th>
                <th>CLIENT</th>
                <th>TOTAL</th>
                <th>ETAT</th>


                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order->name ?></td>
                    <td><?= date_format($order->created,"d-m-Y H:i") ?></td>
                    <td><?= $order->user?$order->user->name:'-' ?></td>
                    <td><?= $order->totalcmd  ?></td>
                    <td><?= $order->statut ?></td>
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

    </div>

</div>

<script>
$(document).ready(function(){
$('#example').DataTable({
"language": {
"paginate": {
"previous": "Precedent",
"search":"Rechercher",
"next":"Suivant"
}
}
});
})
</script>