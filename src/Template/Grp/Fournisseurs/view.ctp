<div class="header page-header text-center">
    <h3 class="page-header"><?= h($fournisseur->name) ?></h3>
</div>
<div class="row">
    <div class="col-6 col-lg-offset-3 col-md-offset-3">
        <div class="card">
            <h6 class="card-header card-title">
                NOM : <?= h($fournisseur->name) ?>
            </h6>
            <div class="card-body">
                <h6>
                    Tel : <?= $fournisseur->telephone.' - '.$fournisseur->mobile ?>
                </h6>
                <h6>
                    Email : <?= $fournisseur->email ?>
                </h6>
                <h6>
                    Representant : <?= $fournisseur->representant ?>
                </h6>

            </div>
            <div class="card-footer">
                <h5>
                    <?= $fournisseur->secteur?$fournisseur->secteur->name:'-' ?>
                </h5>
            </div>
        </div>
    </div>
    </div>

    <h5 class="page-header">HISTORIQUE DES PAIEMENTS</h5>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">En ligne</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Historique</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Les  offres en cours</div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Les offres passees</div>
        </div>


    <div class="related">

        <?php if (!empty($fournisseur->offres)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-condensed table-bordered">
            <tr>
                <th><?= __('Name') ?></th>


                <th><?= __('Prix Reel') ?></th>
                <th><?= __('Prix Reduit') ?></th>

                <th><?= __('Created') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Photo') ?></th>


                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fournisseur->offres as $offres): ?>
            <tr>
                <td><?= h($offres->name) ?></td>


                <td><?= h($offres->prix_reel) ?></td>
                <td><?= h($offres->prix_reduit) ?></td>




                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Offres', 'action' => 'view', $offres->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Offres', 'action' => 'edit', $offres->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offres', 'action' => 'delete', $offres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offres->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>


