<div class="card">
    <div class="card-header ">
        <h2 class="page-header" style="font-family: cakefont">LISTE DES VILLES</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-condensed" >
            <thead>
            <tr>
                <th>Nom</th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($villes as $secteur): ?>
                <tr>

                    <td><?= $secteur->name ?></td>
                    <td class="actions">
                        <ul style="margin-bottom: 0" class="list-inline">
                            <li title="afficher" >
                                <a class="btn btn-info btn-xs" href="<?= $this->Url->build(['action'=>'view', $secteur->id]) ?>" ><i class="fa fa-list-ul"></i></a>
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




