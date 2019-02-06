<div class="page-header">
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'SECTEURS D\'ACTIVITE'
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
        <h2 class="page-header" style="font-family: cakefont">LISTE DES SECTEURS D'ACTIVITE         <a href="<?= $this->Url->build(['action'=>'add']) ?>" style="float: right" class="btn btn-success btn-xs btn-rounded"><i class="fa fa-plus-circle"></i> AJOUTER</a>
        </h2>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover table-condensed" >
            <thead>
            <tr>

                <th>Nom</th>
                <th class=""></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($secteurs as $secteur): ?>
                <tr>

                    <td><?= $secteur->name ?></td>
                    <td class="">
                        <ul class="list-inline" style="margin-bottom: 0">
                            <li title="afficher" class="list-inline-item" >
                                <a class="btn btn-info btn-xs btn-rounded" href="<?= $this->Url->build(['action'=>'view', $secteur->id]) ?>" ><i class="fa fa-eye"></i></a>
                            </li>
                            <li class="list-inline-item" title="modifier" >
                                <a class="btn btn-success btn-xs btn-rounded" href="<?= $this->Url->build(['action'=>'edit', $secteur->id]) ?>" ><i class="fa fa-edit"></i></a>
                            </li>
                            <li class="list-inline-item" title="Supprimer" >
                                <form name="post_5af572b6820d7500678848" class="form-delete" style="display:none;" method="post" action="<?= $this->Url->build(['action'=>'delete',$secteur->id]) ?>">
                                    <input name="_method" value="POST" type="hidden">
                                </form>
                                <a class="btn btn-danger btn-xs btn-rounded" href="#" onclick="$('.form-delete').submit()"><i class="fa fa-trash"></i></a>
                            </li>
                        </ul>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="pagination-sm">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>

        </div>
    </div>


    </div>

