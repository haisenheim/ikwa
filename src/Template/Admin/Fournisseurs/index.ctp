

<div class="card">

    <div style="margin-top: 20px" class="card-header">
        <h2>LISTE DES FOURNISSEURS  <a style="float: right" href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-plus-circle"></i> &nbsp;AJOUTER </a></h2>
    </div>

    <div class="card-body">

        <table class="table table-hover table-bordered table-striped table-condensed">
            <thead>
            <tr>

                <th>Nom</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Groupe</th>
                <th>Ville</th>

                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($fournisseurs as $fournisseur): ?>
                <tr>

                    <td><?= h($fournisseur->name) ?></td>
                    <td><?= $fournisseur->telephone .'-'. $fournisseur->mobile ?></td>
                    <td><?= h($fournisseur->email) ?></td>
                    <td><?= $fournisseur->groupe?$fournisseur->groupe->name:'-' ?></td>
                    <td><?= $fournisseur->has('ville') ? $fournisseur->ville->name : '-' ?></td>

                    <td>
                        <ul style="margin-bottom: 0" class="list-inline">
                            <li class="list-inline-item" title="afficher" >
                                <a class="btn btn-rounded btn-info btn-xs" href="<?= $this->Url->build(['action'=>'view', $fournisseur->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                            </li>
                            <li class="list-inline-item" title="modifier" >
                                <a class="btn btn-success btn-rounded btn-xs" href="<?= $this->Url->build(['action'=>'edit', $fournisseur->id]) ?>" ><i class="fa fa-edit"></i></a>
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
</div>

