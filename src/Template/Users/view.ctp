<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fournisseurs'), ['controller' => 'Fournisseurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fournisseur'), ['controller' => 'Fournisseurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients Offres'), ['controller' => 'ClientsOffres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clients Offre'), ['controller' => 'ClientsOffres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offres'), ['controller' => 'Offres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offre'), ['controller' => 'Offres', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Client') ?></th>
            <td><?= $user->has('client') ? $this->Html->link($user->client->name, ['controller' => 'Clients', 'action' => 'view', $user->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fournisseur') ?></th>
            <td><?= $user->has('fournisseur') ? $this->Html->link($user->fournisseur->name, ['controller' => 'Fournisseurs', 'action' => 'view', $user->fournisseur->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Hash') ?></th>
            <td><?= h($user->hash) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Actif') ?></th>
            <td><?= $user->actif ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clients Offres') ?></h4>
        <?php if (!empty($user->clients_offres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Offre Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->clients_offres as $clientsOffres): ?>
            <tr>
                <td><?= h($clientsOffres->id) ?></td>
                <td><?= h($clientsOffres->client_id) ?></td>
                <td><?= h($clientsOffres->offre_id) ?></td>
                <td><?= h($clientsOffres->created) ?></td>
                <td><?= h($clientsOffres->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ClientsOffres', 'action' => 'view', $clientsOffres->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ClientsOffres', 'action' => 'edit', $clientsOffres->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ClientsOffres', 'action' => 'delete', $clientsOffres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientsOffres->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Offres') ?></h4>
        <?php if (!empty($user->offres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Secteur Id') ?></th>
                <th><?= __('Type Id') ?></th>
                <th><?= __('Fournisseur Id') ?></th>
                <th><?= __('Prix Reel') ?></th>
                <th><?= __('Prix Reduit') ?></th>
                <th><?= __('Quota') ?></th>
                <th><?= __('Duree') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Statut') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->offres as $offres): ?>
            <tr>
                <td><?= h($offres->id) ?></td>
                <td><?= h($offres->name) ?></td>
                <td><?= h($offres->secteur_id) ?></td>
                <td><?= h($offres->type_id) ?></td>
                <td><?= h($offres->fournisseur_id) ?></td>
                <td><?= h($offres->prix_reel) ?></td>
                <td><?= h($offres->prix_reduit) ?></td>
                <td><?= h($offres->quota) ?></td>
                <td><?= h($offres->duree) ?></td>
                <td><?= h($offres->created) ?></td>
                <td><?= h($offres->user_id) ?></td>
                <td><?= h($offres->photo) ?></td>
                <td><?= h($offres->description) ?></td>
                <td><?= h($offres->statut) ?></td>
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
</div>
