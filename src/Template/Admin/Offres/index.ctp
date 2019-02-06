<div class="container">
<div class="page-header text-center header">
        <h2>GESTION DES OFFRES</h2>
    <h4>LISTE DES OFFRES</h4>
 </div>
    <ul class="list-inline pull-right">
        <li>
            <?= $this->Html->link('Creer',['action'=>'add'],['class'=>'btn btn-info btn-sm']) ?>
        </li>
    </ul>

    <table class="table table-bordered table-hover table-condensed" >
        <thead>
            <tr>

                <th>Intitule</th>
                <th>Secteur</th>
                <th>Categorie</th>
                <th>Fournisseur</th>
                <th>PF</th>
                <th>PN</th>
                <th>PV</th>
                <th>Date</th>
                <th>Statut</th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offres as $offre): ?>
            <tr>
                <td><?= h($offre->name) ?></td>
                <td><?= $offre->has('secteur') ? $offre->secteur->name : '' ?></td>
                <td><?= $offre->has('category') ? $offre->category->name: '' ?></td>
                <td><?= $offre->has('fournisseur') ? $offre->fournisseur->name: '' ?></td>
                <td><?= $this->Number->format($offre->prix_reel) ?></td>
                <td><?= $this->Number->format($offre->prix_nego) ?></td>
                <td><?= $this->Number->format($offre->prix_vente) ?></td>
                <td><?= date_format($offre->created, 'd-m-Y') ?></td>

                <td><?= $offre->statut?'<span class="btn-sm btn btn-success">actif</span>':'<span class="btn btn-danger btn-sm">inactif</span>' ?></td>
                <td class="actions">
                    <ul class="list-inline">
                        <li title="afficher" >
                            <a class="btn btn-info btn-xs" href="<?= $this->Url->build(['action'=>'view', $offre->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                        </li>
                        <li title="modifier" >
                            <a class="btn btn-success btn-xs" href="<?= $this->Url->build(['action'=>'edit', $offre->id]) ?>" ><i class="fa fa-pencil-alt"></i></a>
                        </li>
                        <li title="desactiver">
                            <a class="btn btn-default btn-xs" href="<?= $this->Url->build(['action'=>'disable', $offre->id]) ?>" ><i class="fa fa-2x fa-lock"></i></a>
                        </li>
                        <li title="mettre en ligne">
                            <a class="btn btn-primary btn-xs" href="<?= $this->Url->build(['action'=>'enable', $offre->id]) ?>" ><i class="fa fa-unlock"></i></a>
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
