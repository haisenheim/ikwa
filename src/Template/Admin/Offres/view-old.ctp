<div class="page-header text-center header">
    <h2>GESTION DES OFFRES</h2>
    <h4><?= $offre->name ?></h4>
</div>




<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title"><?= $offre->name ?></h5>
        </div>
        <div class="panel-body">
            <h6>Fournisseur: <?= $offre->fournisseur?$offre->fournisseur->name:'-' ?></h6>
            <h6>Prix promotionnel: <?= $offre->prix_vente ?></h6>
            <h6>Prix reel: <?= $offre->prix_reel ?></h6>
        </div>
        <div class="panel-footer">
            <h6>Secteur: <?= $offre->secteur?$offre->secteur->name:'-' ?></h6>
            <h6>Categorie: <?= $offre->category?$offre->category->name:'-' ?></h6>
        </div>
    </div>

    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($offre->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Secteur') ?></th>
            <td><?= $offre->has('secteur') ? $this->Html->link($offre->secteur->name, ['controller' => 'Secteurs', 'action' => 'view', $offre->secteur->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $offre->has('category') ? $this->Html->link($offre->category->name, ['controller' => 'Categories', 'action' => 'view', $offre->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fournisseur') ?></th>
            <td><?= $offre->has('fournisseur') ? $this->Html->link($offre->fournisseur->name, ['controller' => 'Fournisseurs', 'action' => 'view', $offre->fournisseur->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $offre->has('user') ? $this->Html->link($offre->user->name, ['controller' => 'Users', 'action' => 'view', $offre->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($offre->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($offre->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Prix Reel') ?></th>
            <td><?= $this->Number->format($offre->prix_reel) ?></td>
        </tr>
        <tr>
            <th><?= __('Prix Reduit') ?></th>
            <td><?= $this->Number->format($offre->prix_reduit) ?></td>
        </tr>
        <tr>
            <th><?= __('Quota') ?></th>
            <td><?= $this->Number->format($offre->quota) ?></td>
        </tr>
        <tr>
            <th><?= __('Duree') ?></th>
            <td><?= $this->Number->format($offre->duree) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($offre->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Statut') ?></th>
            <td><?= $offre->statut ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($offre->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Clients') ?></h4>
        <?php if (!empty($offre->clients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Adresse') ?></th>
                <th><?= __('Telephone') ?></th>
                <th><?= __('Mobile') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Ville Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($offre->clients as $clients): ?>
            <tr>
                <td><?= h($clients->id) ?></td>
                <td><?= h($clients->name) ?></td>
                <td><?= h($clients->adresse) ?></td>
                <td><?= h($clients->telephone) ?></td>
                <td><?= h($clients->mobile) ?></td>
                <td><?= h($clients->email) ?></td>
                <td><?= h($clients->ville_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
