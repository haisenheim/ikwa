<div class="">
<div class="">


 </div>


    <div class="contents">


        <div class="card">
            <div class="card-header">
                <h4 class="page-header"><i class="fa fa-cart-plus"></i> LISTE DES OFFRES</h4>
                <ul class="list-inline pull-right">
                    <li>
                        <a class="btn btn-success btn-sm" href="<?= $this->Url->build(['action'=>'add']) ?>"><i class="fa fa-plus-circle"></i> AJOUTER</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover table-striped table-condensed" >
                    <thead>
                    <tr>

                        <th>Intitule</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th class="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($offres as $offre): ?>
                        <tr>
                            <td><?= h($offre->name) ?></td>
                            <td><?= date_format($offre->created, 'd-m-Y') ?></td>

                            <td><?= $offre->statut?'<span class="text-success">actif</span>':'<span class="text-danger">inactif</span>' ?></td>
                            <td class="actions">
                                <ul class="list-inline" style="margin-bottom: 0">
                                    <li class="list-inline-item" title="afficher" >
                                        <a class="btn btn-xs btn-info" href="<?= $this->Url->build(['action'=>'view', $offre->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                                    </li>
                                    <li class="list-inline-item" title="modifier" >
                                        <a class="btn btn-xs btn-primary" href="<?= $this->Url->build(['action'=>'edit', $offre->id]) ?>" ><i class="fa fa-pencil-alt"></i></a>
                                    </li>

                                    <?php if($offre->statut): ?>

                                        <li class="list-inline-item" title="desactiver">
                                            <a class="btn-danger btn-xs btn" href="<?= $this->Url->build(['action'=>'disable', $offre->id]) ?>" ><i class="fa  fa-lock"></i></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="list-inline-item" title="mettre en ligne">
                                            <a class="btn btn-success btn-xs" href="<?= $this->Url->build(['action'=>'enable', $offre->id]) ?>" ><i class="fa fa-unlock"></i></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

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