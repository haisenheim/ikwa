<div class="card">
    <div class="card-header">
        <h3 class="page-header text-center">LISTE DE PRIX &numero;<?= $liste->name ?></h3>
    </div>
    <div class="card-body">
        <div class="">
            <h3><?= h($liste->name) ?></h3>
            <table class="vertical-table table table-bordered">
                <tr>
                    <th>NUMERO</th>
                    <td><?= h($liste->name) ?></td>
                </tr>


                <tr>
                    <th>DATE DE CREATION</th>
                    <td><?= $liste->created?date_format($liste->created,'d/m/Y'):'' ?></td>
                </tr>
                <tr>
                    <th>STATUT</th>
                    <td><?= $liste->active ?"ACTIVE" : "DESACTIVEE"; ?></td>
                </tr>
                <tr>
                    <th>EN COURS D'UTILISATION ?</th>
                    <td><?= $liste->actuel ? __('OUI') : __('NON'); ?></td>
                </tr>
            </table>
            <div  class="contents">
                <h4 class="page-header">LISTE DES ARTICLES</h4>
                <?php if (!empty($liste->listeitems)): ?>
                    <table id="example" class="table table-bordered table-hover table-striped">

                        <thead>
                        <tr>

                            <th>ARTICLE</th>

                            <th>PRIX AU MAGASIN</th>
                            <th>PRIX REDUIT</th>
                            <th>PRIX DE VENTE SUR IKWA</th>
                            <th>TAUX DE REDUCTION</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($liste->listeitems as $listeitems): ?>
                            <tr>
                                <td><?= h($listeitems->offre->name) ?></td>
                                <td><?= h($listeitems->prix_magasin) ?></td>
                                <td><?= h($listeitems->prix_ikwa) ?></td>
                                <td><?= h($listeitems->prix) ?></td>
                                <td><?= round($listeitems->taux,2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
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