<div>
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'GROUPES'
    );


    ?>
    <div class="page-breadcrumb page-header">
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
        <h2 class="page-header">LISTE DES GROUPES DE FOURNISSEURS <a style="float: right" href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn btn-xs btn-success btn-rounded"><i class="fa fa-plus-circle"></i> &nbsp;AJOUTER </a></h2>
    </div>

    <div class="card-body">

        <table class="table table-hover table-bordered table-condensed">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Email</th>

                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($groupes as $fournisseur): ?>
                <tr>

                    <td><?= h($fournisseur->name) ?></td>
                    <td><?= $fournisseur->address ?></td>
                    <td><?= $fournisseur->phone  ?></td>
                    <td><?= h($fournisseur->email) ?></td>

                    <td class="actions">
                        <ul style="margin-bottom: 0" class="list-inline">
                            <li class="list-inline-item" title="afficher" >
                                <a class="btn btn-info btn-xs" href="<?= $this->Url->build(['action'=>'view', $fournisseur->id]) ?>" ><i class="fa fa-list-alt"></i></a>
                            </li>
                            <li class="list-inline-item" title="modifier" >
                                <a class="btn btn-success btn-xs" href="<?= $this->Url->build(['action'=>'edit', $fournisseur->id]) ?>" ><i class="fa fa-edit"></i></a>
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



