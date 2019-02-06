<div>
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'VILLES',
        ['controller' => 'Villes', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'DETAIL SUR LA VILLE'
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
    <div class="card-header" style="margin-top: 30px">
        <div class="page-header text-center" >
            <h2 class="page-header"><i class="fa fa-tasks"></i> &numero; <?= $ville->name ?></h2>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <?php if (!empty($ville->users)): ?>
                            <table class="table table-striped table-hover table-bordered">
                                <tr>
                                    <th scope="col">NOM</th>
                                    <th scope="col">PRENOM</th>
                                    <th scope="col">TELEPHONE</th>

                                </tr>
                                <?php foreach ($ville->users as $item): ?>
                                    <tr>

                                        <td><?= $this->Html->link($item->last_name,['controller'=>'Users','action'=>'view', $item->id]) ?></td>
                                        <td><?= $item->first_name ?></td>
                                        <td><?= $item->phone ?></td>



                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">

                <?php if (!empty($ville->fournisseurs)): ?>
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <th scope="col">NOM</th>

                        </tr>
                        <?php foreach ($ville->fournisseurs as $items): ?>
                            <tr>

                                <td><?= $this->Html->link($items->name,['controller'=>'Fournisseurs','action'=>'view', $items->id]) ?></td>



                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>


</div>
