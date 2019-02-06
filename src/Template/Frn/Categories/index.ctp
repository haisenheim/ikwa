<div class="card">
    <div class="card-header">
        <h2 class="card-title">LISTE DES CATEGORIES</h2>
        <ul class="list-inline pull-right" style="float: right">
            <li>
                <a href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> AJOUTER</a>
            </li>
        </ul>
    </div>


    <div class="card-body">
        <table class="table table-bordered table-hover table-condensed" >
            <thead>
            <tr>

                <th>Nom de la categorie</th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>

                    <td><?= h($category->name) ?></td>
                    <td class="actions">
                        <ul style="margin-bottom: 0" class="list-inline">
                            <li class="list-inline-item" title="afficher" >
                                <a class="btn btn-info btn-xs" href="<?= $this->Url->build(['action'=>'view', $category->id]) ?>" ><i class="fa fa-eye"></i></a>
                            </li>
                            <li class="list-inline-item" title="modifier" >
                                <a class="btn btn-success btn-xs" href="<?= $this->Url->build(['action'=>'edit', $category->id]) ?>" ><i class="fa fa-edit"></i></a>
                            </li>
                            <li class="list-inline-item" title="Supprimer" >
                                <form name="post_5af572b6820d7500678848" class="form-delete" style="display:none;" method="post" action="<?= $this->Url->build(['action'=>'delete',$category->id]) ?>">
                                    <input name="_method" value="POST" type="hidden">
                                </form>
                                <a class="btn btn-danger btn-xs" href="#" onclick="$('.form-delete').submit()"><i class="fa fa-trash"></i></a>
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
