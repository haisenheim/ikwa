<div>
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'GRILLES'
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

    <div class="card-header" style="margin-top: 20px">
        <h3 class="page-header text-center">GRILLES DES TARIFS <a href="<?= $this->Url->build(['action'=>'add']) ?>" style="float: right;" class="btn btn-success btn-rounded btn-xs"><i class="fa fa-plus-circle"></i> NOUVELLE GRILLE</a></h3>
        
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>

                <th scope="col">NUMERO DE LA GRILLE</th>
                <th scope="col">DATE DE CREATION</th>
                <th scope="col">OPERATEUR</th>
                <th scope="col" class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($grilles as $grille): ?>
                <tr>

                    <td><?= h($grille->name) ?></td>
                    <td><?= $grille->created?date_format($grille->created,'d/m/Y'):'-' ?></td>
                    <td><?= $grille->user->name ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Afficher'), ['action' => 'view', $grille->id]) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $grille->id]) ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
        </div>
    </div>


</div>
