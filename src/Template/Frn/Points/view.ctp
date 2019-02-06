<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Point'), ['action' => 'edit', $point->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Point'), ['action' => 'delete', $point->id], ['confirm' => __('Are you sure you want to delete # {0}?', $point->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Points'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Point'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paiements'), ['controller' => 'Paiements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paiement'), ['controller' => 'Paiements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="points view large-9 medium-8 columns content">
    <h3><?= h($point->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($point->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($point->adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($point->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('ImageUri') ?></th>
            <td><?= h($point->imageUri) ?></td>
        </tr>
        <tr>
            <th><?= __('Responsable') ?></th>
            <td><?= h($point->responsable) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($point->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Paiements') ?></h4>
        <?php if (!empty($point->paiements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Point Id') ?></th>
                <th><?= __('Fournisseur Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($point->paiements as $paiements): ?>
            <tr>
                <td><?= h($paiements->id) ?></td>
                <td><?= h($paiements->name) ?></td>
                <td><?= h($paiements->created) ?></td>
                <td><?= h($paiements->point_id) ?></td>
                <td><?= h($paiements->fournisseur_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Paiements', 'action' => 'view', $paiements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Paiements', 'action' => 'edit', $paiements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Paiements', 'action' => 'delete', $paiements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paiements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($point->reservations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Offre Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Payee') ?></th>
                <th><?= __('Date Paie') ?></th>
                <th><?= __('Point Id') ?></th>
                <th><?= __('Versee') ?></th>
                <th><?= __('Date Verse') ?></th>
                <th><?= __('Paiement Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($point->reservations as $reservations): ?>
            <tr>
                <td><?= h($reservations->id) ?></td>
                <td><?= h($reservations->name) ?></td>
                <td><?= h($reservations->offre_id) ?></td>
                <td><?= h($reservations->user_id) ?></td>
                <td><?= h($reservations->quantity) ?></td>
                <td><?= h($reservations->created) ?></td>
                <td><?= h($reservations->payee) ?></td>
                <td><?= h($reservations->date_paie) ?></td>
                <td><?= h($reservations->point_id) ?></td>
                <td><?= h($reservations->versee) ?></td>
                <td><?= h($reservations->date_verse) ?></td>
                <td><?= h($reservations->paiement_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($point->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Gender') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Login Last') ?></th>
                <th><?= __('Point Id') ?></th>
                <th><?= __('Fournisseur Id') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Hash') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Login Count') ?></th>
                <th><?= __('Token') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('ImageUri') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($point->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->gender) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->login_last) ?></td>
                <td><?= h($users->point_id) ?></td>
                <td><?= h($users->fournisseur_id) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->hash) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->login_count) ?></td>
                <td><?= h($users->token) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->imageUri) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
