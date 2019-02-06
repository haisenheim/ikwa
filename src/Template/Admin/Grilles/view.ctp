<div>
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'GRILLES',
        ['controller' => 'Grilles', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'DETAIL DE LA GRILLE'
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
        <div class="page-header text-center" >
            <h2 class="page-header"><i class="fa fa-tasks"></i> GRILLE &numero; <?= $grille->name ?></h2>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="card">

                    <div class="card-body">
                        OPERATEUR :  <?= $grille->has('user') ? $grille->user->name:'-' ?>
                        <br/>
                        DATE DE CREATION : <?= $grille->created? date_format($grille->created,'d/m/Y'):'' ?>
                        <br/>
                        APPLIQUEE A :
                        <ul class="list-inline">
                            <?php if(!empty($grille->listes)): ?>
                                <?php foreach($grille->listes as $liste): ?>
                                    <li class="badge"><?= $liste->fournisseur->name ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-7">

                <?php if (!empty($grille->grilleitems)): ?>
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <th scope="col">DE</th>
                            <th scope="col">A</th>
                            <th scope="col">TAUX</th>

                        </tr>
                        <?php foreach ($grille->grilleitems as $grilleitems): ?>
                            <tr>

                                <td><?= h($grilleitems->min) ?></td>
                                <td><?= h($grilleitems->max) ?></td>
                                <td><?= h($grilleitems->coef . "%") ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>


</div>





